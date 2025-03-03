<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table='lops';

    public function khoas()
    {
        return $this->belongsTo(\App\Khoa::class,'khoa_id','id');
    }
    public function sinhviens()
    {
        return $this->hasMany(\App\Sinhvien::class,'lop_id','id');
    }
    public function monhocs()
    {
        return $this->belongsToMany(\App\Monhoc::class,'monhoc_lop','lop_id','monhoc_id');
    }
}
