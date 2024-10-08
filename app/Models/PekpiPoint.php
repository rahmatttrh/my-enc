<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekpiPoint extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kpidetail()
    {
        return $this->belongsTo(PekpiDetail::class);
    }
}
