<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeKpa extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employe()
    {
        return $this->belongsTo(Employee::class);
    }

    public function kpadetail()
    {
        return $this->hasMany(PekpaDetail::class);
    }
}