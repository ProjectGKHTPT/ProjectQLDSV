@extends('adminlte::page')
@section('title','List-User')
@section('content_header')
    <div class="row">
        {{--{!! Form:: !!}--}}
        <form method="post" id="search-form">
            <div class="col-md-8">
                <div class="btn btn-flat fix-box" style="margin: 0;padding: 0 0 0 12px;">
                    <select name="search_lop" id="search_lop" class="form-control">
                        <option>--Chọn lớp--</option>
                        @foreach(App\Lop::pluck('malop','malop')->all() as $key=>$val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                    <select name="search_mh" id="search_mh" class="form-control">
                        <option>--Chọn môn học--</option>
                        @foreach(App\Monhoc::pluck('mamon','mamon')->all() as $key=>$val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                    {{--<div class="btn-group wrap-click-drop">--}}
                        {{--<a class="btn bg-teal btn-block btn-flat dropdown-toggle" data-toggle="dropdown"> Tìm kiếm--}}
                            {{--<i class="fa fa-angle-down"></i>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu pull-left" style="padding: 10px;width: 300px;">--}}
                            {{--<li>--}}
                                {{--<div class="form-group has-feedback">--}}
                                    {{--<span class="fa fa-search form-control-feedback"></span>--}}
                                    {{--<input type="text" name="search-masv" class="form-control" placeholder="Nhập mã sinh viên" id="search-masv">--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>
            </div>
        </form>
        <div class="col-md-4">
            <ol class="breadcrumb" style="padding: 16px 0px 0px 150px;margin: 0;background-color: transparent;border-radius: 0;">
                <li><a href="#"><i class="fa fa-user"></i> Người sử dụng</a></li>
                <li class="active">Danh Sách</li>
            </ol>
        </div>
    </div>
@stop
@section('content')
    <!-- Main content -->
    {{--<div class="btn-group pull-right"   >--}}
        {{--<div class="btn-group action_btn relative" style="position: relative;">--}}
            {{--<button class="btn btn-info btn-flat margin  dropdown-toggle" type="button" data-toggle="dropdown">--}}
                {{--<i class="fa fa-wrench" aria-hidden="true"></i> Công cụ--}}
                {{--<i class="fa fa-angle-down" aria-hidden="true"></i>--}}
            {{--</button>--}}
            {{--<ul class="dropdown-menu" role="menu" style="min-width: 100%!important;top: 50px;">--}}
                {{--<li>--}}
                    {{--<a class="btn btn-xs btn-flat" tabindex="0" aria-controls="street-table" target="_blank" href="">--}}
                        {{--<i class="fa fa-file-excel-o" aria-hidden="true"></i>--}}
                        {{--<span>Nhập Excel</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a type="button" class="btn btn-xs btn-flat btn_add_user" data-toggle="modal" data-target="#add_student">--}}
                        {{--<i class="fa fa-plus" aria-hidden="true"></i>--}}
                        {{--<span>Thêm</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
    <table class="table table-bordered table-striped" id="custom-table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã sinh viên</th>
            <th>Họ Tên Sinh Viên</th>
            <th>Lớp</th>
            <th>Mã môn học</th>
            <th>Điểm Chuyên Cần</th>
            <th>Điểm Thường Xuyên</th>
            <th>Điểm Giữa Kỳ</th>
            <th>Điểm Cuối Kỳ</th>
            {{--<th>Điểm Trung Bình</th>--}}
        </tr>
        </thead>
        @foreach ($student as $st)
            <tr>
                <th>{{$st->rownum}}</th>
                <th>{{$st->masv}}</th>
                <th>{{$st->hosv.' '.$st->tensv}}</th>
                <th>{{$st->malop}}</th>
                <th>{{$st->mamon}}</th>
                <th>{{$st->diemcc}}</th>
                <th>{{$st->diemtx}}</th>
                <th>{{$st->diemgk}}</th>
                <th>{{$st->diemck}}</th>
                {{--<th>{{$st->diemtb}}</th>--}}
            </tr>
        @endforeach
    </table>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('css/point.css')}} ">
@stop
@section('js')
    <!-- List user JS -->
    <script src="{{ asset('js/point.js')}}"></script>
    <script>

        $(document).ready(function() {
            var table = $("#custom-table").DataTable({
                // "scrollY": "300px",
                // "scrollCollapse": true,
                // "scrollX": true,
                // processing: true,
                // // serverSide: true,
                autoWidth: true,
                searching: true,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, 'Tất cả']
                ],
                language: {
                    "lengthMenu": "Hiển thị _MENU_ bản ghi",
                    "zeroRecords": "Không có bản ghi nào được tìm thấy",
                    "emptyTable": "Không có bản ghi nào được hiển thị",
                    "processing": "Đang xử lý",
                    "search": "Tìm kiếm",
                    "infoFiltered": "(được lọc từ tổng số _MAX_ mục nhập)",
                    "paginate": {
                        "first": "Đầu tiên",
                        "last": "Cuối cùng",
                        "next": "<i class='fa fa-chevron-right' aria-hidden='true'></i>",
                        "previous": "<i class='fa fa-chevron-left' aria-hidden='true'></i>"
                    },
                    "info": "Trình bày _START_ - _END_ trong số _TOTAL_ mục",
                    "infoEmpty": "Trình bày 0 - 0 trong 0 mục"
                },
            });
            // var search_lop= $('#search_lop').val();
            // var search_mh= $('#search_mh').val();
            // var search_masv= $('#search-masv').val();
            // table.search(search_lop).draw();
            // $('#search_lop').on( 'change', function () {
            //    table.columns().search( this.value ).draw();
            // } );
            // $('#search_mh').on( 'change', function () {
            //     table.search( this.value ).draw();
            // } );
            // $('#search-masv').on('keyup',function () {
            //     table.search( this.value ).draw();
            // });
            /* Custom filtering function which will search data in column four between two values */
            $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var search_lop = $('#search_lop').val();
                    var search_mh = $('#search_mh').val();
                    var search_masv = $('#search-masv').val();
                    var lop = data[3]; // use data for the age column
                    var mh = data[4]; // use data for the age column
                    var masv = data[1]; // use data for the age column
                    if (search_lop == lop && search_mh == mh) {
                        return true
                    }
                    return false;

                }
            );
            // Event listener to the two range filtering inputs to redraw on input
            $('#search_lop, #search_mh').change(function () {
                table.draw();
            });
        });

    </script>
@stop
