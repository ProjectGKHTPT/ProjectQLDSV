
<!-- Modal -->
<div id="edit_lecturer" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Sửa Giảng Viên</b></h4>
            </div>
            <form method="post" action="" id="frm_edit_lecturer">
            <div class="col-md-12">
                <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="edit_magv" id="edit_magv" class="form-control" placeholder="Nhập mã giảng viên" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="edit_hogv" id="edit_hogv" class="form-control" placeholder="Nhập họ giảng viên" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="edit_tengv" id="edit_tengv" class="form-control" placeholder="Nhập tên giảng viên" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-users"></i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::select('edit_gioitinh', array(''=>'-- Giới tính --','1' => 'Nam', '0' => 'Nữ'), null, ['id'=>'edit_gioitinh', 'class'=>'change-search-select2 form-control input-sm','style'=>'width:100%']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="date" name="edit_ngaysinh" id="edit_ngaysinh" class="form-control" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="edit_hocham" id="edit_hocham" class="form-control" placeholder="Nhập học hàm giảng viên">
                                    </div>
                                </div>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="edit_hocvi" id="edit_hocvi" class="form-control" placeholder="Nhập học vị giảng viên" >
                                    </div>
                                </div>
                                {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon">--}}
                                            {{--<i class="fa fa-user"></i>--}}
                                        {{--</span>--}}
                                    {{--<div class="form-line">--}}
                                        {{--<textarea name="add_quequan" id="add_quequan" class="form-control" placeholder="Quê quán" required></textarea>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="input-group">--}}
                                    {{--<span class="input-group-addon">--}}
                                        {{--<i class="fa fa-users"></i>--}}
                                    {{--</span>--}}
                                    {{--<div class="form-line">--}}
                                        {{--{!! Form::select('add_lop', \App\Lop::pluck('tenlop', 'id')->all(), null, ['id'=>'add_lop', 'class'=>'change-search-select2 form-control input-sm','style'=>'width:100%']) !!}--}}
                                        {{--<select class="selectpicker show-tick form-control" name="level" id="level" style="width: 100%;" required>--}}
                                        {{--<option></option>--}}
                                        {{--<option value="0">Admin</option>--}}
                                        {{--<option value="1">Thành Viên</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="input-group">--}}
                                    {{--<span class="input-group-addon">--}}
                                        {{--<i class="fa fa-users"></i>--}}
                                    {{--</span>--}}
                                    {{--<div class="form-line">--}}
                                        {{--<select name="add_monhoc[]" id="add_monhoc" class="form-control" style="width: 100%">--}}
                                            {{--@foreach(App\Monhoc::select('monhocs.id AS monhocid','tenmon','hogv','tengv')->join('giangviens','monhocs.giangvien_id','=','giangviens.id')->get() as $val)--}}
                                                {{--<option value="{{$val->monhocid}}">{{$val->tenmon.' ('.$val->hogv.' '.$val->tengv.')'}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                        {{--{!! Form::select('add_monhoc[]', \App\Monhoc::pluck('tenmon', 'id')->all(), null, ['id'=>'add_monhoc', 'class'=>'change-search-select2 form-control input-sm','style'=>'width:100%']) !!}--}}
                                        {{--<select class="selectpicker show-tick form-control" name="level" id="level" style="width: 100%;" required>--}}
                                            {{--<option></option>--}}
                                            {{--<option value="0">Admin</option>--}}
                                            {{--<option value="1">Thành Viên</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-flat" id="btn_edit_lecturer">Cập nhật</button>
                <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
            </div>
            </form>
        </div>

    </div>
</div>
