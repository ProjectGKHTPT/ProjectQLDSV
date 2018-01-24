
<!-- Modal -->
<div id="edit_subject" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Sửa Lớp</b></h4>
            </div>
            <form method="post" data-duplicate="{{route('subject.postDuplicate')}}" action="" id="frm_edit_subject">
                <div class="col-md-12">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="edit_mamon" id="edit_mamon" class="form-control" placeholder="Nhập mã môn học" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="edit_tenmon" id="edit_tenmon" class="form-control" placeholder="Nhập tên môn học" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="number" name="edit_sotinchi" id="edit_sotinchi" class="form-control" placeholder="Nhập số tin chỉ" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="number" name="edit_sotiet" id="edit_sotiet" class="form-control" placeholder="Nhập số tiết" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="number" name="edit_hocky" id="edit_hocky" class="form-control" placeholder="Nhập học kỳ" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="edit_namhoc" id="edit_namhoc" class="form-control" placeholder="Ví dụ: 2017-2018" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-users"></i>
                                    </span>
                                    <div class="form-line">
                                        <select class="selectpicker show-tick form-control" name="edit_giangvien_id" id="edit_giangvien_id" style="width: 100%;" required>
                                            @foreach(App\Giangvien::select('hogv','tengv','id')->get() as $val)
                                                <option value="{{$val->id}}">{{$val->hogv." ".$val->tengv}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-users"></i>
                                    </span>
                                    <div class="form-line">
                                        <select class="selectpicker show-tick form-control" name="edit_lop_id[]" id="edit_lop_id" style="width: 100%;" required>
                                            @foreach(App\lop::pluck('tenlop','id')->all() as $key=>$val)
                                                <option value="{{$key}}">{{$val}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-flat" id="btn_edit_subject">Lưu lại</button>
                    <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>

    </div>
</div>
