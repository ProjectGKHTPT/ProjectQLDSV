@extends('adminlte::page')
@section('title','Xét học bổng')
@section('content_header')
    <div class="row">
        {{--{!! Form:: !!}--}}
            <div class="col-md-8">
                <div class="btn btn-flat fix-box" style="margin: 0;padding: 0 0 0 12px;">
                    <select name="search_namhoc" id="search_namhoc" class="form-control">
                        @foreach(\Illuminate\Support\Facades\DB::table('hockys')->pluck('namhoc','namhoc')->all() as $key=>$val)
                            <option value="{{$key}}" @if($key==$namhoc)selected @endif>{{$val}}</option>
                        @endforeach
                    </select>
                    <select name="search_hocky" id="search_hocky" class="form-control">
                        @foreach(\Illuminate\Support\Facades\DB::table('hockys')->pluck('hocky','hocky')->all() as $key=>$val)
                            <option value="{{$key}}" @if($key==$hocky)selected @endif>{{$val}}</option>
                        @endforeach
                    </select>
                    <select name="search_hocky" id="search_hocbong" class="form-control">
                        <option value="0" @if($hocbong==0)selected @endif>Giỏi</option>
                        <option value="1" @if($hocbong==1)selected @endif>Khá</option>
                    </select>
                    <button name="btnstudyresult" onclick="btnscholarship()" class="btn bg-teal btn-flat">Duyệt</button>

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
    {{--<div style="float: right;width: 50%">--}}
        {{--<select name="loaihocbong" id="loaihocbong" class="form-control" style="float: left;width: 30%">--}}
            {{--<option value="gioi" >Giỏi</option>--}}
            {{--<option value="kha" >Khá</option>--}}
        {{--</select>--}}
        {{--<div id="soluong" style="display: inline">--}}
            {{--<input onchange="xethocbong()" type="text" name="slg" class="form-control" placeholder="Số lượng học bổng" id="slg"  style="float: right;width: 30%">--}}
            {{--<input type="text" name="drl" class="form-control" placeholder="Điểm RL" id="drl"  style="float: right;width: 20%">--}}
            {{--<input type="text" name="dtb" class="form-control" placeholder="Điểm TB" id="dtb"  style="float: right;width: 20%">--}}
        {{--</div>--}}
    {{--</div>--}}
    <table class="table table-bordered table-striped" id="custom-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Sinh Viên</th>
                <th>Tên Sinh Viên</th>
                <th>Lớp</th>
                <th>Học Bổng</th>
                <th>Năm Học</th>
                <th>Học Kỳ</th>
            </tr>
        </thead>
        <tbody>
                @php
                    $rownum=0;
                @endphp
                @foreach($student as $st)
                <tr>
                    <td>{!! ++$rownum !!}</td>
                    <td>{{$st->masv}}</td>
                    <td>{{$st->hosv.' '.$st->tensv}}</td>
                    <td>
                        {{$st->tenlop}}
                    <td>
                        @if($st->hocbong==0)
                            Giỏi
                        @elseif($st->hocbong==1)
                            Khá
                        @endif
                    </td>
                    <td>{{$st->namhoc}}</td>
                    <td>{{$st->hocky}}</td>

                </tr>
                @endforeach
        </tbody>

    </table>
@stop
@section('css')
@stop
@section('js')
    <script src="{{ asset('js/studyresult.js')}}"></script>
    <script>
        function hocbong(svid,hb) {
            var url="{{route('scholarship.hocbong')}}";
            var hocky =$("#search_hocky").val();
            $.ajax({
                url: url,
                type: "POST",
                data: {svid: svid, hocbong: hb.innerHTML, hocky: hocky},
                success: function(data){
                    if (data.error==0){
                        toastr.success(data.message, 'Thông Báo!', {closeButton: true});
                    }else {
                        toastr.error(data.message, 'Thông Báo!', {closeButton: true});
                        $(hb).html(" ");
                    }

                },
                error: function (data) {
                }
            });
        }
        function btnscholarship() {
            var hocky =$("#search_hocky").val();
            var namhoc =$("#search_namhoc").val();
            var hocbong =$("#search_hocbong").val();
            document.location.href = '/scholarship/'+namhoc+'/'+hocky+'/'+hocbong;
        }
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
            // $.fn.dataTable.ext.search.push(
            //     function (settings, data, dataIndex) {
            //         var lopid =$("#search_lopid").val();
            //         var hocky =$("#search_hocky").val();
            //         var namhoc =$("#search_namhoc").val();
            //         var loaihocbong=$("#loaihocbong").val();
            //         var slg =$("#slg").val();
            //         var slk =$("#slk").val();
            //         var dtb =$("#dtb").val();
            //         var drl =$("#drl").val();
            //         var ddtb = data[5]; // use data for the age column
            //         var ddrl = data[6]; // use data for the age column
            //         if (loaihocbong=="gioi") {
            //             if(dtb > ddtb && drl>ddrl){
            //                 return true
            //             }
            //         }
            //         if (loaihocbong=="gioi") {
            //             if(dtb > ddtb && drl>ddrl){
            //                 return true
            //             }
            //         }
            //         return false;
            //
            //     }
            // );
            // // Event listener to the two range filtering inputs to redraw on input
            // // $('#search_lop').change(function () {
            // //     $('#search_mh').val('').trigger('change');
            // // });
            // $('#search_mh').change(function () {
            //     table.draw();
            // });
        });
    </script>
@stop