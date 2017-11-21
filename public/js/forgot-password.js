$(function () {
    $("#btn-forgot-password").on('click',function (e) {
        e.preventDefault();
        $("#frm-forgot-password").submit();
    });
    $('#frm-forgot-password').validate({
    errorClass: 'error-msg-validate',
    rules: {
        email:{
            required:true,
            email:true
        }
    }
    });
    $("#frm-forgot-password").on('submit',function () {
        $(".spinner-email").show();
    })
    $("#btn-code-email").on('click',function (e) {
        e.preventDefault();
        $("#frm-code-email").submit();
    })

    $('#frm-code-email').validate({
    errorClass: 'error-msg-validate',
    rules: {
        codeemail:{
            required:true,
        }
    }
    });
    $("#frm-code-email").on('submit',function () {
        $(".spinner-code-email").show();
    })

});