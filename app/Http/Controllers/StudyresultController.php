<?php

namespace App\Http\Controllers;

use App\Diem;
use App\Monhoc;
use App\Sinhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

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
         $student=Sinhvien::leftJoin('thongkes','sinhviens.id','=','thongkes.sinhvien_id')
             ->select([
                 'sinhviens.id as idsv',
                 'masv',
                 'tensv',
                 'hosv',
                 'diemrl'
             ])
             ->where([
                 ['lop_id','=',$lopid],
             ])
         ->get();
        view()->share('student',$student);
        return view('study-result.index');
    }
    public function savediemrl(){
        $svid =$_POST['svid'];
        $diemrl=$_POST['diemrl'];
        $hocky=$_POST['hocky'];
        if(is_numeric($diemrl) && $diemrl>=0 && $diemrl<=100) {
            $check = DB::table('thongkes')->where([
                ['sinhvien_id', '=', $svid],
                ['thongke_hocky_id', '=', $hocky],
            ])->get();
            $countcheck = $check->count();
            if ($countcheck > 0) {
                DB::table('thongkes')->where('id', '=', $check->id)->update(
                    [
                        'sinhvien_id' => $svid,
                        'diemrl' => $diemrl,
                        'thongke_hocky_id' => $hocky
                    ]
                );
            } else {
                DB::table('thongkes')->insert(
                    [
                        'sinhvien_id' => $svid,
                        'diemrl' =>$diemrl,
                        'hocbong' => null,
                        'thongke_hocky_id' => $hocky
                    ]
                );
            }

            return Response::json([
                'error' => 0,
                'message' => 'Thêm thành công điểm rèn luyện'
            ]);
        } else{
            return Response::json([
                'error' => 1,
                'message' => 'Vui lòng nhập điểm rèn luyện trong khoản "0=>100"'
            ]);
        }
    }
}
