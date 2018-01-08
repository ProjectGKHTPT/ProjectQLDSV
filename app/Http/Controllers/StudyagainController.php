<?php

namespace App\Http\Controllers;

use App\Diem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class StudyagainController extends Controller
{
    public function index(){
        return view('study-again.index');
    }
    public function datajson(Request $request){
        $where = [];
        if (isset($request->search['custom']['typesearch'])){
            if(($request->search['custom']['typesearch'])=="0"){
                if($request->search['custom']['malop']){
                    $where[]= ['malop','like', '%' . trim($request->search['custom']['malop']) . '%'];
                }
                if($request->search['custom']['mamh']){
                    $where[]= ['mamon','like', '%' . trim($request->search['custom']['mamh']) . '%'];
                }
                if($request->search['custom']['masv']){
                    $where[]= ['masv','like', '%' . trim($request->search['custom']['masv']) . '%'];
                }
            }
            if (($request->search['custom']['typesearch'])=="1"){
                if($request->search['custom']['malop']){
                    $where[]= ['malop',trim($request->search['custom']['malop'])];
                }
                if($request->search['custom']['mamh']){
                    $where[]= ['mamon',trim($request->search['custom']['mamh']) ];
                }
                if($request->search['custom']['masv']){
                    $where[]= ['masv',trim($request->search['custom']['masv'])];
                }
            }
        }
        DB::statement(DB::raw('set @rownum=0'));
        $diem =DB::table('diems')
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'masv',
                'hosv',
                'tensv',
                'malop',
                'mamon',
                'diemcc',
                'diemtx',
                'diemgk',
                'diemck',
                'diemthilai',
                'tenmon'
            ])

            ->join('sinhviens', 'diems.sinhvien_id', '=', 'sinhviens.id')
            ->join('monhocs', 'diems.monhoc_id', '=', 'monhocs.id')
            ->join('lops', 'sinhviens.lop_id', '=', 'lops.id')

            ->where('diemcc', '<', 5)
            ->orWhere([['diemcc', '<', 3],['diemtx', '<', 3]])
            ->orWhere([['diemcc', '<', 3],['diemgk', '<', 3]])
            ->orWhere([['diemtx', '<', 3],['diemgk', '<', 3]])

            ->orWhere('diemcc', '=', 0)
            ->orWhere('diemtx', '=', 0)
            ->orWhere('diemgk', '=', 0)
            ->orWhere('diemck', '=', 0)
            ->orWhereRaw ('(10*diemcc+10*diemtx+30*diemgk+60*diemthilai)/100 < 5')
            ->whereNotNull('diemcc')
            ->whereNotNull('diemtx')
            ->whereNotNull('diemgk')

            ->get();

//            ->orwhere(function ($query) {
//                $query ->
//                having('diemtbthilai', '<', 5);
//
//                    })
//            ->get();
        $datatables = DataTables::of($diem)
            ->addColumn('hotensv', function ($data) {
                return $data->hosv . " " . $data->tensv;
            })
            ->addColumn('lydo', function ($data) {
                $dem = 0;
                if ($data->diemcc < 5) {
                    $lydo[] = "Điểm Chuyên cần dưới 5";
                }
                if ($data->diemcc < 3) {
                    $dem++;
                }
                if ($data->diemtx < 3) {
                    $dem++;
                }
                if ($data->diemgk < 3) {
                    $dem++;
                }
                if ($data->diemck < 3) {
                    $dem++;
                }
                if ($dem >= 2) {
                    $lydo[] = "Có 2 cột điểm dưới 3";
                }
                if ($data->diemcc == 0 || $data->diemtx == 0 || $data->diemgk == 0 || $data->diemck == 0) {
                    $lydo[] = "Có 1 cột điểm bằng 0";
                }
                if((10*$data->diemcc+10*$data->diemtx+30*$data->diemgk+60*$data->diemthilai)/100 < 5 && $data->diemthilai != null){
                    $lydo[] = "Điểm trung bình thi lại nhỏ hơn 5 (".(10*$data->diemcc+10*$data->diemtx+30*$data->diemgk+60*$data->diemthilai)/100 .')';
                }
                return $lydo;
            })
            ->rawColumns(['rownum', 'hotensv', 'lydo']);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }
}
