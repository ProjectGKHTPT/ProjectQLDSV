$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var submit_search_form;
    $('#search-form').find('input').on('keyup change', function () {

        clearTimeout(submit_search_form);

        submit_search_form = setTimeout(function () {
            $('#search-form').submit();
        },300);
    });
    $('#search-form').on('submit', function(e) {
        e.preventDefault();
        try {
            datatable.draw();
        } catch (e) {}
    });
    //Delete Item
    $(document.body).on('click', '.list-item-delete-btn', function () {
        var url = $(this).data('url');
        bootbox.confirm({
            title: "Thông Báo",
            message: '<img src="image/danger.jpg" width="10%"> Bạn đang chọn hành động xóa sẽ ảnh hưởng đến hệ thống. Bạn chắc chắn muốn xóa chứ?',
            buttons: {
                confirm: {
                    label: 'Có',
                    className: 'btn btn-flat btn-success'
                },
                cancel: {
                    label: 'Không',
                    className: 'btn btn-flat btn-danger'
                }
            },
            callback: function (result) {
                if (result) {
                    $.ajax({
                        'url': url,
                        'method': 'GET',
                        'success': function (resp) {
                            if (resp.error == 0) {
                                toastr.success('Xóa thành công 1 bản ghi', 'SUCCESS!', {closeButton: true});
                                try {
                                    datatable.ajax.reload();
                                } catch (e) {
                                    console.log(e);
                                }
                            } else {
                                toastr.error('Có lỗi xảy ra, vui lòng liên hệ với quản trị viên.', 'ERROR!', {closeButton: true});
                            }
                        }
                    });//window.location = url;
                }
            }
        });
    });

});