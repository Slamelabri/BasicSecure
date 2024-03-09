function logout() {
    $.ajax({
        url: "../../app/controller/sign_out.php",
        type: "POST",
        success: function(response) {
            // Rediriger vers index.php dans le répertoire app/view
            window.location.href = "../../app/view/index.php";
        }
    });
}
