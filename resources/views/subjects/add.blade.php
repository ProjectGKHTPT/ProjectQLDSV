
<!-- Modal -->
<div id="add_subject" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Thêm Lớp</b></h4>
            </div>
            <form method="post" data-duplicate="{{route('subject.postDuplicate')}}" action="{{route('subject.addsubject')}}" id="frm_add_subject">
            <div class="col-md-12">
                <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="mamon" id="mamon" class="form-control" placeholder="Nhập mã môn học" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="tenmon" id="tenmon" class="form-control" placeholder="Nhập tên môn học" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="number" name="sotinchi" id="sotinchi" class="form-control" placeholder="Nhập số tin chỉ" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="number" name="sotiet" id="sotiet" class="form-control" placeholder="Nhập số tiết" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="number" name="hocky" id="hocky" class="form-control" placeholder="Nhập học kỳ" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="namhoc" id="namhoc" class="form-control" placeholder="Ví dụ: 2017-2018" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-users"></i>
                                    </span>
                                    <div class="form-line">
                                        <select class="selectpicker show-tick form-control" name="giangvien_id" id="giangvien_id" style="width: 100%;" required>
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
                                        <select class="selectpicker show-tick form-control" name="lop_id[]" id="lop_id" style="width: 100%;" required>
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
                <button type="button" class="btn btn-info btn-flat" id="btn_add_subject">Lưu lại</button>
                <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
            </div>
            </form>
        </div>

    </div>
</div>
