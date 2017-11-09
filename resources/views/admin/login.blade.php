<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login | Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('node_modules/adminbsb-materialdesign/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/css/fonts.css')}}" rel="stylesheet">
    <link href="{{asset('node_modules/adminbsb-materialdesign/css/icon.css')}}" rel="stylesheet">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('node_modules/adminbsb-materialdesign/css/toastr.min.css')}}" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Admin</a>
        <small>Quản Lý Điểm Sinh Viên </small>
    </div>
    <div class="card">
        <div class="body">
            <form id="frm_sign_in" method="POST" action="{{route('admin.postLogin')}}">
                {{ csrf_field() }}
                <div class="msg">Đăng Nhập</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">Remember Me</label>
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="button" id="btn_sign_in">SIGN IN</button>
                    </div>
                </div>
                <div class="row">
                    <a href="{{route('admin.getRegister')}}" style="size: 7px;float: right">Đăng Ký Tài Khoản Sinh Viên</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Jquery Core Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/node-waves/waves.js')}}"></script>

<!-- Validation Plugin Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/jquery-validation/jquery.validate.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/js/admin.js')}}"></script>
<script src="{{asset('node_modules/adminbsb-materialdesign/js/pages/examples/sign-in.js')}}"></script>
<script src="{{asset('node_modules/adminbsb-materialdesign/js/toastr.min.js')}}"></script>
    @if(session('error')=="1")
        <script> toastr.error('Tài Khoản Hoặc Mật Khẩu Của Bạn Không Đúng. Vui Lòng Kiểm Tra Lại!', 'Thông Báo!',{"closeButton": true, "progressBar": true});</script>
    @elseif(session('error')=="0")
        <script> toastr.success('Đăng Ký Thành Công Vui Lòng Đăng nhập', 'Thông Báo!',{"closeButton": true, "progressBar": true});</script>
    @endif
</body>

</html>