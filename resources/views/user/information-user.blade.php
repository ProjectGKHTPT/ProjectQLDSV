@extends('adminlte::page')
@section('title','Information-User')
@section('header_css')
@stop
@section('content_header')
    <h1>
        THÔNG TIN CÁ NHÂN
        <small>{{Auth::user()->name}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i>Người sử dụng</a></li>
        <li class="active">Thông Tin</li>
    </ol>
@stop
@section('content')
    <table class="table table-bordered table-striped" id="user_xedit_table">
        <input type="hidden" name="id" id="id_user" value="{{Auth::user()->id}}">
        <tr>
            <th>Hình Đại Diện</th>
            <td data-name="picture" ><img src="image/{{Auth::user()->picture}}"></td>
        </tr>
        <tr>
            <th>Họ Tên</th>
            <td data-name="name">{{Auth::user()->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td data-name="email">{{Auth::user()->email}}</td>
        </tr>
        <tr>
            <th >Mật Khẩu</th>
            <td data-name="password">****************************</td>
        </tr>

    </table>
    {{--<form class="form-horizontal">--}}
        {{--<div class="form-group">--}}
            {{--<label class="control-label col-sm-2" for="name">Họ Tên:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--<input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" id="name" placeholder="Tên Đầy Đủ">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label class="control-label col-sm-2" for="email">Email:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--<input type="email" name="email"  value="{{Auth::user()->email}}"  class="form-control" id="email" placeholder="Nhập Email">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label class="control-label col-sm-2" for="password">Mật Khẩu:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--<input type="password" name="password" value="{{Auth::user()->password}}"  class="form-control" id="password" placeholder="Mật Khẩu">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label class="control-label col-sm-2" for="picture">Hình Đại Diện:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--<input type="file" name="picture"  value="{{Auth::user()->picture}}"  class="form-control" id="picture">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<div class="col-sm-offset-2 col-sm-10">--}}
                {{--<button type="button" class="btn bg-olive btn-flat margin btn_save">Save</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</form>--}}
@stop
@section('css')
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop
@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script>
        $(document).ready(function() {
            //toggle `popup` / `inline` mode
            $.fn.editable.defaults.mode = 'inline';

            //make username editable
            var url="{{route('postInformation')}}";
            var pk=$("#id_user").val();
            var name=$(this).data('name');
            $('#user_xedit_table tr td').editable({
                type: 'text',
                pk: pk,
                validate: function (value) {
                    if($.trim(value) == '') {
                        return 'This field is required';
                    }
                },
                name:name,
                url: url,
                success: function(response, newValue) {
                    console.log(response);
                    if(!response.error)
                        return response.msg;
                }
            });
        });
    </script>
@stop
