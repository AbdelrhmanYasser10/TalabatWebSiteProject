$(document).ready(function() {
    $("#EditUserData").submit(function(e) {
        post_id = $(this).attr("post_id");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "EditUserData.php?id=" + post_id,
            data: $(this).serialize(),
            success: function(response) {
                if (response != "Password should be at least 8 characters in length<br> and should include at least one upper case letter, one number, and one special character." || response != "The Password not match the confirmation" ||
                    response != "invalid" || response != "Duplicated UserName or Email"
                ) {
                    window.location.href = response;

                } else {
                    $("#errorMsg").css("visibility", "visible");;
                    $("#errorMsg").html(response);
                }
            }
        });
    });
});