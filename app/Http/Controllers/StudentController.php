<?php

namespace App\Http\Controllers;

use App\Sinhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    public function index(){
        return view('student.index');
    }
    public function datajson(Request $request){
        $where = [];
        if (isset($request->search['custom']['typesearch'])){
            if(($request->search['custom']['typesearch'])=="0"){
                if($request->search['custom']['lop']){
                    $where[]= ['lops.malop','like', '%' . trim($request->search['custom']['lop']) . '%'];
                }
                if($request->search['custom']['masv']){
                    $where[]= ['masv','like', '%' . trim($request->search['custom']['masv']) . '%'];
                }
                if($request->search['custom']['hosv']){
                    $where[]= ['hosv','like', '%' . trim($request->search['custom']['hosv']) . '%'];
                }
                if($request->search['custom']['tensv']){
                    $where[]= ['tensv','like', '%' . trim($request->search['custom']['tensv']) . '%'];
                }
                if($request->search['custom']['quequan']) {
                    $where[] = ['quequan', 'like', '%' . trim($request->search['custom']['quequan']) . '%'];
                }
            }
            if (($request->search['custom']['typesearch'])=="1"){
                if($request->search['custom']['lop']){
                $where[]= ['lops.malop',trim($request->search['custom']['lop'])];
                }
                if($request->search['custom']['masv']){
                    $where[]= ['masv',trim($request->search['custom']['masv'])];
                }
                if($request->search['custom']['hosv']){
                    $where[]= ['hosv',trim($request->search['custom']['hosv'])];
                }
                if($request->search['custom']['tensv']){
                    $where[]= ['tensv',trim($request->search['custom']['tensv'])];
                }
                if($request->search['custom']['quequan']) {
                    $where[] = ['quequan',trim($request->search['custom']['quequan'])];
                }
            }
        }

        DB::statement(DB::raw('set @rownum=0'));
        $student=DB::table('sinhviens')->join('lops','sinhviens.lop_id','=','lops.id')->select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'sinhviens.id',
            'masv',
            'hosv',
            'tensv',
            'gioitinh',
            'ngaysinh',
            'quequan',
            'lops.malop AS malopsv'
        ])->where($where)->orderBy('sinhviens.id', 'desc')->get();
        $datatables = DataTables::of($student)
            ->addColumn('hotensv',function ($data){
                return $data->hosv." ".$data->tensv;
            })
            ->addColumn('gioitinhsv',function ($data){
                if($data->gioitinh==1){
                    return 'Nam';
                }else{
                    return 'Nữ';
                }
            })
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
            ->rawColumns([ 'rownum','action','hotensv','gioitinhsv']);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }
    /**
     * Add User
     */
    public function addstudent(Request $request){
        $idmax= DB::table('sinhviens')->max('id');
        $data=$request->only(['add_khoa','add_hosv','add_tensv','add_gioitinh','add_ngaysinh','add_quequan','add_lop','add_monhoc']);
        $masv=(string)date('y');
        if($data['add_khoa']) {
           $masv=$masv.(string)$data['add_khoa'];
        }
        if($idmax<10){
            $masv=$masv.'00'.((int)$idmax+1);
        }elseif ($idmax<100){
            $masv=$masv.'0'.((int)$idmax+1);
        }else{
            $masv=$masv.((int)$idmax+1);
        }
        $id = DB::table('sinhviens')->insertGetId([
            'masv' => $masv,
            'hosv' => $data['add_hosv'],
            'tensv' => $data['add_tensv'],
            'gioitinh' => $data['add_gioitinh'],
            'ngaysinh' => $data['add_ngaysinh'],
            'quequan' => $data['add_quequan'],
            'lop_id' => $data['add_lop'],
            ]);
        foreach ($data['add_monhoc'] as $mh) {
            DB::table('diems')->insert(
                ['monhoc_id' => $mh, 'sinhvien_id' => $id]
            );
        }

        //tau muốn lưu vào bảng điểm 2 giá trị 1,2,3 lúc nãy cho 3 hàng


        //        $table->name=$data['name'];
//        $table->email=$data['email'];
//        $table->password=bcrypt($data['password']);
//        $table->level=$data['level'];
//        $table->picture='user.png';
//        $table->save();
//        return redirect('admin/lockscreen');
        try{
            return Response::json([
                'error' => 0,
                //cái này nek $monhocs thì =1,2,3
                'message' =>  'Thêm thành công sinh viên có mã là'.$masv
            ]);
        }catch (QueryException $e){
            return Response::json([
                'error' => 1,
                'message' =>$e
            ]);
        }
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
