<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function employees()
   {
      return $this->hasMany(Employee::class);
   }

   public function employee()
   {
      return $this->belongsTo(Employee::class);
   }

   public function department()
   {
      return $this->belongsTo(Department::class);
   }

   public function designation()
   {
      return $this->belongsTo(Designation::class);
   }

   public function shift()
   {
      return $this->belongsTo(Shift::class);
   }

   public function position()
   {
      return $this->belongsTo(Position::class);
   }

   public function unit()
   {
      return $this->belongsTo(Unit::class);
   }

   public function sub_dept()
   {
      return $this->belongsTo(SubDept::class);
   }
}
