<?php

namespace App\Http\Controllers;

use App\Khoa;
use App\Lop;
use App\Monhoc;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function index(){
        return view('class.index');
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
        $class=DB::table('lops')->join('khoas','lops.khoa_id','=','khoas.id')->select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'lops.id',
            'malop',
            'tenlop',
            'khoa_id',
            'tenkhoa'
        ])->orderBy('lops.id', 'desc')->get();
        $datatables = DataTables::of($class)
            ->addColumn('action', function ($data) {

                return view('modals.btn-action-modal',
                    [
                        'edit' => '#edit_class',
                        'id' => $data->id,
                        'urlEdit' => route('class.editclass', ['id' => $data->id]),
                        'detail' => route('class.getDetail', ['id' => $data->id]),
                        'destroy' => route('class.getDestroy',['id' => $data->id])
                    ]);
            })
            ->rawColumns([ 'rownum', 'action']);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }
    public function addclass(Request $request){
        $data=$request->only(['malop','tenlop','khoa_id']);
        $table= new Lop();
        $table->malop=$data['malop'];
        $table->tenlop=$data['tenlop'];
        $table->khoa_id=$data['khoa_id'];
        $table->save();
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
        $check = DB::table('lops')->where([['malop', $request->malop], ['id', '!=', $request->id]])->count();
        if($check == 0) {
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }
    /**
     * Xóa 1 mục
     */
    public function destroy($id)
    {
        try {
            Lop::destroy($id);
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
     * Edit item id
     */
    public function postEdit(Request $request,$id){
        $model = Lop::find($id);
        $model->malop = $request->edit_malop;
        $model->tenlop = $request->edit_tenlop;
        $model->khoa_id = $request->edit_khoa_id;
        $model->save();
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
        $model = Lop::find($id);
        return Response::json($model);
    }
}
