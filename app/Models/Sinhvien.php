<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sinhvien extends Model
{
    protected $table = 'sinhviens';

    public function diems()
    {
        return $this->hasMany(\App\Models\Diem::class, 'sinhvien_id', 'id');
    }

    public function lops()
    {
        return $this->belongsTo(\App\Models\Lop::class, 'lop_id', 'id');
    }
}
