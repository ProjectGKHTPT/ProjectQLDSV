<?php

namespace App\Http\Controllers;

use App\Diem;
use App\Monhoc;
use App\Sinhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudyresultController extends Controller
{
    public function index($lopid,$namhoc,$hocky){
        view()->share('lopid',$lopid);
        view()->share('namhoc',$namhoc);
        view()->share('hocky',$hocky);
        $monhoc=Monhoc::join('phancong','monhocs.id','=','phancong.monhoc_id')
            ->join('hockys','monhocs.hocky_id','=','hockys.id')
            ->where([
                ['lop_id','=',$lopid],
                ['hocky','=',$hocky],
                ['namhoc','=',$namhoc],
            ])
            ->get();
        view()->share('monhoc',$monhoc);
        $diem=Diem::join('sinhviens','diems.sinhvien_id','=','sinhviens.id')
            ->join('monhocs','diems.monhoc_id','=','monhocs.id')
            ->join('hockys','monhocs.hocky_id','=','hockys.id')
            ->select('sinhviens.id as idsv','tenmon','diemcc','diemtx','diemgk','diemck','diemthilai','sotinchi')
            ->where([
                ['lop_id','=',$lopid],
                ['hocky','=',$hocky],
                ['namhoc','=',$namhoc],
            ])
            ->get();
        view()->share('diem',$diem);
         $student=Sinhvien::join('lops','sinhviens.lop_id','=','lops.id')
             ->join('thongkes','sinhviens.id','=','thongkes.sinhvien_id')
             ->join('hockys','thongkes.thongke_hocky_id','=','hockys.id')
             ->select([
                 'sinhviens.id as idsv',
                 'masv',
                 'tensv',
                 'hosv',
                 'diemrl'
             ])
             ->where([
                 ['lop_id','=',$lopid],
                 ['hocky','=',$hocky],
                 ['namhoc','=',$namhoc],
             ])
         ->get();
        view()->share('student',$student);
        return view('study-result.index');
    }
//    public function hocbonggioi($lopid,$namhoc,$hocky,$slg,$dtb,$drl){
//        view()->share('lopid',$lopid);
//        view()->share('namhoc',$namhoc);
//        view()->share('hocky',$hocky);
//        view()->share('loaihocbong',"gioi");
//        view()->share('soluong',$slg);
//        view()->share('dtb',$dtb);
//        view()->share('drl',$drl);
//        $monhoc=Diem::join('sinhviens','diems.sinhvien_id','=','sinhviens.id')
//            ->join('monhocs','diems.monhoc_id','=','monhocs.id')
//            ->join('hockys','monhocs.hocky_id','=','hockys.id')
//            ->select('tenmon','diemcc','diemtx','diemgk','diemck','diemthilai','sotinchi')
//            ->where([
//                ['lop_id','=',$lopid],
//                ['hocky','=',$hocky],
//                ['namhoc','=',$namhoc],
//            ])
//            ->get();
//        view()->share('monhoc',$monhoc);
//        $student=Sinhvien::join('lops','sinhviens.lop_id','=','lops.id')
//            ->join('thongkes','sinhviens.id','=','thongkes.sinhvien_id')
//            ->join('hockys','thongkes.thongke_hocky_id','=','hockys.id')
//            ->select([
//                'masv',
//                'tensv',
//                'hosv',
//                'diemrl'
//            ])
//            ->where([
//                ['lop_id','=',$lopid],
//                ['hocky','=',$hocky],
//                ['namhoc','=',$namhoc],
//                ['','=',$namhoc],
//                ['namhoc','=',$namhoc],
//            ])
//            ->limit($slg)
//            ->get();
//        view()->share('student',$student);
//        return view('study-result.index');
//    }
}
