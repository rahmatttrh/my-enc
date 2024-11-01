<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    use HasFactory;
    protected $guarded = [];
   
    public function employee(){
      return $this->belongsTo(Employee::class);
    }

    public function location(){
      return $this->belongsTo(Location::class);
    }
}
