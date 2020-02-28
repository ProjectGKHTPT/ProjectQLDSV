@extends('adminlte::page')
@section('title','Danh sách điểm')
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
                        @foreach(App\Monhoc::pluck('tenmon','mamon')->all() as $key=>$val)
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
            <th>Điểm Thi Lại</th>
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
                    <th contenteditable="true" onBlur="saveToDatabase(this,'diemthilai','{{$st->diem_id}}','{{$st->sv_id}}','{{$st->monhoc_id}}')">{{$st->diemthilai}}</th>
                </tr>
            @endforeach
    </table>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('css/point.css')}} ">
@stop
@section('js')
    <script src="{{ asset('js/point.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.0/js/buttons.html5.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url="{{route('point.savediem')}}";
        $(document).ready(function() {
            var table = $("#custom-table").DataTable({
                // "scrollY": "300px",
                // "scrollCollapse": true,
                // "scrollX": true,
                dom: 'Bfrtip',
                processing: true,
                // serverSide: true,
                autoWidth: true,
                searching: true,
                lengthMenu: [
                    [-1],
                    ['Tất cả']
                ],
                buttons: [
                    {
                        extend: 'excel',
                        text: 'Xuất excel',
                        title: 'Danh sách Điểm sinh viên lớp'+$("#search_lop").val()+"môn học"+$("#search_mh").val(),
                        filename: 'Danh sách Điểm sinh viên lớp'+$("#search_lop").val()+"môn học"+$("#search_mh").val(),
                        header: true,
                        footer: false,
                        className: 'btn btn-warning btn-flat',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6,7,8,9]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        title: 'Danh sách Điểm sinh viên lớp'+$("#search_lop").val()+"môn học"+$("#search_mh").val(),
                        filename: 'Danh sách Điểm sinh viên lớp'+$("#search_lop").val()+"môn học"+$("#search_mh").val(),
                        header: true,
                        footer: false,
                        className: 'btn btn-danger btn-flat',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6,7,8,9]
                        }
                    },
                ],
                // initComplete : function () {
                //     datatable.buttons().container()
                //         .appendTo( $('.my-dt-buttons:eq(0)'));
                // },
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
            $(diem).css("background","#FFF url({{url('image/preloader.gif')}}) no-repeat left center");
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