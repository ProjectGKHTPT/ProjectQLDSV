@extends('adminlte::page')
@section('title','List-User')
@section('content_header')
    <div class="row">
        {{--{!! Form:: !!}--}}
        <form method="post" id="search-form">
            <div class="col-md-8">
                <div class="btn btn-flat fix-box" style="margin: 0;padding: 0 0 0 12px;">
                    <select name="search_lop" id="search_lop" class="form-control">
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
                                    {{--<input type="text" name="a" class="form-control" placeholder="Tên Đầy Đủ" id="loap" >--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div class="form-group has-feedback">--}}
                                    {{--<span class="fa fa-search form-control-feedback"></span>--}}
                                    {{--<input type="text" name="search-email" class="form-control" placeholder="Email" id="search-email">--}}
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
    {{--<div class="btn-group pull-right">--}}
        {{--<button type="button" class="btn bg-olive margin btn-flat btn_add_user" data-toggle="modal" data-target="#add_subject"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>--}}
        {{--{!! Form::select('mon_id', \App\Monhoc::pluck('tenmon','id')->all(), null, ['id'=>'mon_id', 'class'=>'form-control']) !!}--}}
        {{--<a href="{{route('subject.getDestroy')}}">Xóa</a>--}}
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
        </tr>
        </thead>
            @foreach ($student as $st)
                <tr>
                    <th>{{$st->rownum}}</th>
                    <th>{{$st->masv}}</th>
                    <th>{{$st->hosv.' '.$st->tensv}}</th>
                    <th>{{$st->malop}}</th>
                    <th>{{$st->mamon}}</th>
                    <th contenteditable="true" onBlur="saveToDatabase(this,'diemcc','{{$st->diem_id}}','{{$st->sv_id}}','{{$st->monhoc_id}}')">{{$st->diemcc}}</th>
                    <th contenteditable="true" onBlur="saveToDatabase(this,'diemtx','{{$st->diem_id}}','{{$st->sv_id}}','{{$st->monhoc_id}}')">{{$st->diemtx}}</th>
                    <th contenteditable="true" onBlur="saveToDatabase(this,'diemgk','{{$st->diem_id}}','{{$st->sv_id}}','{{$st->monhoc_id}}')">{{$st->diemgk}}</th>
                    <th contenteditable="true" onBlur="saveToDatabase(this,'diemck','{{$st->diem_id}}','{{$st->sv_id}}','{{$st->monhoc_id}}')">{{$st->diemck}}</th>
                </tr>
            @endforeach
    </table>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('css/point.css')}} ">
@stop
@section('js')
    <script src="{{ asset('js/point.js')}}"></script>
    <script>
        var url="{{route('point.savediem')}}";
        $(document).ready(function() {
            var table = $("#custom-table").DataTable({
                // "scrollY": "300px",
                // "scrollCollapse": true,
                // "scrollX": true,
                processing: true,
                // serverSide: true,
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
                    "infoFiltered":   "(được lọc từ tổng số _MAX_ mục nhập)",
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
            // table.search(search_lop).draw();
            // $('#search_lop, #search_mh').on( 'change', function () {
            //     table.search( this.value ).draw();
            // } );
            $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var search_lop = $('#search_lop').val();
                    var search_mh = $('#search_mh').val();
                    var lop = data[3]; // use data for the age column
                    var mh = data[4]; // use data for the age column
                    if (search_lop == lop && search_mh == mh) {
                        return true
                    }
                    return false;

                }
            );
            // Event listener to the two range filtering inputs to redraw on input
            $('#search_lop').change(function () {
                $('#search_mh').val('').trigger('change');
            });
            $('#search_mh').change(function () {
                table.draw();
            });
        });
        function saveToDatabase(diem,column,diem_id,sv_id,monhoc_id) {
            $(diem).css("background","#FFF url({{url('image/preloader.gif')}}) no-repeat right");
            // $(diem).css("background"," url(https://media.giphy.com/media/EhTIih4rcMoSI/source.gif) no-repeat right");
            $.ajax({
                url: url,
                type: "POST",
                data: {diem: diem.innerHTML, column: column, diem_id: diem_id,sv_id: sv_id,monhoc_id: monhoc_id},
                success: function(data){
                    $(diem).css("background","#FDFDFD");
                    // toastr.success(data.message, 'Thông Báo!', {closeButton: true});
                },
                error: function (data) {
                    $(diem).css("background","red");
                }
            });
        }
    </script>
@stop