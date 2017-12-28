$(function () {
    $("#add_monhoc").select2({
        placeholder: "--Chọn môn học--",
        multiple: true,
    });
    $("#add_gioitinh").select2({
        placeholder: "--Giới Tính--",
        allowClear: true,
        minimumResultsForSearch: -1
    });
    $("#edit_gioitinh").select2({
        placeholder: "--Giới Tính--",
        allowClear: true,
        minimumResultsForSearch: -1
    });
    $("#type_search").select2({
        minimumResultsForSearch: -1,
    });
    $("#type_search").change(function () {
       $("#search-lop").val("");
       $("#search-masv").val("");
       $("#search-hosv").val("");
       $("#search-tensv").val("");
       $("#search-quequan").val("");
        datatable.ajax.reload();
    });
    $('#btn_add_lecturer').on('click', function (e) {
        e.preventDefault();
        $('#frm_add_lucturer').submit();
    });
    $('#frm_add_lucturer').validate({
        errorClass: 'error-msg-validate',
        rules: {
            add_magv: {
                required: true,
            },
            add_hosv: {
                required: true,
            },
            add_tensv: {
                required: true,
            },
            add_gioitinh: {
                required: true,
            },
            add_ngaysinh: {
                required: true,
            },
        }
    });
    $("#frm_add_lucturer").on('submit', function (e) {
        if ($(this).valid()) {
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.post(url, data, function (resp) {
                if (resp.error == 1) {
                    toastr.error(resp.message, 'Thông Báo!', {closeButton: true});
                } else {
                    toastr.success(resp.message, 'Thông Báo!', {closeButton: true});
                    datatable.ajax.reload();
                    $('#add_lecturer').modal('hide');
                }
            }, 'json');
            return false;
        }
    });
    /**
     * Edit form
     */
    $('#btn_edit_lecturer').on('click', function (e) {
        e.preventDefault();

        $('#frm_edit_lecturer').submit();
    })
    $('#frm_edit_student').validate({
        errorClass: 'error-msg-validate',
        rules: {
            edit_magv: {
                required: true,
            },
            edit_hogv: {
                required: true,
            },
            edit_tengv: {
                required: true,
            },
            edit_gioitinh: {
                required: true,
            },
            edit_ngaysinh: {
                required: true,
            },
        }
    });
    $("#frm_edit_lecturer").on('submit', function (e) {
        if ($(this).valid()) {
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.post(url, data, function (resp) {
                if (resp.error == 1) {
                    toastr.error(resp.message, 'Thông Báo!', {closeButton: true});
                } else {
                    toastr.success(resp.message, 'Thông Báo!', {closeButton: true});
                    datatable.ajax.reload();
                    $('#edit_lecturer').modal('hide');
                    // $('#edit_name').val('');
                    // $('#edit_email').val('');
                    // $('#edit_level').select2('val', 'All');
                }
            }, 'json');
            return false;
        }
    });
});