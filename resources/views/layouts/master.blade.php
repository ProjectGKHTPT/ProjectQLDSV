<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin-@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('node_modules/adminbsb-materialdesign/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('node_modules/adminbsb-materialdesign/css/themes/all-themes.css')}}" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    @yield('header_css')
</head>

<body class="theme-red">
@include('layouts/loader')
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
@include('layouts/search-top-header')
@include('layouts/header')
@include('layouts/menu')
@yield('body_content')
<!-- Jquery Core Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/node-waves/waves.js')}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Morris Plugin Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/morrisjs/morris.js')}}"></script>

<!-- ChartJs -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/chartjs/Chart.bundle.js')}}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/flot-charts/jquery.flot.js')}}"></script>
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/flot-charts/jquery.flot.time.js')}}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/js/admin.js')}}"></script>
<script src="{{asset('node_modules/adminbsb-materialdesign/js/pages/index.js')}}"></script>

<!-- Demo Js -->
<script src="{{asset('node_modules/adminbsb-materialdesign/js/demo.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@yield('footer_js')
</body>

</html>