<?php

namespace App\Http\Controllers;

use App\Monhoc;
use App\Sinhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
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
                        'edit' => '#edit_student',
                        'id' => $data->id,
                        'urlEdit' => route('student.postEdit', ['id' => $data->id]),
                        'detail' => route('student.getDetail', ['id' => $data->id]),
                        'destroy' => route('student.getDestroy',['id' => $data->id])
                    ]);
            })
            ->rawColumns([ 'rownum','action','hotensv','gioitinhsv']);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }
    /**
     * Add student
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
        $phancong=DB::table('phancong')->where('lop_id','=',$data['add_lop'])->get();
        $id = DB::table('sinhviens')->insertGetId([
            'masv' => $masv,
            'hosv' => $data['add_hosv'],
            'tensv' => $data['add_tensv'],
            'gioitinh' => $data['add_gioitinh'],
            'ngaysinh' => $data['add_ngaysinh'],
            'quequan' => $data['add_quequan'],
            'lop_id' => $data['add_lop'],
            ]);
        foreach ($phancong as $pc) {
            DB::table('diems')->insert(
                ['monhoc_id' => $pc->monhoc_id, 'sinhvien_id' => $id]
            );
        }
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
    /**
     * Export
     */
    public function getexport(Request $request){
        $lop="";
        die($request);
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
        ])->where($lop)->orderBy('sinhviens.id', 'desc')->get();
        Excel::create('Filename', function($excel) use ($student){

            $excel->sheet('Sheetname', function($sheet) use ($student){
                $sheet->loadView('student.excel.export',['student'=>$student]);
            });
        })->export('xlsx');
    }
    public function postEdit(Request $request,$id){
        $model = Sinhvien::find($id);
        $model->hosv = $request->edit_hosv;
        $model->tensv = $request->edit_tensv;
        $model->gioitinh =  $request->edit_gioitinh;
        $model->ngaysinh =  $request->edit_ngaysinh;
        $model->quequan =  $request->edit_quequan;
        $model->lop_id =  $request->edit_lop;
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
        $model = Sinhvien::find($id);
        return Response::json($model);
    }
    /**
     * Xóa 1 mục
     */
    public function destroy($id)
    {
        try {
            Sinhvien::destroy($id);
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
