
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/css/form.css">
</head>
<body>
<?php require '../module/header.php'; ?>

<section id="login_page" class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card">
        <div class="card-header text-center p-3">
            <h3 id="Login_Title">Connexion</h3>
        </div>
        <div class="card-body">



            <form id="loginForm" action="../controller/process-sign_in.php" method="post">
                <div class="mb-3 row">
                    <label for="email" class="form-label col-lg-12">Email
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ex: Mathis.Hussard@gmail.com">
                        <span class="error"><?php echo $errors['email'] ?? ''; ?></span>
                    </label>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="form-label col-lg-12">Mot de passe
                        <input type="password" class="form-control" id="password" name="password" placeholder="8 caractères min (lettre, chiffre, charactere speciale) ">
                        <span class="error"><?php echo $errors['password'] ?? ''; ?></span>
                    </label>
                </div>
                <div class="Submit_Button">
                    <button type="submit" name="login" class="btn btn-outline-info">Connexion</button>
                </div>
            </form>
            <div id="errorContainer" class="mt-3"></div>




        </div>
        <div class="card-footer text-center">
            <a href="#" class="d-block mb-2">Mot de passe Oubliééé ?</a>
            <a href="sign_up.php" class="d-block">Vous possédez déja un compte ?</a>
        </div>
    </div>
</section>

<?php require '../module/footer.php'; ?>
<script src="../../public/js/sign_in.js"></script>
</body>
</html>