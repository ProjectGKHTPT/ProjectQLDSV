<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lockscreen | Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('node_modules/adminbsb-materialdesign/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/css/fonts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('node_modules/adminbsb-materialdesign/css/icon.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('node_modules/adminbsb-materialdesign/css/toastr.min.css')}}" rel="stylesheet">
    <style>
        .lockscreen .lockscreen-name {
            text-align: center;
            font-weight: 600;
        }
        .lockscreen-image {
            border-radius: 50%;
            position: absolute;
            /* left: -10px; */
            /* top: 32px; */
            background: #fff;
            padding: 5px;
            z-index: 10;
        }
        .lockscreen-image img{
            border-radius: 50%;
        }
        .lockscreen-credentials .form-control {
            border: 0;
            margin-top: 25px;
            padding-left: 40px;
            padding-right: 40px;
        }
        .input-group-btn {
            position: absolute;
            right: 35px;
            top: 24px;
            z-index: 999;
        }
        .input-group .form-control, .input-group-addon, .input-group-btn {
            display: table-cell;
        }
        .input-group .form-control {
            position: relative;
            z-index: 2;
            float: left;
            width: 100%;
            margin-bottom: 0;
        }
        .lockscreen-image>img {
            border-radius: 50%;
            width: 70px;
            height: 70px;
        }
        .lockscreen-credentials {
            margin-left: 45px;
        }
    </style>
</head>

<body class="signup-page lockscreen">
<div class="signup-box">
    <div class="logo">
        <a href="javascript:void(0);">Admin</a>
        <small>Quản Lý Điểm Sinh Viên </small>
    </div>
        <div class="body">
            <div class="lockscreen-name">{!! @$datas['username'] !!}</div>

            <!-- START LOCK SCREEN ITEM -->
            <div class="lockscreen-item">
                <!-- lockscreen image -->
                <div class="lockscreen-image">
                    <img src="{{Url('images/user.png')}}" width="" alt="User Image">
                </div>
            <form id="frm_lockscreen" class="lockscreen-credentials" method="POST" action="{{route('admin.postLockscreen')}}">
                {{ csrf_field() }}
                <input type="hidden" name="username" value="{!! @$datas['username'] !!}">
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default waves-effect btn-lockscreen"><i class="material-icons">arrow_forward</i></button>
                    </div>
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
<script src="{{asset('pages.blade.php')}}"></script>
<script src="{{asset('node_modules/adminbsb-materialdesign/js/toastr.min.js')}}"></script>
<script>
   $(document).ready(function(){
       $("#password").keydown(function(event) {
           var key=event.which || event.keyCode;
          if(key==13){
              event.preventDefault();
              $('#frm_lockscreen').submit();
          }
       });
       $(".btn-lockscreen").click(function(e){
           e.preventDefault();
           $('#frm_lockscreen').submit();
       });
       $('#frm_lockscreen').validate({
           errorClass: 'error-msg-validate',
           rules: {
               password:{
                   required: true,
               }
           }
       });
        $("#frm_lockscreen").on('submit',function (e) {
            if($(this).valid()) {
                var data = $(this).serializeArray();
                var url = $(this).attr('action');
                $.post(url, data, function (resp) {
                    if(resp.error==1)
                    {
                        toastr.error(resp.message, 'Thông Báo!', {closeButton:true});
                    }else{
                        window.location.href=resp.href;
                    }
                }, 'json');
                return false;
            }
        });
   });
</script>
</body>

</html>