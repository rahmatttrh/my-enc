<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeKpa extends Model
{
  use HasFactory;
  protected $guarded = [];

  // relasi one to one dengan PE
  public function pe()
  {
    return $this->belongsTo(Pe::class);
  }

  public function employe()
  {
    return $this->belongsTo(Employee::class);
  }

  public function kpadetail()
  {
    return $this->hasMany(PekpaDetail::class);
  }

  public function kpadetails()
  {
    return $this->hasMany(PekpaDetail::class, 'kpa_id');
  }

  public function datas()
  {
    $datas = PekpaDetail::where('kpa_id', $this->id)->where('addtional', '0')->get();
    return $datas;
  }

  public function additional()
  {
    $data = PekpaDetail::where('kpa_id', $this->id)->where('addtional', '1')->first();
    return $data;
  }

  //  public function additional()
  //  {
  //      return $this->hasMany(PekpaDetail::class);
  //  }
}
