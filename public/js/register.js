$(function () {
    $("#btn-register").on('click',function (e) {
        e.preventDefault();
        $("#frm-register").submit();
    })

    $('#frm-register').validate({
    errorClass: 'error-msg-validate',
    rules: {
        name:{
            required: true,
        },
        email:{
            required: true,
            email:true,
            remote: {
                url: $("#frm-register").data('duplicateemail'),
                type: "post",
                data: {
                    email: function() {
                        return $('#frm-register #email').val();
                    }
                }
            },
        },
        password:{
            required:true,
            minlength:6
        },
        repassword:{
            required: true,
            equalTo:"#password",
            minlength:6
        }
    }
    });
    $("#frm-register").on('submit',function (e) {
        if($(this).valid()) {
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.post(url, data, function (resp) {
                if(resp.error==0){
                    window.location.href="http://qldsv.dev";
                }
                if(resp.error==1)
                {
                    toastr.error('Lỗi hệ thống.Vui lòng liên hệ quản trị viên', 'Thông Báo!', {closeButton:true});
                }
            }, 'json');
            return false;
        }
    });
});