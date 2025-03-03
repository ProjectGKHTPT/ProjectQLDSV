<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giangvien extends Model
{
    protected $table='giangviens';
    public function monhocs()
    {
        return $this->hasMany(\App\Monhoc::class,'giangvien_id','id');
    }
}
