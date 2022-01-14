$(document).ready(function() {
    $("#email").keyup(function() {
        let regex_email = /^\w{5,30}(@gmail\.com)$/;
        if(!regex_email.test($(this).val())) {
            $("#error_email").text("Email không hợp lệ");
            $(this).focus();
            $('.btn-signing').click(function(event) {
                event.preventDefault();
            })
        }
        else {
            $.ajax({
                url: "check_signup.php",
                type: "post",
                data: {email:$(this).val()},

                success:function(res) {
                    $("#error_email").text(res);
                    $(this).focus();
                    $('.btn-signing').click(function(event) {
                        event.preventDefault();
                    })
                }
             
            })
        } 
    })
    
    $("#password").keyup(function() {
        if($(this).val().length < 8) {
            $("#error_password").text("Mật khẩu ngắn quá. Dễ bị hack đó!");
            $("#password").addClass("error");
            $(this).focus();
            $('.btn-signing').click(function(event) {
                event.preventDefault();
            })
        }
        else{
            $("#error_password").text("");
            $("#password").removeClass("error");
        }
    })

    $("#name").keyup(function() {
        let regex_name = /^[A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đ][a-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*([ ][A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đ][a-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*)*$/;
        if(!regex_name.test($(this).val())) {
            $("#error_name").text("Tên không hợp lệ");
            $("#name").addClass("error");
            $(this).focus();
            $('.btn-signing').click(function(event) {
                event.preventDefault();
            })
        }
        else{
            $("#error_name").text("");
            $("#name").removeClass("error");
        }
    })

    $('.btn-signing').click(function(event) {
        let is_valid = true;
        if($('#name').val().length === 0 || $('#email').val().length === 0 || $('#password').val(),length === 0) {
            is_valid = false;
        }
        if(!is_valid) {
            event.preventDefault();
        }
    })
    
    $(".form__input").change(function() {
            $(this).addClass('active');
    })
})