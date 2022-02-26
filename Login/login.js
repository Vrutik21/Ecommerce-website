$(document).ready(function (){
    $("#reg-form").submit(function (event){
        let $password = $("#password");
        let $confirm = $("#confirm_pwd");
        let $error = $("#confirm_error");
        if ($password.val() === $confirm.val()){
            return true;
        }
        else {
            $error.text("Password doesn't match");
            event.preventDefault();
        }
    });
})