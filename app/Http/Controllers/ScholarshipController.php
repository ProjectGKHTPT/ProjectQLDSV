<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diem;
use App\Monhoc;
use App\Sinhvien;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Response;

class ScholarshipController extends Controller
{
    public function index($namhoc,$hocky,$hocbong){
        view()->share('namhoc',$namhoc);
        view()->share('hocky',$hocky);
        view()->share('hocbong',$hocbong);
        $student=Sinhvien::join('thongkes','sinhviens.id','=','thongkes.sinhvien_id')
            ->join('hockys','thongkes.thongke_hocky_id','=','hockys.id')
            ->select([
                'sinhviens.id as idsv',
                'masv',
                'tensv',
                'hosv',
                'diemrl',
                'hocbong',
                'namhoc',
                'hocky'
            ])
            ->where('hocbong','=',$hocbong)
            ->where('thongkes.thongke_hocky_id','=',$hocky)
            ->where('thongkes.hocbong','!=',null)
            ->orderBy('idsv', 'desc')
//            ->orderBy('diemrl', 'desc')
            ->get();
        view()->share('student',$student);
        return view('scholarship.index');
    }

    public function savehocbong(){
        $svid =$_POST['svid'];
        $hocbong=$_POST['hocbong'];
        $hocky=$_POST['hocky'];
        if($hocbong==""){
            $hocbong==null;
        }
        if($hocbong=="1" || $hocbong=="0" || $hocbong==null) {
            $check = DB::table('thongkes')->where([
                ['sinhvien_id', '=', $svid],
                ['thongke_hocky_id', '=', $hocky],
            ])->get();
            $countcheck = $check->count();
            if ($countcheck > 0) {
                DB::table('thongkes')->where('id', '=', $check[0]->id)->update(
                    [
                        'sinhvien_id' => $svid,
                        'hocbong' => $hocbong,
                        'thongke_hocky_id' => $hocky
                    ]
                );
            } else {
                DB::table('thongkes')->insert(
                    [
                        'sinhvien_id' => $svid,
                        'hocbong' => $hocbong,
                        'thongke_hocky_id' => $hocky
                    ]
                );
            }
            if($hocbong==null){
                return Response::json([
                    'error' => 0,
                    'message' => 'Xóa thành công học bổng'
                ]);
            }
            return Response::json([
                'error' => 0,
                'message' => 'Thêm thành công học bổng'
            ]);
        }else{
            return Response::json([
                'error' => 1,
                'message' => 'Vui lòng nhập nhập loại học bổng hợp lệ "Giỏi" hoặc "Khá"'
            ]);
        }
    }
}