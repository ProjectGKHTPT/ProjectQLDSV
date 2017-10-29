<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect('admin/login')->with('error','Tài khoản hoặc mật khẩu của bạn không đúng.Vui Lòng Kiểm Tra Lại!');
        }

    }
    public function getLogout(){
        Auth::logout();
        return redirect('admin/login');
    }
}
