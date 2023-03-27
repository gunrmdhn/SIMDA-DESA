$(document).ready(function () {
    $(".view-password-confirmation").on("click", function () {
        var password = document.getElementById("password_confirmation");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    });
    $(".view-password").on("click", function () {
        var password = document.getElementById("password");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    });
});
