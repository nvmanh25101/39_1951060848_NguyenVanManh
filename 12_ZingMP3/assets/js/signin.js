$(document).ready(function() {
    $("#email").change(function() {
        let regex_email = /^\w{5,30}(@gmail\.com)$/;
        if(!regex_email.test($(this).val())) {
            $("#error_email").text("Email không hợp lệ");
            // $("#email").addClass("error");
        }
        else {
            $.ajax({
                url: "check_signin.php",
                type: "post",
                data: {email:$(this).val()},

                success:function(res) {
                    $("#error_email").text(res);
                    // $("#email").addClass("error");
                }
             
            })
        }
    })


    $(".form__input").change(function() {
            $(this).addClass('active');
    })

})