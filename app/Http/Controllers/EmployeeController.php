<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Imports\BiodataImport;
use App\Imports\EmployeeImport;
use App\Models\Bank;
use App\Models\Biodata;
use App\Models\Contract;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Role;
use App\Models\Shift;
use App\Models\Social;
use App\Models\SocialAccount;
use App\Models\Unit;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
   public function index($enkripTab)
   {
      $tab = dekripRambo($enkripTab);
      // dd($tab);
      $employees = Employee::where('status', 1)->get();
      $draftEmployees = Employee::where('status', 0)->get();
      return view('pages.employee.index', [
         'employees' => $employees,
         'draftEmployees' => $draftEmployees,
         'tab' => $tab
      ])->with('i');
   }

   public function draft()
   {
      $employees = Employee::where('status', 0)->get();
      return view('pages.employee.draft', [
         'employees' => $employees
      ])->with('i');
   }

   public function publish(Request $req)
   {
      $req->validate([
         'id_item' => 'required',
      ]);

      $arrayItem = $req->id_item;
      $jumlah = count($arrayItem);

      for ($i = 0; $i < $jumlah; $i++) {
         $employee = Employee::find($arrayItem[$i]);

         try {
            $user = User::create([
               'name' => $employee->biodata->first_name . ' ' . $employee->biodata->last_name,
               'email' => $employee->biodata->email,
               'password' => Hash::make('12345678')
            ]);
         } catch (Exception $e) {
            return redirect()->back()->with('danger', 'Can not activate employee  ' . $employee->biodata->first_name . ' ' . $employee->biodata->last_name . ', Error log : ' . $e->getMessage());
         }

         $employee->update([
            'status' => 1,
            'user_id' => $user->id
         ]);

         $employee->biodata->update([
            'status' => 1,
         ]);

         $user->assignRole($employee->role);
         $user->sendEmailVerificationNotification();
      }
      return redirect()->route('employee', enkripRambo('active'))->with('success', 'Employee successfully activated and Email Verification has ben sent.');
   }

   public function detail($id, $enkripPanel)
   {
      $dekripId = dekripRambo($id);
      $panel = dekripRambo($enkripPanel);
      $employee = Employee::find($dekripId);
      $departments = Department::get();
      $designations = Designation::get();
      $roles = Role::get();
      $shifts = Shift::get();
      $units = Unit::get();
      $socials = Social::get();
      $banks = Bank::get();



      // dd($employee->documents);
      // $panel = 'contract';
      // $tab = 'contract';


      return view('pages.employee.detail', [
         'employee' => $employee,
         'departments' => $departments,
         'designations' => $designations,
         'roles' => $roles,
         'shifts' => $shifts,
         'units' => $units,
         'socials' => $socials,
         'banks' => $banks,
         'panel' => $panel
         // 'tab' => $tab
      ]);
   }

   public function create()
   {
      $departments = Department::get();
      $designations = Designation::get();
      $shifts = Shift::get();
      $units = Unit::get();
      $roles = Role::get();

      return view('pages.employee.create', [
         'departments' => $departments,
         'designations' => $designations,
         'shifts' => $shifts,
         'units' => $units,
         'roles' => $roles
      ]);
   }

   public function store(Request $req)
   {
      $req->validate([
         'id' => 'required',
         'first_name' => 'required',
         'last_name' => 'required',
         'department' => 'required',
         'email' => 'required|unique:users',
         'picture' => request('picture') ? 'image|mimes:jpg,jpeg,png|max:5120' : '',
      ]);

      try {
         $biodata = Biodata::create([
            'status' => 0,
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'gender' => $req->gender,
            'email' => $req->email,
            'phone' => $req->phone,
         ]);
      } catch (Exception $e) {
         return redirect()->back()->with('danger', $e->getMessage());
      }



      $contract = Contract::create([
         'id_no' => $req->id,
         'unit_id' => $req->unit,
         'department_id' => $req->department,
         'designation_id' => $req->designation,
         'shift_id' => $req->shift,
         'salary' => $req->salary,
         'hourly_rate' => $req->hourly_rate,
         'payslip' => $req->payslip,
         'desc' => $req->desc
      ]);

      $employee = Employee::create([
         'status' => 0,
         'role' => $req->role,
         'contract_id' => $contract->id,
         'biodata_id' => $biodata->id,
         'picture' => request('picture') ? request()->file('picture')->store('employee/picture') : '',
      ]);



      return redirect()->route('employee.detail', [enkripRambo($employee->id), enkripRambo('contract')])->with('success', 'Employee successfully saved');
   }

   public function update(Request $req)
   {
      $req->validate([]);

      $employee = Employee::find($req->employee);
      // dd($req->martial);


      $employee->biodata->update([
         'status' => $req->status,
         'first_name' => $req->first_name,
         'last_name' => $req->last_name,
         'birth_date' => $req->birth_date,
         'birth_place' => $req->birth_place,
         'religion' => $req->religion,
         'gender' => $req->gender,
         'marital' => $req->marital,
         'address' => $req->address,
         'email' => $req->email,
         'phone' => $req->phone,
         'post_code' => $req->post_code,
         'blood' => $req->blood,
         'citizenship' => $req->citizenship,
         'nationality' => $req->nationality,
         'state' => $req->state,
         'city' => $req->city,
      ]);

      return redirect()->route('employee.detail', [enkripRambo($employee->id), enkripRambo('basic')])->with('success', 'Employee successfully updated');
   }

   public function updateBio(Request $req)
   {
      $req->validate([]);

      $employee = Employee::find($req->employee);
      $employee->update([
         'bio' => $req->bio,
         'experience' => $req->experience
      ]);

      return redirect()->route('employee.detail', [enkripRambo($employee->id), enkripRambo('personal')])->with('success', 'Employee Bio successfully updated');
   }

   public function updatePicture(Request $req)
   {
      $req->validate([
         // 'picture' => request('picture') ? 'image|mimes:jpg,jpeg,png|max:5120' : '',
      ]);

      $employee = Employee::find($req->employee);

      if (request('picture')) {
         Storage::delete($employee->picture);
         $picture = request()->file('picture')->store('images/employee/picture');
      } elseif ($employee->picture) {
         $picture = $employee->picture;
      } else {
         $picture = null;
      }

      $employee->update([
         'picture' => $picture
      ]);

      return redirect()->route('employee.detail', [enkripRambo($employee->id), enkripRambo('basic')])->with('success', 'Employee successfully updated');
   }

   public function export()
   {
      return Excel::download(new EmployeeExport, 'employee.xlsx');
   }

   public function formImport()
   {
      return view('pages.employee.import', [])->with('i');
   }

   public function import(Request $req)
   {
      $req->validate([
         'excel' => 'required'
      ]);
      $file = $req->file('excel');
      $fileName = $file->getClientOriginalName();
      $file->move('EmployeeData', $fileName);

      // try {
      //    Excel::import(new EmployeeImport, public_path('/EmployeeData/' . $fileName));
      // } catch (Exception $e) {
      //    return redirect()->back()->with('danger', 'Import Failed ' . $e->getMessage());
      // }

      Excel::import(new EmployeeImport, public_path('/EmployeeData/' . $fileName));




      return redirect()->route('employee', enkripRambo('draft'))->with('success', 'Employee Data successfully imported');
   }
}