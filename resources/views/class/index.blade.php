@extends('adminlte::page')
@section('title','Danh sách lớp')
@section('content_header')
    <div class="row">
        {{--{!! Form:: !!}--}}
        <form method="post" id="search-form">
            <div class="col-md-8">
                <div class="btn btn-flat fix-box" style="margin: 0;padding: 0 0 0 12px;">
                    <select name="type-search" id="type_search" class="form-control">
                        <option value="0">Gần Đúng</option>
                        <option value="1">Chính Xác</option>
                    </select>
                    <div class="btn-group wrap-click-drop">
                        <a class="btn bg-teal btn-block btn-flat dropdown-toggle" data-toggle="dropdown"> Tìm kiếm
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-left" style="padding: 10px;width: 300px;">
                            <li>
                                <div class="form-group has-feedback">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" name="search-name" class="form-control" placeholder="Tên Đầy Đủ" id="search-name" >
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-feedback">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" name="search-email" class="form-control" placeholder="Email" id="search-email">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
        <div class="col-md-4">
            <ol class="breadcrumb" style="padding: 16px 0px 0px 150px;margin: 0;background-color: transparent;border-radius: 0;">
                <li><i class="fa fa-user"></i> Lớp</li>
                <li class="active">Danh Sách</li>
            </ol>
        </div>
    </div>
@stop
@section('content')
    @can('admin')
    <!-- Main content -->
    <div class="btn-group pull-right">
        <button type="button" class="btn bg-olive btn-flat margin btn_add_class" data-toggle="modal" data-target="#add_class"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
        {{--<a href="{{route('subject.getDestroy')}}">Xóa</a>--}}
    </div>
    @endcan
    <table class="table table-bordered table-striped" id="custom-table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã Lớp</th>
            <th>Tên Lớp</th>
            <th>Khoa</th>
            @can('admin')
            <th>Hành Động</th>
            @endcan
        </tr>
        </thead>
    </table>
    @can('admin')
    @include('class.add')
    @include('class.edit')
    @endcan
@stop
@section('js')
    <!-- List user JS -->
    <script src="{{ asset('js/class.js')}}"></script>
    <script>
        var url="{{route('class.data_json')}}";
        $(function() {
            datatable = $('#custom-table').DataTable({
//                processing: true,
                serverSide: true,
                autoWidth: false,
                searching: false,
                columnDefs: [
                    {
                        "targets": 0,
                        "className": "text-center",
                        'width':'5%'
                    },
                        @can('admin')
                    {
                        "targets": 4,
                        "className": "text-center",
                    }
                    @endcan
                ],
//            stateSave: true,
                ajax: {
                    url: url,
                    data: function (d) {
//                        d.search.custom = {
//                            name: $('input[name=search-name]').val(),
//                            email: $('input[name=search-email]').val(),
//                            typesearch:$('#type_search').val(),
//
//                        };
                    }
                },
                columns: [
                    {data: 'rownum', name: 'rownum'},
                    {data: 'malop', name: 'malop'},
                    {data: 'tenlop', name: 'tenlop'},
                    {data: 'tenkhoa', name: 'tenkhoa'},
                        @can('admin')
                    {data: 'action', name: 'action'},
                    @endcan




                ],
                language: {
                    "lengthMenu": "Hiển thị _MENU_ bản ghi",
                    "zeroRecords": "Không có bản ghi nào được tìm thấy",
                    "emptyTable": "Không có bản ghi nào được hiển thị",
                    "processing": "Đang xử lý",
                    "search": "Tìm kiếm",
                    "paginate": {
                        "first": "Đầu tiên",
                        "last": "Cuối cùng",
                        "next": "<i class='fa fa-chevron-right' aria-hidden='true'></i>",
                        "previous": "<i class='fa fa-chevron-left' aria-hidden='true'></i>"
                    },
                    "info": "Trình bày _START_ - _END_ trong số _TOTAL_ mục",
                    "infoEmpty": "Trình bày 0 - 0 trong 0 mục"
                },
                lengthMenu: [
                    [5, 10, 20, 50, -1],
                    ['5', '10', '20', '50', 'All']
                ],
                drawCallback: function () {
                }
            });
            datatable.on('draw', function () {
                $('.btn-edit').on('click', function () {
                    var url = $(this).data('detail');
                    var editUrl = $(this).data('url');
                    // var lop_id = new Array();
                    $('#frm_edit_class').attr('action', editUrl);
                    $.get(url, function (resp) {
                        $("#edit_malop").val(resp.malop);
                        $("#edit_tenlop").val(resp.tenlop);
                        $("#edit_khoa_id").val(resp.khoa_id).trigger('change');
                        $("#edit_malop").attr('data-item-id',resp.id);
                    }, 'json');
                });
            });
        });
    </script>
@stop
