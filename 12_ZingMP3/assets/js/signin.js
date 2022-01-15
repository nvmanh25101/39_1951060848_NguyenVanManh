$(document).ready(function() {
    let is_valid = true;

    $("#email").keyup(function() {
        let regex_email = /^\w{5,30}(?:@gmail\.com)$/;
        if(!regex_email.test($(this).val())) {
            $("#error_email").text("Email không hợp lệ");
            $(this).addClass('error');
            $(this).focus();
           is_valid = false;
        }
        else {
            $("#error_email").text("");
            $(this).removeClass('error');
           is_valid = true;
        }
    });

    $('#password').keyup(function() {
        if($(this).val().length > 0) {
            $('#error_password').text('');
            $(this).removeClass('error');
            is_valid = true;
        }
        else {
            $('#error_password').text('Mật khẩu không được để trống');
            $(this).focus();
            $(this).addClass('error');
            is_valid = false;
        }
    })

    $(".form__input").change(function() {
            $(this).addClass('active');
            if($("#email").val().length > 0 && $("#password").val().length > 0) {
                $.ajax({
                    url: "check_signin.php",
                    type: "post",
                    data: {email:$('#email').val()},
        
                    success:function(res) {
                        if(res == 1) {
                            $("#error").text('Tài khoản hoặc mật khẩu không chính xác');
                            is_valid = false;
                        }
                        else {
                            $("#error").text('');
                        }
                    }
                })
            }
    })

    $('.btn-signing').click(function(event) {
        if($('#email').val().length === 0 || $('#password').val().length === 0) {
            is_valid = false;
            if($('#email').val().length === 0) {
                $("#error_email").text("Email không được để trống");
            }
            
            $("#error_password").text("Mật khẩu không được để trống");
        }

        if(!is_valid) {
            event.preventDefault();
        }
    })


})