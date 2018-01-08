<?php

namespace App\Http\Controllers;

use App\Diem;
use App\Lop;
use App\Monhoc;
use App\Sinhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;

class PointController extends Controller
{
    public function index(){
        DB::statement(DB::raw('set @rownum=0'));
        $student=DB::table('sinhviens')
            ->join('diems','sinhviens.id','=','diems.sinhvien_id')
            ->join('monhocs','diems.monhoc_id','=','monhocs.id')
            ->join('lops','sinhviens.lop_id','=','lops.id')
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'masv',
                'hosv',
                'tensv',
                'malop',
                'diemcc',
                'diemtx',
                'diemgk',
                'diemck',
                'mamon',
                'sinhviens.id AS sv_id',
                'diems.id AS diem_id',
                'monhocs.id AS monhoc_id'
            ])->get();
        return view('points.index',['student'=>$student]);
    }
    public function datajson(Request $request){
        $where = [];
//        if (isset($request->search['custom']['typesearch'])){
//            if(($request->search['custom']['typesearch'])=="0"){
//                if($request->search['custom']['name']){
//                    $where[]= ['name','like', '%' . trim($request->search['custom']['name']) . '%'];
//                }
//                if($request->search['custom']['email']){
//                    $where[]= ['email','like', '%' . trim($request->search['custom']['email']) . '%'];
//                }
//            }
//            if (($request->search['custom']['typesearch'])=="1"){
//                if($request->search['custom']['name']){
//                    $where[]= ['name',trim($request->search['custom']['name'])];
//                }
//                if($request->search['custom']['email']){
//                    $where[]= ['email',trim($request->search['custom']['email'])];
//                }
//            }
//        }

        DB::statement(DB::raw('set @rownum=0'));
        $student=DB::table('sinhviens')
            ->leftJoin('diems','sinhviens.id','=','diems.sinhvien_id')
            ->leftJoin('monhocs','diems.monhoc_id','=','monhocs.id')
            ->leftJoin('lops','sinhviens.lop_id','=','lops.id')
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'hosv',
                'tensv',
                'tenlop',
                'diemcc',
                'diemtx',
                'diemgk',
                'diemck',
                'sinhviens.id AS sv_id',
                'diems.id AS diem_id',
                'monhocs.id AS monhoc_id'

            ])->get();
        $datatables = DataTables::of($student)
            ->addColumn('hotensv',function ($data){
                return $data->hosv." ".$data->tensv;
            })
            ->rawColumns([ 'rownum','hotensv']);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }
//    /**
//     * Xóa 1 mục
//     */
//    public function destroy($id)
//    {
//        try {
//            Lop::destroy($id);
//            return Response::json([
//                'error' => 0,
//                'message' => 'Xóa thành công '
//            ]);
//        } catch (QueryException $e) {
//            return Response::json([
//                'error' => 1,
//                'message' => $e
//            ]);
//        }
//
//    }
    public function savediem(Request $request){
        $diemso =$_POST['diem'];
        $sv_id=$_POST['sv_id'];
        $monhoc_id=$_POST['monhoc_id'];
        $diem_id=$_POST['diem_id'];
        $column=$_POST['column'];
        if ($diemso=="")
        {
            $diemso=null;
        }
        if($column=='diemcc')
        {
            $diem = Diem::find($diem_id);
            $diem->diemcc=$diemso;
            $diem->sinhvien_id=$sv_id;
            $diem->monhoc_id=$monhoc_id;
            $diem->save();
            return Response::json([
                'error' => 1,
                'message' => 'Lưu thành công'
            ]);
        }
        if($column=='diemtx')
        {
            $diem = Diem::find($diem_id);
            $diem->diemtx=$diemso;
            $diem->sinhvien_id=$sv_id;
            $diem->monhoc_id=$monhoc_id;
            $diem->save();
            return Response::json([
                'error' => 1,
                'message' => 'Lưu thành công'
            ]);
        }
        if($column=='diemgk')
        {
            $diem = Diem::find($diem_id);
            $diem->diemgk=$diemso;
            $diem->sinhvien_id=$sv_id;
            $diem->monhoc_id=$monhoc_id;
            $diem->save();
            return Response::json([
                'error' => 1,
                'message' => 'Lưu thành công'
            ]);
        }
        if($column=='diemck')
        {
            $diem = Diem::find($diem_id);
            $diem->diemck=$diemso;
            $diem->sinhvien_id=$sv_id;
            $diem->monhoc_id=$monhoc_id;
            $diem->save();
            return Response::json([
                'error' => 1,
                'message' => 'Lưu thành công'
            ]);
        }

    }
    public function userindex(){
        DB::statement(DB::raw('set @rownum=0'));
        $student=DB::table('sinhviens')
            ->join('diems','sinhviens.id','=','diems.sinhvien_id')
            ->join('monhocs','diems.monhoc_id','=','monhocs.id')
            ->join('lops','sinhviens.lop_id','=','lops.id')
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'masv',
                'hosv',
                'tensv',
                'malop',
                'diemcc',
                'diemtx',
                'diemgk',
                'diemck',
                'mamon',
                'sinhviens.id AS sv_id',
                'diems.id AS diem_id',
                'monhocs.id AS monhoc_id'
            ])->get();
        return view('points.userindex',['student'=>$student]);
    }
}
