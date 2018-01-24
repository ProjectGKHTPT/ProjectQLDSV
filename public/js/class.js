    $(function () {
    $("#khoa_id").select2({
        placeholder: "--Chọn Khoa--",
        allowClear: true,
        minimumResultsForSearch: -1
    });
    $("#edit_giangvien_id").select2({
        placeholder: "--Chọn Khoa--",
        allowClear: true,
        minimumResultsForSearch: -1
    });
    $("#edit_lop_id").select2({
        placeholder: "-- Chọn lớp học --",
        multiple: true,
        minimumResultsForSearch: -1
    });
    $("#type_search").select2({
        minimumResultsForSearch: -1
    });
    $('#btn_add_class').on('click', function (e) {
        e.preventDefault();
        $('#frm_add_class').submit();
    });
    $('#frm_add_class').validate({
        errorClass: 'error-msg-validate',
        rules: {
            malop: {
                required: true,
                remote: {
                    url: $("#frm_add_class").data('duplicate'),
                    type: "post",
                    data: {
                        malop: function() {
                            return $('#frm_add_class #malop').val();
                        }
                    }
                },
            },
            tenlop: {
                required: true,
            },
            khoa_di: {
                required: true,
            }
        }
    });
    $("#frm_add_class").on('submit', function (e) {
        if ($(this).valid()) {
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.post(url, data, function (resp) {
                if (resp.error == 1) {
                    toastr.error(resp.message, 'Thông Báo!', {closeButton: true});
                } else {
                    toastr.success(resp.message, 'Thông Báo!', {closeButton: true});
                    datatable.ajax.reload();
                    $('#add_class').modal('hide');
                    $('#malop').val('');
                    $('#tenlop').val('');
                    $('#khoa_id').val('');
                }
            }, 'json');
            return false;
        }
    });
    /**
     * Edit form
     */
    $('#btn_edit_class').on('click', function (e) {
        e.preventDefault();
        $('#frm_edit_class').submit();
    })
    $('#frm_edit_class').validate({
        errorClass: 'error-msg-validate',
        rules: {
            edit_malop: {
                required: true,
                remote: {
                    url: $("#frm_edit_class").data('duplicate'),
                    type: "post",
                    data: {
                        malop: function() {
                            return $('#frm_edit_class #edit_malop').val();
                        },
                        id:function () {

                            return $('#frm_edit_class #edit_malop').data('item-id');
                        }
                    }
                },
            },
            edit_tenlop: {
                required: true,
            },
            edit_khoa_di: {
                required: true,
            }
        }
    });
        $("#frm_edit_class").on('submit', function (e) {
            if ($(this).valid()) {
                var data = $(this).serializeArray();
                var url = $(this).attr('action');
                $.post(url, data, function (resp) {
                    if (resp.error == 1) {
                        toastr.error(resp.message, 'Thông Báo!', {closeButton: true});
                    } else {
                        toastr.success(resp.message, 'Thông Báo!', {closeButton: true});
                        datatable.ajax.reload();
                        $('#edit_class').modal('hide');
                        $('#edit_malop').val('');
                        $('#edit_tenlop').val('');
                        $('#edit_khoa_id').val('');
                    }
                }, 'json');
                return false;
            }
        });
});