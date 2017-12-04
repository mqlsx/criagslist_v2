$(document).ready(function() {

    var username_field = $("#username");
    var email_field = $("#email");
    var password_field = $("#password");
    var repassword_field = $("#repassword");
    //initial notification
    username_field.after("<span id='username_validate'></span>");
    password_field.after("<span id='password_validate'></span>");
    repassword_field.after("<span id='repassword_validate'></span>");
    email_field.after("<span id='email_validate'></span>");
    var username_validate = $("#username_validate");
    var password_validate = $("#password_validate");
    var repassword_validate = $("#repassword_validate");
    var email_validate = $("#email_validate");

    function showOkNotification(notification) {
        notification.show();
        notification.text("OK");
    }

    function showErrorNotification(notification, errorMessage) {
        notification.show();
        notification.text(errorMessage);
    }

    //reg rule
    var usernameReg = /^[0-9a-zA-Z]+$/;
    var emailReg = /^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;

    username_field.blur(function() {
        if (username_field.val() === "") {
            username_validate.hide();
        } else {
            $.ajax({
                url: "/validate_username",
                data: {
                    username: username_field.val()
                },
                success: function(data) {
                    if (data['result'] == "not exist") {
                        showOkNotification(username_validate);
                    } else {
                        showErrorNotification(username_validate, "this username has been registered!");
                    }
                }
            })
        }
    });

    email_field.blur(function() {
        if (email_field.val() === "") {
            email_validate.hide();
        } else {
            if (!emailReg.test(email_field.val())) {
                showErrorNotification(email_validate, "invlid email format!");
            } else {
                $.ajax({
                    url: "/validate_email",
                    data: {
                        email: email_field.val()
                    },
                    success: function(data) {
                        if (data['result'] == "not exist") {
                            showOkNotification(email_validate);
                        } else {
                            showErrorNotification(email_validate, "this email has been registered!");
                        }
                    }
                })
            }
        }
    });

    password_field.blur(function() {
        if (password_field.val() === "") {
            password_validate.hide();
        } else {
            if (password_field.val().length >= 8) {
                showOkNotification(password_validate);
            } else {
                showErrorNotification(password_validate, "password is not long enough!");
            }
        }
    });

    repassword_field.blur(function() {
        if (repassword_field.val() === "") {
            repassword_validate.hide();
        } else {
            if (repassword_field.val() == password_field.val()) {
                showOkNotification(repassword_validate);
            } else {
                showErrorNotification(repassword_validate, "two password is not consistent!");
            }
        }
    });



});