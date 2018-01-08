<?php

namespace App\Http\Controllers;

use App\Giangvien;
use App\Lop;
use App\Monhoc;
use App\Sinhvien;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        $sinhviens=Sinhvien::count();
        $monhocs=Monhoc::count();
        $lops=Lop::count();
        $giangviens=Giangvien::count();
        view()->share('sinhviens', $sinhviens);
        view()->share('monhocs', $monhocs);
        view()->share('lops', $lops);
        view()->share('giangviens', $giangviens);
    }
    public function index(){
        return view('index');
    }
}
