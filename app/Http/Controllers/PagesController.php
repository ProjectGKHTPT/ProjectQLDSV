<?php

namespace App\Http\Controllers;

use App\Models\Giangvien;
use App\Models\Lop;
use App\Models\Monhoc;
use App\Models\Sinhvien;

class PagesController extends Controller
{
    public function __construct()
    {
        $sinhviens = Sinhvien::count();
        $monhocs = Monhoc::count();
        $lops = Lop::count();
        $giangviens = Giangvien::count();
        view()->share('sinhviens', $sinhviens);
        view()->share('monhocs', $monhocs);
        view()->share('lops', $lops);
        view()->share('giangviens', $giangviens);
    }

    public function index()
    {
        return view('index');
    }
}
