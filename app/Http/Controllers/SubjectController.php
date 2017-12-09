<?php

namespace App\Http\Controllers;

use App\Khoa;
use App\Lop;
use App\User;
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
        $subject=Lop::join('khoas','khoas.id','=','lops.khoa_id')->select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'lops.id AS id',
            'tenlopviettat',
            'tenlop',
            'tenkhoa'
        ])->orderBy('lops.id', 'desc')->get();
        $datatables = DataTables::of($subject)
            ->addColumn('action', function ($data) {

                return view('modals.btn-action-modal',
                    [
                        'edit' => '#edit_user',
                        'id' => $data->id,
                        'urlEdit' => route('postEdit', ['id' => $data->id]),
                        'detail' => route('getDetail', ['id' => $data->id]),
                        'destroy' => route('subject.getDestroy',['id' => $data->id])
                    ]);
            })
            ->rawColumns([ 'rownum', 'action','level','picture']);
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
}
