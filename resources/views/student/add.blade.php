
<!-- Modal -->
<div id="add_subject" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Thêm Lớp</b></h4>
            </div>
            <form method="post" action="{{route('adduser')}}" data-duplicateemail="{{route('admin.postDuplicateemail')}}" id="frm_add_user">
            <div class="col-md-12">
                <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    <div class="form-line">
                                        <input type="text" name="tenlop" id="name" class="form-control" placeholder="Nhập tên lớp" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-users"></i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::select('add_khoa', \App\Khoa::pluck('tenkhoa', 'id')->all(), null, ['id'=>'add_khoa', 'class'=>'change-search-select2 form-control input-sm','style'=>'width:100%']) !!}
                                        {{--<select class="selectpicker show-tick form-control" name="level" id="level" style="width: 100%;" required>--}}
                                            {{--<option></option>--}}
                                            {{--<option value="0">Admin</option>--}}
                                            {{--<option value="1">Thành Viên</option>--}}
                                        {{--</select>--}}
                                    </div>
                                </div>

                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-flat" id="btn_add_user">Lưu lại</button>
                <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
            </div>
            </form>
        </div>

    </div>
</div>
