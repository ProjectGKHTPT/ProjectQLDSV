<?php

namespace App\Http\Controllers;

use App\Diem;
use App\Sinhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;

class PointController extends Controller
{
    public function index(){
        return view('points.index');
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
            ->join('diems','diems.sinhvien_id','=','sinhviens.id')
            ->join('monhocs','diems.monhoc_id','=','monhocs.id')
            ->join('lops','sinhviens.lop_id','=','lops.id')
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'hosv',
                'tensv',
                'tenlop',
                'diemcc',
                'diemtx',
                'diemgk',
                'diemck',
                'diemtb',
                'diemrl',

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
}
