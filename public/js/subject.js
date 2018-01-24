    $(function () {
    $("#giangvien_id").select2({
        placeholder: "--Chọn giảng viên--",
        allowClear: true,
        minimumResultsForSearch: -1
    });
    $("#lop_id").select2({
        placeholder: "-- Chọn lớp học --",
        multiple: true,
        minimumResultsForSearch: -1
    });
    $("#edit_giangvien_id").select2({
        placeholder: "--Chọn giảng viên--",
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
    $('#btn_add_subject').on('click', function (e) {
        e.preventDefault();
        $('#frm_add_subject').submit();
    });
    $('#frm_add_subject').validate({
        errorClass: 'error-msg-validate',
        rules: {
            mamon: {
                required: true,
                remote: {
                    url: $("#frm_add_subject").data('duplicate'),
                    type: "post",
                    data: {
                        mamon: function() {
                            return $('#frm_add_subject #mamon').val();
                        }
                    }
                },
            },
            tenmon: {
                required: true,
            },
            sotinchi: {
                required: true,
                number:true
            },
            sotiet: {
                required: true,
                number:true
            },
            hocky: {
                required: true,
            },
            giangvien_id: {
                required: true,
            },
            lop_id: {
                required: true,
            }
        }
    });
    $("#frm_add_subject").on('submit', function (e) {
        if ($(this).valid()) {
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.post(url, data, function (resp) {
                if (resp.error == 1) {
                    toastr.error(resp.message, 'Thông Báo!', {closeButton: true});
                } else {
                    toastr.success(resp.message, 'Thông Báo!', {closeButton: true});
                    datatable.ajax.reload();
                    $('#add_subject').modal('hide');
                    $('#mamon').val('');
                    $('#tenmon').val('');
                    $('#sotinchi').val('');
                    $('#sotiet').val('');
                    $('#hocky').val('');
                    $('#namhoc').val('');
                    $('#giangvien_id').select2('val', 'All');
                    $('#lop_id').select2('val', 'All');
                }
            }, 'json');
            return false;
        }
    });
    /**
     * Edit form
     */
    $('#btn_edit_subject').on('click', function (e) {
        e.preventDefault();
        $('#frm_edit_subject').submit();
    })
    $('#frm_edit_subject').validate({
        errorClass: 'error-msg-validate',
        rules: {
            edit_mamon: {
                required: true,
                remote: {
                    url: $("#frm_edit_subject").data('duplicate'),
                    type: "post",
                    data: {
                        mamon: function() {
                            return $('#frm_edit_subject #edit_mamon').val();
                        },
                        id:function () {

                            return $('#frm_edit_subject #edit_mamon').data('item-id');
                        }
                    }
                },
            },
            edit_tenmon: {
                required: true,
            },
            edit_sotinchi: {
                required: true,
                number:true
            },
            edit_sotiet: {
                required: true,
                number:true
            },
            edit_hocky: {
                required: true,
            },
            edit_giangvien_id: {
                required: true,
            },
            edit_lop_id: {
                required: true,
            }
        }
    });
        $("#frm_edit_subject").on('submit', function (e) {
            if ($(this).valid()) {
                var data = $(this).serializeArray();
                var url = $(this).attr('action');
                $.post(url, data, function (resp) {
                    if (resp.error == 1) {
                        toastr.error(resp.message, 'Thông Báo!', {closeButton: true});
                    } else {
                        toastr.success(resp.message, 'Thông Báo!', {closeButton: true});
                        datatable.ajax.reload();
                        $('#edit_subject').modal('hide');
                        $('#edit_mamon').val('');
                        $('#edit_tenmon').val('');
                        $('#edit_sotinchi').val('');
                        $('#sedit_otiet').val('');
                        $('#edit_hocky').val('');
                        $('#edit_namhoc').val('');
                        $('#edit_giangvien_id').select2('val', 'All');
                        $('#edit_lop_id').select2('val', 'All');
                    }
                }, 'json');
                return false;
            }
        });
});