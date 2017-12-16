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
    $('#btn_add_student').on('click', function (e) {
        e.preventDefault();
        $('#frm_add_student').submit();
    });
    $('#frm_add_student').validate({
        errorClass: 'error-msg-validate',
        rules: {
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
            add_monhoc: {
                required: true,
            },
            add_quequan: {
                required: true,
            },
        }
    });
    $("#frm_add_student").on('submit', function (e) {
        if ($(this).valid()) {
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.post(url, data, function (resp) {
                if (resp.error == 1) {
                    toastr.error(resp.message, 'Thông Báo!', {closeButton: true});
                } else {
                    toastr.success(resp.message, 'Thông Báo!', {closeButton: true});
                    datatable.ajax.reload();
                    $('#add_student').modal('hide');
                }
            }, 'json');
            return false;
        }
    });
    // /**
    //  * Edit form
    //  */
    // $('#btn_edit_user').on('click', function (e) {
    //     e.preventDefault();
    //     $('#frm_edit_user').submit();
    // })
    // $('#frm_edit_user').validate({
    //     errorClass: 'error-msg-validate',
    //     rules: {
    //         name: {
    //             required: true,
    //         },
    //         email: {
    //             required: true,
    //             email:true,
    //             remote: {
    //                 url: $("#frm_edit_user").data('duplicateemail'),
    //                 type: "post",
    //                 data: {
    //                     email: function() {
    //                         return $('#frm_edit_user #edit_email').val();
    //                     },
    //                     id:function () {
    //                         return $('#frm_edit_user #edit_email').data('item-id');
    //                     }
    //                 }
    //             },
    //         },
    //         level: {
    //             required: true,
    //         },
    //     }
    // });
    // $("#frm_edit_user").on('submit', function (e) {
    //     if ($(this).valid()) {
    //         var data = $(this).serializeArray();
    //         var url = $(this).attr('action');
    //         $.post(url, data, function (resp) {
    //             if (resp.error == 1) {
    //                 toastr.error(resp.message, 'Thông Báo!', {closeButton: true});
    //             } else {
    //                 toastr.success(resp.message, 'Thông Báo!', {closeButton: true});
    //                 datatable.ajax.reload();
    //                 $('#edit_user').modal('hide');
    //                 $('#edit_name').val('');
    //                 $('#edit_email').val('');
    //                 $('#edit_level').select2('val', 'All');
    //             }
    //         }, 'json');
    //         return false;
    //     }
    // });
});