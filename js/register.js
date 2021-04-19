$(document).ready(function() {
    $("#form-signin").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "register.php",
            data: $(this).serialize(),
            success: function(response) {
                if (response == "Home.php") {
                    window.location.href = response;

                } else {
                    $("#errorMsg").css("visibility", "visible");;
                    $("#errorMsg").html(response);
                }
            }
        });
    });
});