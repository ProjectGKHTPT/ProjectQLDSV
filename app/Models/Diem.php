<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    protected $table = 'diems';

    public function sinhviens()
    {
        return $this->belongsTo(\App\Models\Sinhvien::class, 'sinhvien_id', 'id');
    }

    public function monhocs()
    {
        return $this->belongsTo(\App\Models\Monhoc::class, 'monhoc_id', 'id');
    }
}
