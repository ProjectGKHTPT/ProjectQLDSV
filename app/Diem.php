<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    protected $table='diems';
    public function sinhviens()
    {
        return $this->belongsTo('App\Sinhvien','sinhvien_id','id');
    }
    public function monhocs()
    {
        return $this->belongsTo('App\Monhoc','monhoc_id','id');
    }
}
