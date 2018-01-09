@extends('adminlte::page')
@section('title','List-User')
@section('content_header')
    <div class="row">
        {{--{!! Form:: !!}--}}
            <div class="col-md-8">
                <div class="btn btn-flat fix-box" style="margin: 0;padding: 0 0 0 12px;">
                    {{--<div class="btn-group wrap-click-drop">--}}
                        {{--<a class="btn bg-teal btn-block btn-flat dropdown-toggle" data-toggle="dropdown"> Học bổng--}}
                            {{--<i class="fa fa-angle-down"></i>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu pull-left" style="padding: 10px;width: 300px;">--}}
                            {{--<li>--}}
                                {{--<div class="form-group has-feedback">--}}
                                    {{--<input type="text" name="a" class="form-control" placeholder="Tên Đầy Đủ" id="loap" >--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    <select name="search_lopid" id="search_lopid" class="form-control">
                        @foreach(App\Lop::pluck('malop','id')->all() as $key=>$val)
                            <option value="{{$key}}"  @if($key==$lopid)selected @endif>{{$val}}</option>
                        @endforeach
                    </select>
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
                    <button name="btnstudyresult" onclick="btnstudyresult()" class="btn bg-teal btn-flat">Duyệt</button>

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
                @foreach ($monhoc as $mh)
                <th>{{$mh->tenmon}}</th>
                @endforeach
                <th>Điểm TB</th>
                <th>Điểm Rèn Luyện</th>
                <th>Học lực</th>
            </tr>
        </thead>
        <tbody>
                @foreach($student as $st)
                    @php
                        $rownum=0;
                        $diemtb=0;
                        $dhl=0;
                        $tongstc=0;
                    @endphp
                <tr>
                    <td>{!! ++$rownum !!}</td>
                    <td>{{$st->masv}}</td>
                    <td>{{$st->hosv.' '.$st->tensv}}</td>
                    @foreach ($diem as $d)
                        @if($d->idsv==$st->idsv)
                        <td>
                            @if(($d->diemcc<5 || ($d->diemtx<3 && $d->diemgk<3) ) && $d->diemthilai!=null)
                                0
                                @php
                                    $diemtb+=0;
                                    $tongstc+=$d->sotinchi;
                                @endphp
                            @elseif(($d->diemcc>5 && $d->diemtx>=3 || $d->diemgk>=3) && $d->diemthilai==null)
                                {{(10*$d->diemcc+10*$d->diemtx+30*$d->diemgk+50*$d->diemck)/100}}
                                @php
                                    $diemtb+=((10*$d->diemcc+10*$d->diemtx+30*$d->diemgk+50*$d->diemck)/100)*$d->sotinchi;
                                    $tongstc+=$d->sotinchi;
                                @endphp
                            @else
                                {{(10*$d->diemcc+10*$d->diemtx+30*$d->diemgk+50*$d->diemthilai)/100}}
                                @php
                                    $diemtb+=((10*$d->diemcc+10*$d->diemtx+30*$d->diemgk+50*$d->diemthilai)/100)*$d->sotinchi;
                                    $tongstc+=$d->sotinchi;
                                @endphp
                            @endif
                        </td>
                        @endif
                    @endforeach
                    <td>{{$dhl=$diemtb/$tongstc}}</td>
                    <td>{{$st->diemrl}}</td>
                    <td>
                        @if($dhl>=8)
                            Giỏi
                        @elseif($dhl>=7 && $dhl<8)
                            Khá
                        @elseif($dhl>=6 && $dhl<7)
                            Trung Bình Khá
                        @elseif($dhl>=5 && $dhl<6)
                            Trung bình
                        @else
                            Yếu
                        @endif
                    </td>
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
        function btnstudyresult() {
            var lopid =$("#search_lopid").val();
            var hocky =$("#search_hocky").val();
            var namhoc =$("#search_namhoc").val();
            document.location.href = 'http://projectqldsv.dev/studyresult/'+lopid+'/'+namhoc+'/'+hocky;
        }
        // function xethocbong() {
        //     var lopid =$("#search_lopid").val();
        //     var hocky =$("#search_hocky").val();
        //     var namhoc =$("#search_namhoc").val();
        //     var loaihocbong=$("#loaihocbong").val();
        //     var slg =$("#slg").val();
        //     var slk =$("#slk").val();
        //     var dtb =$("#dtb").val();
        //     var drl =$("#drl").val();
        //     if(loaihocbong=="gioi"){
        //         if(slg.length==0 || drl.length==0 || dtb.length==0){
        //             toastr.error('Vui lòng nhập dữ liệu vào các trường còn trống', 'Thông Báo!', {closeButton: true});
        //         }else {
        //             if(isNaN(slg) || isNaN(drl) ||isNaN(dtb)){
        //                 toastr.error('Vui lòng nhập kiểu dữ liệu số', 'Thông Báo!', {closeButton: true});
        //             }else {
        //                 document.location.href = 'http://projectqldsv.dev/studyresult/'+lopid+'/'+namhoc+'/'+hocky+'/'+dtb+'/'+drl+'/'+slg;
        //             }
        //         }
        //     }
        //     if(loaihocbong=="kha"){
        //         if(slg.length==0 && slk.length==0 ||slg.length==0 && slk.length!=0 ||slg.length!=0 && slk.length==0 ){
        //         }else
        //              {
        //              if(isNaN(slg) || isNaN(slk)){
        //                  alert('Vui lòng nhập kiểu số');
        //             }else {
        //                 document.location.href = 'http://projectqldsv.dev/studyresult/'+lopid+'/'+namhoc+'/'+hocky+'/'+slg+'/'+slk;
        //             }
        //         }
        //     }
        // }
        // $("#loaihocbong").change(function () {
        //     if($("#loaihocbong").val()=="gioi"){
        //         $("#soluong").html('<input onchange="xethocbong()" type="text" name="slg" class="form-control" placeholder="Số lượng học bổng" id="slg"  style="float: right;width: 80%">');
        //     }
        //     if($("#loaihocbong").val()=="kha"){
        //         $("#soluong").html('<input onchange="xethocbong()" type="text" name="slk" class="form-control" placeholder="Số lượng khá" id="slk"  style="float: right;width: 40%">' +
        //             '<input onchange="xethocbong()" type="text" name="slg" class="form-control" placeholder="Số lượng giỏi" id="slg"  style="float: right;width: 40%">');
        //     }
        // })
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