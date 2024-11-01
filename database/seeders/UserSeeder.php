<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $admin = User::create([
         'name' => 'Admin',
         'email' => 'admin@gmail.com',
         'username' => '112233',
         'password' => Hash::make('12345678'),
         'email_verified_at' => NOW(),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $admin->assignRole('Administrator');

      $developer = User::create([
         'name' => 'Developer',
         'email' => 'developer@gmail.com',
         'username' => '445566',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $developer->assignRole('Administrator');

      // $dareza = User::create([
      //    'name' => 'Dareza Arvian',
      //    'email' => 'dareza@example.com',
      //    'username' => 'EN-4-047',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $dareza->assignRole('Karyawan');
   }
}
