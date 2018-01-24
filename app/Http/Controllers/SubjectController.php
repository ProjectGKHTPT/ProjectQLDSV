<?php

namespace App\Http\Controllers;

use App\Khoa;
use App\Lop;
use App\Monhoc;
use App\Sinhvien;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index(){
        return view('subjects.index');
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
        $subject=Monhoc::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'monhocs.id as mhid',
            'mamon',
            'tenmon',
            'sotinchi',
            'sotiet',
        ])->orderBy('mhid', 'desc')->get();
        $datatables = DataTables::of($subject)
            ->addColumn('action', function ($data) {

                return view('modals.btn-action-modal',
                    [
                        'edit' => '#edit_subject',
                        'id' => $data->id,
                        'urlEdit' => route('subject.editsubject', ['id' => $data->mhid]),
                        'detail' => route('subject.getDetail', ['id' => $data->mhid]),
                        'destroy' => route('subject.getDestroy',['id' => $data->mhid])
                    ]);
            })
            ->rawColumns([ 'rownum', 'action']);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }
    /**
     * Xóa 1 mục
     */
    public function destroy($id)
    {
        try {
            Monhoc::destroy($id);
            return Response::json([
                'error' => 0,
                'message' => 'Xóa thành công '
            ]);
        } catch (QueryException $e) {
            return Response::json([
                'error' => 1,
                'message' => $e
            ]);
        }

    }
    /**
     * Add User
     */
    public function addsubject(Request $request){
        $data=$request->only(['mamon','tenmon','sotinchi','sotiet','hocky','namhoc','giangvien_id','lop_id']);
        $hocky=DB::table('hockys')->where([
            ['hocky','=',$data['hocky']],
            ['namhoc','=',$data['namhoc']],
        ])->get();
        if($hocky->count()==0){
            $idhk=DB::table('hockys')->insertGetId([
                'hocky' => $data['hocky'],
                'namhoc' => $data['namhoc'],
            ]);
        }else{
            $idhk=$hocky[0]->id;
        }
        $idmh=DB::table('monhocs')->insertGetId(
            [
                'mamon' => $data['mamon'],
                'tenmon' => $data['tenmon'],
                'sotinchi' => $data['sotinchi'],
                'sotiet' => $data['sotiet'],
                'hocky_id' => $idhk,
            ]
        );
        if ($idhk && $idmh){
            foreach ($data['lop_id'] as $l) {
                DB::table('phancong')->insert([
                    'monhoc_id' => $idmh,
                    'lop_id' => $l,
                    'giangvien_id' => $data['giangvien_id']
                ]);
                $sivi = DB::table('sinhviens')->where('lop_id', '=', $l)->get();
                foreach ($sivi as $sv) {
                    DB::table('diems')->insert(
                        ['monhoc_id' => $idmh, 'sinhvien_id' => $sv->id]
                    );
                }
            }
        }
        try{
            return Response::json([
                'error' => 0,
                'message' => 'Thêm thành công.'
            ]);
        }catch (QueryException $e){
            return Response::json([
                'error' => 1,
                'message' =>$e
            ]);
        }
    }
    public function postDuplicate(Request $request){
        $check = Monhoc::where([['mamon', $request->mamon], ['id', '!=', $request->id]])->count();
        if($check == 0) {
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }
    /**
     * Edit item id
     */
    public function postEdit(Request $request,$id){
        $where=[];
        $hocky=DB::table('hockys')->where([
            ['hocky','=',$request->edit_hocky],
            ['namhoc','=',$request->edit_namhoc],
        ])->get();
        if($hocky->count()==0){
            $idhk=DB::table('hockys')->insertGetId([
                'hocky' => $request->edit_hocky,
                'namhoc' => $request->edit_namhoc,
            ]);
        }else{
            $idhk=$hocky[0]->id;
        }
        $model = Monhoc::find($id);
        $model->mamon = $request->edit_mamon;
        $model->tenmon = $request->edit_tenmon;
        $model->sotinchi = $request->edit_sotinchi;
        $model->sotiet = $request->edit_sotiet;
        $model->hocky_id = $idhk;
        $model->save();
        DB::table('phancong')->where('monhoc_id','=',$id)->delete();
        foreach ($request->edit_lop_id as $l){
            DB::table('phancong')->insert([
                'monhoc_id'=>$id,
                'lop_id'=>$l,
                'giangvien_id'=>$request->edit_giangvien_id
            ]);
        }
        try{
            return Response::json([
                'error' => 0,
                'message' => 'Sửa Thành Công '.$request->name
            ]);
        }catch (QueryException $e){
            return Response::json([
                'error' => 1,
                'message' =>$e
            ]);
        }
    }
    public function detail($id)
    {
        $model = Monhoc::join('phancong','monhocs.id','=','phancong.monhoc_id')
            ->join('hockys','monhocs.hocky_id','=','hockys.id')
            ->where('monhocs.id','=',$id)->get();
        return Response::json($model);
    }
}
