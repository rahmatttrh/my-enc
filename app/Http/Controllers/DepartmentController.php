<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\SubDept;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
   public function index()
   {
      $departments = Department::orderBy('unit_id', 'desc')->get();
      return view('pages.department.index', [
         'departments' => $departments
      ])->with('i');
   }

   public function store(Request $req)
   {
      $req->validate([]);

      Department::create([
         'unit_id' => $req->unit,
         'name' => $req->name,
         'slug' => Str::slug($req->name)

      ]);

      return redirect()->back()->with('success', 'Department successfully added');
   }

   public function edit($id)
   {
      $dekripId = dekripRambo($id);
      $department = Department::find($dekripId);

      $departments = Department::get();
      return view('pages.department.edit', [
         'departments' => $departments,
         'department' => $department
      ])->with('i');
   }

   public function update(Request $req)
   {
      $department = Department::find($req->department);
      $department->update([
         'name' => $req->name,
         'slug' => Str::slug($req->name)
      ]);

      return redirect()->back()->with('success', 'Department successfully updated');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $department = Department::find($dekripId);
      $subs = SubDept::where('department_id', $department->id)->get();
      $positions = Position::where('department_id', $department->id)->get();
      $employees = Employee::where('department_id', $department->id)->get();

      if (count($employees) > 0) {
         return redirect()->back()->with('danger', 'Department delete fail, data ini memiliki relasi ke data lain');
      } else {
         foreach($subs as $sub){
            $sub->delete();
         }

         foreach($positions as $pos){
            $pos->delete();
         }
         $department->delete();
         return redirect()->back()->with('success', 'Department successfully deleted');
      }
      
   }




   public function position()
   {
      $departments = Department::get();
      return view('pages.position.index', [
         // 'departments' => $departments
      ])->with('i');
   }

   // Fetch Data
   public function fetchData($id)
   {
      // Mengambil data dari database menggunakan model
      $data = Department::where('id', $id)->first();
      $subDepts = SubDept::where('department_id', $id)->get();
      $jmlSubDept = $subDepts->count();

      if ($jmlSubDept == 1) {
         # code...
         $subDept = SubDept::where('department_id', $id)->first();
         $positions = Position::where('sub_dept_id', $subDept->id)->orderBy('name')->get();
      } else {
         # code...
         $positions = '';
      }


      // Mengembalikan data dalam format JSON
      return response()->json([
         'data' => $data,
         'subDepts' => $subDepts,
         'positions' => $positions,
         'jmlSubDept' => $jmlSubDept
      ]);
   }
}
