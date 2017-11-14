<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getLogin(){

        return view('admin.login');
    }
    public function postLogin(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return Response::json([
                'error' => 0,
                'href' => route('index')
            ]);
        }else{
            return Response::json([
                'error' => 1,
                'message' => 'Tài khoản mật khẩu không đúng. Vui lòng kiểm tra lại'
            ]);
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect('admin/login');
    }
    public function getRegister(){
        return view('admin/register');
    }
    public function postRegister(Request $request)
    {
        $table= new User;
        $data=$request->only(['name','email','password']);
        $table->name=$data['name'];
        $table->email=$data['email'];
        $table->password=bcrypt($data['password']);
        $table->level=1;
        $table->picture='user.png';
        $table->save();
//        return redirect('admin/lockscreen');
        try{
            return Response::json([
                'error' => 0,
                'message' => 'Đăng Ký thành công.'
            ]);
        }catch (QueryException $e){
            return Response::json([
                'error' => 1,
                'message' =>$e
            ]);
        }
    }
    /**
     * Ckeck email
     */
    public function postDuplicateemail(Request $request){
        $check = User::where([['email', $request->email], ['id', '!=', $request->id]])->count();
        if($check == 0) {
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }

    public function getListUser(){
        return view('user/list-users');
    }

    public function datajson(Request $request){
        $where = [];
        if (isset($request->search['custom']['typesearch'])){
            if(($request->search['custom']['typesearch'])=="0"){
                if($request->search['custom']['name']){
                    $where[]= ['name','like', '%' . trim($request->search['custom']['name']) . '%'];
                }
                if($request->search['custom']['email']){
                    $where[]= ['email','like', '%' . trim($request->search['custom']['email']) . '%'];
                }
                if($request->search['custom']['level']){
                    $where[]= ['level','like', '%' . trim($request->search['custom']['level']) . '%'];
                }
            }
            if (($request->search['custom']['typesearch'])=="1"){
                if($request->search['custom']['name']){
                    $where[]= ['name',trim($request->search['custom']['name'])];
                }
                if($request->search['custom']['email']){
                    $where[]= ['email',trim($request->search['custom']['email'])];
                }
                if($request->search['custom']['level']){
                    $where[]= ['level',trim($request->search['custom']['level'])];
                }
            }
        }

        DB::statement(DB::raw('set @rownum=0'));
        $listuser=User::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'name',
            'email',
            'picture',
            'level',
        ])->where($where)->orderBy('id', 'desc')->get();
        $datatables = DataTables::of($listuser)
            ->addColumn('level', function ($data) {
                if($data->level==0){
                    return "Admin";
                }else{
                    return "Thành Viên";
                }
            })
            ->addColumn('picture', function ($data) {
                return view('modals.btn-picture-modal',
                    [
                        'picture' => $data->picture,
                    ]);
            })
            ->addColumn('action', function ($data) {

                return view('modals.btn-action-modal',
                    [
                        'edit' => '#edit_user',
                        'id' => $data->id,
                        'urlEdit' => route('postEdit', ['id' => $data->id]),
                        'detail' => route('getDetail', ['id' => $data->id]),
                        'destroy' => route('getDestroy', $data->id)
                    ]);
            })
            ->rawColumns([ 'rownum', 'action','level','picture']);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }

    /**
     * Add User
     */
    public function adduser(Request $request){
        $table= new User;
        $data=$request->only(['name','email','password','level']);
        $table->name=$data['name'];
        $table->email=$data['email'];
        $table->password=bcrypt($data['password']);
        $table->level=$data['level'];
        $table->picture='user.png';
        $table->save();
//        return redirect('admin/lockscreen');
        try{
            return Response::json([
                'error' => 0,
                'message' => 'Đăng Ký thành công.'
            ]);
        }catch (QueryException $e){
            return Response::json([
                'error' => 1,
                'message' =>$e
            ]);
        }
    }
    /**
     * Edit item id
     */
    public function postEdit(Request $request,$id){
        $model = User::find($id);
        $model->name = $request->name;
        $model->email = $request->email;
        $model->level =  $request->level;
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
        $model = User::find($id);
        return Response::json($model);
    }
    /**
     * Xóa 1 mục
     */
    public function destroy($id)
    {
        try {
            User::destroy($id);
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
     * getInformationUser
     */
    public function getInformationUser(){
        if(Auth::check()){
            return view('user/information-user');
        }else{
            return view('admin.login');
        }
    }
    /**
     * postInformation
     */
    public function postInformation(Request $request){
            $value = $request->value;
            $id = $request->pk;
            $name=$request->name;
            if($name=="password")
            {
                $value=bcrypt($value );
            }
            $user = User::find($id);
            $user->update([$name => $value]);
    }
}

