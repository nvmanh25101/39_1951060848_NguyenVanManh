// let form_inputs = document.querySelectorAll('.form__input');

// function input_active() {
//     for(let form_input of form_inputs) { 
//         if(form_input.value.length > 0) {
//                 form_input.classList.add('active');
//         }
//     }
// }

// // Validate Form
// function signup_validate() {
//     let name = document.getElementById('name').value;
//     let email = document.getElementById('email').value;
//     let password = document.getElementById('password').value;

//     let check_error = false;

//     if(name.length === 0) {
//         document.getElementById('error_name').innerHTML = "Tên không được để trống";
//         document.getElementById('name').classList.add('error');
//         check_error = true;
//     } 
//     else {
//         let regex_name = /^[A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đ][a-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*([ ][A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đ][a-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*)*$/;
//         if(!regex_name.test(name)) {
//             document.getElementById('error_name').innerHTML = "Tên không hợp lệ";
//             document.getElementById('name').classList.add('error');
//             check_error = true;
//         }
//         else {
//             document.getElementById('error_name').innerHTML = '';
//             document.getElementById('name').classList.remove('error');
//         }
//     }
    
//     if(email.length === 0) {
//         document.getElementById('error_email').innerHTML = 'Email không được để trống';
//         document.getElementById('email').classList.add('error');
//         check_error = true;
//     }
//     else {
//         document.getElementById('error_email').innerHTML = '';
//         document.getElementById('email').classList.remove('error');
//     }

//     if(password.length === 0) {
//         document.getElementById('error_password').innerHTML = 'Mật khẩu không được để trống';
//         document.getElementById('password').classList.add('error');
//         check_error = true;
//     }
//     else if(password.length < 8) {
//         document.getElementById('error_password').innerHTML = 'Mật khẩu ngắn quá! Dễ bị hack đó';
//         document.getElementById('password').classList.add('error');
//         check_error = true;
//     } else {
//         document.getElementById('error_password').innerHTML = '';
//         document.getElementById('password').classList.remove('error');
//     }

//     if(check_error) {
//         return false;
//     }
// }

// function signin_validate() {
//     let email = document.getElementById('email').value;
//     let password = document.getElementById('password').value;

//     let check_error = false;
    
//     if(email.length === 0) {
//         document.getElementById('error_email').innerHTML = 'Email không được để trống';
//         document.getElementById('email').classList.add('error');
//         check_error = true;
//     }
//     else {
//         document.getElementById('error_email').innerHTML = '';
//         document.getElementById('email').classList.remove('error');
//     }

//     if(password.length === 0) {
//         document.getElementById('error_password').innerHTML = 'Mật khẩu không được để trống';
//         document.getElementById('password').classList.add('error');
//         check_error = true;
//     }
//     else {
//         document.getElementById('error_password').innerHTML = '';
//         document.getElementById('password').classList.remove('error');
//     }

//     if(check_error) {
//         return false;
//     }
// }
// $(document).ready(function() {
//     $("#email").change(function() {
//         let regex_email = /^\w{5,30}(@gmail\.com)$/;
//         if(!regex_email.test($(this).val())) {
//             $("#error_email").text("Email không hợp lệ");
//             $("#email").addClass("error");
//         }
//         else {
//             $("#error_email").text("");
//             $("#email").removeClass("error");
//         }

//         $.ajax({
//             url: "check_signin.php",
//             type: "post",
//             data: "email:$(this).val()",
//         })
//     })
    
//     $("#password").change(function() {
//         if($(this).val().length < 8) {
//             $("#error_password").text("Mật khẩu ngắn quá. Dễ bị hack đó!");
//             $("#password").addClass("error");
//         }
//         else{
//             $("#error_password").text("");
//             $("#password").removeClass("error");
//         }
//     })

//     $("#name").change(function() {
//         let regex_name = /^[A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đ][a-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*([ ][A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đ][a-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*)*$/;
//         if(!regex_name.test($(this).val())) {
//             $("#error_name").text("Tên không hợp lệ");
//             $("#name").addClass("error");
//         }
//         else{
//             $("#error_name").text("");
//             $("#name").removeClass("error");
//         }
//     })

//     $(".form__input").change(function() {
//         if($(this).val().length > 0) {
//             $(this).addClass('active');
//     }
//     })


// })