@extends('adminlte::master')
@section('title', 'Lockscreen')
@section('body_class','lockscreen')
@section('adminlte_css')
@stop
@section('body')
  <!-- Automatic element centering -->
  <div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
      <a href="#"><b>Admin</b></a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name">{{ session('data.email') }}</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
      <!-- lockscreen image -->
      <div class="lockscreen-image">
        <img src="{{asset('image/user.png')}}" alt="User Image">
      </div>
      <!-- /.lockscreen-image -->

      <!-- lockscreen credentials (contains the form) -->
      <form class="lockscreen-credentials" action="{{route('admin.postLockscreen')}}" method="post" id="frm-lockscreen">
        <div class="input-group">
          <input type="hidden" name="email" value="{{ session('data.email') }}">
          <input type="password" name="password" class="form-control" placeholder="password" id="password">

          <div class="input-group-btn">
            <button type="button" class="btn" id="btn-lockscreen"><i class="fa fa-arrow-right text-muted" ></i></button>
          </div>
        </div>
      </form>
      <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
      Nhập mật khẩu của bạn để truy cập vào trang chủ
    </div>
    <div class="text-center">
      <a href="{{route('admin.getLogin')}}">Hoặc đăng nhập bằng một người dùng khác</a>
    </div>
  </div>
  <!-- /.center -->
@stop
@section('adminlte_js')
  <!-- lockscreen -->
  <script src="{{ asset('js/lockscreen.js')}}"></script>
@stop

