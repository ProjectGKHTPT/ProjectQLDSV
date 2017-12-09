$(function () {
    $("#level").select2({
        placeholder: "--Quyền Truy Cập--",
        allowClear: true,
        minimumResultsForSearch: -1
    });
    $("#edit_level").select2({
        placeholder: "--Quyền Truy Cập--",
        allowClear: true,
        minimumResultsForSearch: -1
    });
    $("#type_search").select2({
        minimumResultsForSearch: -1
    });
    $("#type_search").change(function () {
       $("#search-name").val("");
       $("#search-email").val("");
        datatable.ajax.reload();
    });
    $('#btn_add_user').on('click', function (e) {
        e.preventDefault();
        $('#frm_add_user').submit();
    });
    $('#frm_add_user').validate({
        errorClass: 'error-msg-validate',
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email:true,
                remote: {
                    url: $("#frm_add_user").data('duplicateemail'),
                    type: "post",
                    data: {
                        email: function() {
                            return $('#frm_add_user #email').val();
                        }
                    }
                },
            },
            password: {
                required: true,
                minlength:6,
            },
            level: {
             
                required: true,
            },
        }
    });
    $("#frm_add_user").on('submit', function (e) {
        if ($(this).valid()) {
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.post(url, data, function (resp) {
                if (resp.error == 1) {
                    toastr.error(resp.message, 'Thông Báo!', {closeButton: true});
                } else {
                    toastr.success(resp.message, 'Thông Báo!', {closeButton: true});
                    datatable.ajax.reload();
                    $('#add_user').modal('hide');
                    $('#name').val('');
                    $('#password').val('');
                    $('#email').val('');
                    $('#level').select2('val', 'All');
                }
            }, 'json');
            return false;
        }
    });
    /**
     * Edit form
     */
    $('#btn_edit_user').on('click', function (e) {
        e.preventDefault();
        $('#frm_edit_user').submit();
    })
    $('#frm_edit_user').validate({
        errorClass: 'error-msg-validate',
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email:true,
                remote: {
                    url: $("#frm_edit_user").data('duplicateemail'),
                    type: "post",
                    data: {
                        email: function() {
                            return $('#frm_edit_user #edit_email').val();
                        },
                        id:function () {
                            return $('#frm_edit_user #edit_email').data('item-id');
                        }
                    }
                },
            },
            level: {
                required: true,
            },
        }
    });
    $("#frm_edit_user").on('submit', function (e) {
        if ($(this).valid()) {
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.post(url, data, function (resp) {
                if (resp.error == 1) {
                    toastr.error(resp.message, 'Thông Báo!', {closeButton: true});
                } else {
                    toastr.success(resp.message, 'Thông Báo!', {closeButton: true});
                    datatable.ajax.reload();
                    $('#edit_user').modal('hide');
                    $('#edit_name').val('');
                    $('#edit_email').val('');
                    $('#edit_level').select2('val', 'All');
                }
            }, 'json');
            return false;
        }
    });
});