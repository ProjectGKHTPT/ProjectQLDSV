$(function () {
    $("#btn-lockscreen").on('click',function (e) {
        e.preventDefault();
        $("#frm-lockscreen").submit();
    })

    $('#frm-lockscreen').validate({
    errorClass: 'error-msg-validate',
    rules: {
        password:{
            required:true,
        }
    }
    });
    $("#frm-lockscreen").on('submit',function (e) {
        if($(this).valid()) {
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.post(url, data, function (resp) {
                if(resp.error==0){
                    window.location.href=resp.href;
                }
                if(resp.error==1)
                {
                    toastr.error(resp.message, 'Thông Báo!', {closeButton:true});
                }
            }, 'json');
            return false;
        }
    });
});