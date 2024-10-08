<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeBehaviorApprasial extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pbads()
    {
        return $this->hasMany(PeBehaviorApprasialDetail::class, 'pba_id');
    }
}
