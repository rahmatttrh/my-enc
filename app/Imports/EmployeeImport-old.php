<?php

namespace App\Imports;

use App\Models\Biodata;
use App\Models\Contract;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Emergency;
use App\Models\Employee;
use App\Models\Unit;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;


class EmployeeImport implements ToCollection, WithHeadingRow
{
   public function collection(Collection $rows)
   {
      foreach ($rows as $row) {
         $department = Department::where('name', $row['department'])->first();
         $designation = Designation::where('name', $row['designation'])->first();
         $unit = Unit::where('name', $row['business_unit'])->first();
         // dd($row['first_name']);

         $biodata = Biodata::create([
            'status' => 0,
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'gender' => $row['gender'],
         ]);

         $contract = Contract::create([
            'id_no' => $row['id'],
            'unit_id' => $unit->id,
            'department_id' => $department->id,
            'designation_id' => $designation->id,
            'salary' => $row['salary'],
            'payslip' => $row['payslip_type']
         ]);

         $emergency = Emergency::create([]);
         Employee::create([
            'status' => 0,
            'role' => $row['role'],
            'biodata_id' => $biodata->id,
            'contract_id' => $contract->id,
            'emergency_id' => $emergency->id
         ]);
      }
   }
}
