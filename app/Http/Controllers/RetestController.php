<?php

namespace App\Http\Controllers;

use App\Diem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RetestController extends Controller
{
    public function index(){
        return view('retest.index');
    }
    public function datajson(Request $request){
        $where = [];
//        if (isset($request->search['custom']['typesearch'])){
//            if(($request->search['custom']['typesearch'])=="0"){
//                if($request->search['custom']['malop']){
//                    $where[]= ['malop','like', '%' . trim($request->search['custom']['malop']) . '%'];
//                }
//                if($request->search['custom']['mamh']){
//                    $where[]= ['mamon','like', '%' . trim($request->search['custom']['mamh']) . '%'];
//                }
//                if($request->search['custom']['masv']){
//                    $where[]= ['masv','like', '%' . trim($request->search['custom']['masv']) . '%'];
//                }
//            }
//            if (($request->search['custom']['typesearch'])=="1"){
//                if($request->search['custom']['malop']){
//                    $where[]= ['malop',trim($request->search['custom']['malop'])];
//                }
//                if($request->search['custom']['mamh']){
//                    $where[]= ['mamon',trim($request->search['custom']['mamh']) ];
//                }
//                if($request->search['custom']['masv']){
//                    $where[]= ['masv',trim($request->search['custom']['masv'])];
//                }
//            }
//        }
        DB::statement(DB::raw('set @rownum=0'));
        $diem = DB::table('diems')->join('sinhviens', 'diems.sinhvien_id', '=', 'sinhviens.id')
            ->join('monhocs', 'diems.monhoc_id', '=', 'monhocs.id')
            ->join('lops', 'sinhviens.lop_id', '=', 'lops.id')
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'sinhviens.id',
                'masv',
                'hosv',
                'tensv',
                'malop',
                'mamon',
                'diemcc',
                'diemtx',
                'diemgk',
                'diemck',
                'tenmon',
                DB::raw('(10*diemcc+10*diemtx+30*diemgk+60*diemck)/100 AS diemtb'),
            ])
            ->where(function ($q){
                $q->where('diemcc', '>=', 5);
                $q->where([
                    ['diemcc', '>=', 3],
                    ['diemtx', '>=', 3]
                ]);
                $q->where([
                    ['diemcc', '>=', 3],
                    ['diemgk', '>=', 3]
                ]);
                $q->where([
                    ['diemcc', '>=', 3],
                    ['diemck', '>=', 3]
                ]);
                $q->where([
                    ['diemtx', '>=', 3],
                    ['diemgk', '>=', 3],
                ]);
                $q->where([
                    ['diemtx', '>=', 3],
                    ['diemck', '>=', 3]
                ]);
                $q->where([
                    ['diemgk', '>=', 3],
                    ['diemck', '>=', 3]
                ]);
                $q->where([
                    ['diemcc', '!=', 0],
                    ['diemtx', '!=', 0],
                    ['diemgk', '!=', 0],
                    ['diemck', '!=', 0]
                ]);
                $q->whereNotNull('diemcc');
                $q->whereNotNull('diemtx');
                $q->whereNotNull('diemgk');
                $q->whereNotNull('diemck');
                $q->whereNotNull('diemck');
                $q->whereNull('diemthilai');
            })
            ->where($where)
            ->having('diemtb','<',5)
            ->get();
        $datatables = DataTables::of($diem)
            ->addColumn('hotensv', function ($data) {
                return $data->hosv . " " . $data->tensv;
            })
            ->addColumn('diemtb', function ($data) {
               return $data->diemtb;
            })
            ->rawColumns(['rownum', 'hotensv','diemtb']);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }
}
