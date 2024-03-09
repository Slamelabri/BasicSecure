<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Navbar</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0A4275;">
    <div class="container-fluid  text-light">
        <a class="navbar-brand" href="../view/index.php">Secure IT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../view/index.php">Acceuil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/sign_in.php">Upload Files</a>
                </li>
            </ul>
            <a class="btn btn-outline-light me-4" href="../view/sign_in.php">Connexion</a>
            <a class="btn btn-outline-success" href="../view/sign_up.php">Inscription</a>
        </div>
    </div>
</nav>
</body>
</html>