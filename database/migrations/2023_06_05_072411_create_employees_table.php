<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('employees', function (Blueprint $table) {
         $table->id();
         $table->integer('status');
         $table->integer('completeness')->nullable();
         $table->string('role')->nullable();
         $table->integer('user_id')->nullable();
         $table->integer('biodata_id')->nullable();
         $table->integer('contract_id')->nullable();
         $table->integer('emergency_id')->nullable();
         $table->string('picture')->nullable();
         $table->string('bio')->nullable();
         $table->string('experience')->nullable();
         // $table->string('name')->nullable();
         // $table->string('phone')->nullable();
         // $table->string('email')->nullable();
         // $table->string('gender')->nullable();
         // $table->string('religion')->nullable();
         // $table->date('birth_date')->nullable();
         // $table->string('birth_place')->nullable();
         // $table->string('address')->nullable();
         // $table->string('picture')->nullable();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('employees');
   }
}