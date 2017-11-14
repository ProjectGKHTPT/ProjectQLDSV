@extends('adminlte::master')
@section('title', 'Login')
@section('body_class','login-page')
@section('adminlte_css')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css')}}">
@stop
@section('body')
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Đăng Nhập</p>

            <form action="{{route('admin.postLogin')}}" method="post" id="frm-login">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <input type="email" name="email" class="form-control" placeholder="Email" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="email" required>
                </div>
                <div class="form-group has-feedback">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="button" class="btn btn-primary btn-block btn-flat" id="btn-login">Đăng Nhập</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <a href="#">I forgot my password</a><br>
            <a href="{{route('admin.getRegister')}}" class="text-center">Register a new membership</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@stop
@section('adminlte_js')
    <!-- iCheck -->
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js')}}"></script>
    <!-- Login -->
    <script src="{{ asset('js/login.js')}}"></script>
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