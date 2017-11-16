$(function () {
    $("#btn-forgot-password").on('click',function (e) {
        e.preventDefault();
        $("#frm-forgot-password").submit();
    })

    $('#frm-forgot-password').validate({
    errorClass: 'error-msg-validate',
    rules: {
        email:{
            required:true,
            email:true
        }
    }
    });
    $("#frm-forgot-password").on('submit',function (e) {
        if($(this).valid()) {
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $("#preloader").show();
            $.post(url, data, function (resp) {
                if(resp.error==0){
                    $("#frm-code-mail").show();
                    $("#preloader-code-mail").hide();
                    $("#preloader").hide();
                }
                if(resp.error==1)
                {
                    toastr.error(resp.message, 'Thông Báo!', {closeButton:true});
                    $("#preloader").hide();
                }
            }, 'json');
            return false;
        }
    });
    $("input#email").on('keyup',function () {
        $("#div-code-mail").html("");
    });
    $("input#code-mail").on('keyup',function () {
        $("#preloader-code-mail").show();
    });

});