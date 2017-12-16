<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sinhvien extends Model
{
    protected $table='sinhviens';


    public function diems()
    {
        return $this->hasMany('App\Diem','sinhvien_id','id');
    }
    public function lops()
    {
        return $this->belongsTo('App\Lop','lop_id','id');
    }
}
