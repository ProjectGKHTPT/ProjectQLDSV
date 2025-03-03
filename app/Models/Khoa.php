<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    protected $table = 'khoas';

    public function lops()
    {
        return $this->hasMany(\App\Models\Lop::class, 'khoa_id', 'id');
    }
}
