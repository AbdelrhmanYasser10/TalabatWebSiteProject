$(document).ready(function() {
    $("#formEdit").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "EditData.php",
            data: $(this).serialize(),
            success: function(response) {
                if (response == "AdminPage.php") {
                    window.location.href = response;

                } else {
                    $("#errorMsg").css("visibility", "visible");;
                    $("#errorMsg").html(response);
                }
            }
        });
    });
});