<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function getLogin(){

        return view('admin.login');
    }
    public function postLogin(Request $request){
        if(Auth::attempt(['name'=>$request->username,'password'=>$request->password]))
        {
           return redirect('/');
        }else{
            return redirect('admin/login')->with('error','1');
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
        $data=$request->only(['username','email','password']);
        $table->name=$data['username'];
        $table->email=$data['email'];
        $table->password=bcrypt($data['password']);
        $table->level=0;
        $table->picture='user.png';
        $table->save();
        return redirect('admin/login')->with('error','0');;
//        try{
//            return Response::json([
//                'error' => 0,
//                'message' => 'Đăng Ký thành công. Vui lòng đăng nhập'
//            ]);
//        }catch (\Illuminate\Database\QueryException $e){
//            return Response::json([
//                'error' => 1,
//                'message' => "â".$e
//            ]);
//        }
    }
    public function postDuplicateuser(Request $request){
        $check = DB::table('users')
            ->where('name',$request->username)
            ->orwhere('email',$request->email)->count();
        if($check == 0) {
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }
}
