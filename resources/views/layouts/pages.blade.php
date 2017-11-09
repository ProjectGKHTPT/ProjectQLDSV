@extends('layouts/master')
@section('body_content')
    @include('layouts/loader')
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    @include('layouts/search-top-header')
    @include('layouts/header')
    @include('layouts/menu')
    <section class="content">
        <div class="container-fluid">
    @yield('pages_body_content')
        </div>
    </section>
@endsection