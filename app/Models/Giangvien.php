<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Giangvien extends Model
{
    protected $table = 'giangviens';

    public function monhocs()
    {
        return $this->hasMany(\App\Models\Monhoc::class, 'giangvien_id', 'id');
    }
}
