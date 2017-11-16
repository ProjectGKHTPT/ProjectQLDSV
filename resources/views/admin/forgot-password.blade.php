@extends('adminlte::master')
@section('title', 'Lockscreen')
@section('body_class','lockscreen')
@section('adminlte_css')
    <!-- Custom css forgot password -->
    <link rel="stylesheet" href="{{ asset('css/forgot-password.css')}}">
@stop
@section('body')
    <!-- Automatic element centering -->
    <div class="forgot-password-wrapper">
        <div class="forgot-password-logo">
            <a href="#"><b>Admin</b></a>
        </div>
        <!-- START LOCK SCREEN ITEM -->
        <div class="forgot-password-item">

            <!-- forgot-password credentials (contains the form) -->
            <form class="forgot-password-credentials" action="{{route('admin.postForgotPassword')}}" method="post" id="frm-forgot-password">
                <div class="input-group">
                    <img src="{{asset('image/preloader.gif')}}" id="preloader" style="display: none;">
                    <input type="email" name="email" class="form-control" placeholder="Email của bạn" id="email" required>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-flat" id="btn-forgot-password"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
                <div class="input-group" id="frm-code-mail" style="display: none">
                    <div style="position: relative;">
                        <label>Truy cập email của bạn để lấy mã xác nhận</label>
                        <img src="{{asset('image/preloader.gif')}}" id="preloader-code-mail" style="position: absolute;left: 66px;width: 90px;top: 14px;">
                        <input type="text" name="code-mail" class="form-control animated fadeInUp" placeholder="Mã xác nhận" id="code-mail" required>
                    </div>
                </div>
            </form>
            {{--<form class="forgot-password-credentials" action="{{route('admin.postCheckCodeEmail')}}" method="post" id="frm-code-mail" style="display: none">--}}
                {{--<div style="position: relative;">--}}
                    {{--<label>Truy cập email của bạn để lấy mã xác nhận</label>--}}
                    {{--<img src="{{asset('image/preloader.gif')}}" id="preloader-code-mail" style="position: absolute;left: 66px;width: 90px;top: 14px;">--}}
                    {{--<input type="text" name="code-mail" class="form-control animated fadeInUp" placeholder="Mã xác nhận" id="code-mail" required>--}}
                {{--</div>--}}
            {{--</form>--}}
            <!-- /.forgot-password credentials -->

        </div>
        <!-- /.forgot-password-item -->
        <div class="help-block text-center">
            Nhập Email của bạn
        </div>
        <div class="text-center">
            <a href="{{route('admin.getLogin')}}">Hoặc đăng nhập bằng một người dùng khác</a>
        </div>
    </div>
    <!-- /.center -->
@stop
@section('adminlte_js')
    <!-- forgot-password -->
    <script src="{{ asset('js/forgot-password.js')}}"></script>
@stop

