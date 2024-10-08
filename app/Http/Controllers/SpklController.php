<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Overtime;
use App\Models\Position;
use App\Models\Spkl;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SpklController extends Controller
{
   public function index(){
      // dd('ok');
      $employee = Employee::where('nik', auth()->user()->username)->first();
      $spkls = Spkl::where('employee_id', $employee->id)->orderBy('updated_at', 'desc')->get();
      return view('pages.spkl.index', [
         'spkls' => $spkls
      ]);
   }

   public function indexSupervisor(){
      // dd('ok');
      $employee = Employee::where('nik', auth()->user()->username)->first();
      $spkls = Spkl::where('department_id', $employee->department_id)->orderBy('updated_at', 'desc')->get();
      return view('pages.spkl.indexSpv', [
         'spkls' => $spkls
      ]);
   }

   public function indexManager(){
      $employee = Employee::where('nik', auth()->user()->username)->first();
      $spkls = Spkl::where('department_id', $employee->department_id)->orderBy('updated_at', 'desc')->get();
      return view('pages.spkl.indexMan', [
         'spkls' => $spkls
      ]);
   }





   public function detail($id){
      $dekripId = dekripRambo($id);
      $spkl = Spkl::find($dekripId);
      if ($spkl->department_id == 2) {
         $positionSpv = Position::where('name', 'IT Supervisor')->first();
         $positionMan = Position::where('name', 'Manager IT')->first();
         $spv = Employee::where('position_id', $positionSpv->id)->first();
         $manager = Employee::where('position_id', $positionMan->id)->first();
      }

      return view('pages.spkl.detail', [
         'spkl' => $spkl,
         'spv' => $spv,
         'manager' => $manager
      ]);
   }

   public function store(Request $req){
      $req->validate([]);
      $employee = Employee::where('nik', auth()->user()->username)->first();

      $out = Carbon::make($req->end);
      $totalDuration = $out->diffInSeconds($employee->contract->shift->out);
      // dd(gmdate('H:i', $totalDuration));
      $date = Carbon::make($req->date);

      $spkl = Spkl::orderBy("created_at", "desc")->first();
      if (isset($spkl)) {
         $code = "SPKL/" . $employee->department->id . '/' . $date->format('dmy') . '/' . ($spkl->id + 1);
      } else {
         $code = "SPKL/"  . $employee->department->id . '/' . $date->format('dmy') . '/' . 1;
      }

      // dd($code);

      Spkl::create([
         'code' => $code,
         'status' => 0,
         'department_id' => $employee->department_id,
         'date' => $req->date,
         'employee_id' => $employee->id,
         'loc' => $req->loc,
         'start' => $employee->contract->shift->out,
         'end' => $req->end,
         'total' => gmdate('H:i', $totalDuration),
         'desc' => $req->desc
      ]);

      return redirect()->back()->with('success', 'SPKL successfully created');
   }

   public function send($id){
      $dekripId = dekripRambo($id);
      $spkl = Spkl::find($dekripId);

      $spkl->update([
         'status' => 1
      ]);

      return redirect()->back()->with('success', 'SPKL Form successfully sent to SPV/Manager');
   }

   public function delete($id){
      $dekripId = dekripRambo($id);
      $spkl = Spkl::find($dekripId);

      $spkl->delete();

      return redirect()->route('employee.spkl')->with('SPKL deleted');
   }

   public function approveSupervisor($id){
      // dd('approved spv');
      $dekripId = dekripRambo($id);
      $spkl = Spkl::find($dekripId);
      // dd($spkl->code);

      $spkl->update([
         'status' => 2,
         'app_spv' => Carbon::now()
      ]);



      return redirect()->to('/')->with('success', 'SPKL Approved');
   }

   public function approveManager($id){
      // dd('approved spv');
      $dekripId = dekripRambo($id);
      $spkl = Spkl::find($dekripId);
      $employee = Employee::find($spkl->employee_id);

      // Overtime::create([
      //    'employee_id' => $employee->id,
      //    'spkl_id' => $spkl->id,
      //    'date' => $spkl->date,
      //    'start'
      // ]);
      // dd($spkl->code);




      // dd('approve_manager');
      $spkl->update([
         'status' => 3,
         'app_man' => Carbon::now()
      ]);

      return redirect()->to('/')->with('success', 'SPKL Approved');
   }
}
