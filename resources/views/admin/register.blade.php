@extends('adminlte::master')
@section('title', 'Register')
@section('body_class','register-page')
@section('adminlte_css')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css')}}">
@stop
@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>Admin</b></a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Đăng Ký</p>

            <form action="{{route('admin.postRegister')}}" data-duplicateemail="{{route('admin.postDuplicateemail')}}" method="post" id="frm-register">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <input type="text" name="name" class="form-control" placeholder="Tên Đầy Đủ" required>
                </div>
                <div class="form-group has-feedback">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <input type="email" name="email" class="form-control" placeholder="Email" id="email" required>
                </div>
                <div class="form-group has-feedback">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <input type="password" name="password" class="form-control" placeholder="Mật Khẩu" id="password" minlength="6" required>
                </div>
                <div class="form-group has-feedback">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    <input type="password" name="repassword" class="form-control" placeholder="Nhập Lại Mật Khẩu" minlength="6" required>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        {{--<div class="checkbox icheck">--}}
                            {{--<label>--}}
                                {{--<input type="checkbox"> I agree to the <a href="#">terms</a>--}}
                            {{--</label>--}}
                        {{--</div>--}}
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" id="btn-register">Đăng Ký</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <a href="{{route('admin.getLogin')}}" class="text-center">Tôi đã có một thành viên</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
@stop
@section('adminlte_js')
    <!-- iCheck -->
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js')}}"></script>
    <!-- Login -->
    <script src="{{ asset('js/register.js')}}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    
@stop
