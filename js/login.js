$(document).ready(function() {
    $("#loginForm").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "checkuserlogin.php",
            data: $(this).serialize(),
            success: function(response) {
                if (response == "There is error in username or password") {
                    $("#errorMsg").css("visibility", "visible");;
                    $("#errorMsg").html("username or password is invalid , please try again.");
                } else {
                    window.location.href = response;
                }
            }
        });
    });
});