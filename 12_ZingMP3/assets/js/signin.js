$(document).ready(function() {
    let is_valid = true;

    $("#email").keyup(function() {
        let regex_email = /^\w{5,30}(@gmail\.com)$/;
        if(!regex_email.test($(this).val())) {
            $("#error_email").text("Email không hợp lệ");
            $(this).focus();
           is_valid = false;
        }
        else {
            $.ajax({
                url: "check_signin.php",
                type: "post",
                data: {email:$(this).val()},

                success:function(res) {
                    $("#error_email").text(res);
                    is_valid = false;
                }
             
            })
        }
    });

    $('#password').keyup(function() {
        if($(this).val().length > 0) {
            $('#error_password').text('');
            is_valid = true;
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

    $(".form__input").change(function() {
            $(this).addClass('active');
    })

})