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
            <div>
                <span>Vui lòng truy cập email : <b>{{$email}}</b> để lấy mã xác nhận :</span>
            </div>
            <!-- forgot-password credentials (contains the form) -->
            <form class="forgot-password-credentials" action="{{route('admin.postCheckCodeEmail')}}" method="post" id="frm-code-email">
                {{ csrf_field() }}
                <input type="hidden" name="email" value="{{$email}}">
                <div class="input-group" style="width: 160px;margin: auto">
                    <!-- Loader -->
                    <div class="spinner spinner-code-email" style="display: none">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                    <input type="text" name="codeemail" class="form-control" placeholder="Mã Xác Nhận" id="code-email" required>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-flat" id="btn-code-email"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.center -->
@stop
@section('adminlte_js')
    <!-- forgot-password -->
    <script src="{{ asset('js/forgot-password.js')}}"></script>
    <script>
        @if(Session('error')==1)
        toastr.error('Mã xác nhận không đúng. Vui lòng kiểm tra lại !', 'Thông Báo!', {closeButton:true});
        @endif
    </script>
@stop

