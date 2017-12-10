<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table='lops';

    public function khoas()
    {
        return $this->belongsTo('App\Khoa','khoa_id','id');
    }
    public function sinhviens()
    {
        return $this->hasMany('App\Sinhvien','lop_id','id');
    }
    public function monhocs()
    {
        return $this->belongsToMany('App\Monhoc','monhoc_lop','lop_id','monhoc_id');
    }
}
