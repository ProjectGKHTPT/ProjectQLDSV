
<!-- Modal -->
<div id="add_class" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Thêm Lớp</b></h4>
            </div>
            <form method="post" data-duplicate="{{route('class.postDuplicate')}}" action="{{route('class.addclass')}}" id="frm_add_class">
            <div class="col-md-12">
                <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="malop" id="malop" class="form-control" placeholder="Nhập mã lớp học" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="tenlop" id="tenlop" class="form-control" placeholder="Nhập tên lớp học" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-users"></i>
                                    </span>
                                    <div class="form-line">
                                        <select class="selectpicker show-tick form-control" name="khoa_id" id="khoa_id" style="width: 100%;" required>
                                            @foreach(App\Khoa::pluck('tenkhoa','id')->all() as $key=>$val)
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
                <button type="button" class="btn btn-info btn-flat" id="btn_add_class">Lưu lại</button>
                <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
            </div>
            </form>
        </div>

    </div>
</div>
