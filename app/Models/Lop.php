<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table = 'lops';

    public function khoas()
    {
        return $this->belongsTo(\App\Models\Khoa::class, 'khoa_id', 'id');
    }

    public function sinhviens()
    {
        return $this->hasMany(\App\Models\Sinhvien::class, 'lop_id', 'id');
    }

    public function monhocs()
    {
        return $this->belongsToMany(\App\Models\Monhoc::class, 'monhoc_lop', 'lop_id', 'monhoc_id');
    }
}
