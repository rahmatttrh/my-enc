<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      Department::create([
         'name' => 'IT',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      Department::create([
         'name' => 'Finance',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      Department::create([
         'name' => 'Procurement',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}