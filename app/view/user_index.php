<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: sign_in.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ba60f3acb6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../public/css/user_index.css">

    <title>Homepage</title>
</head>
<body>
<?php require '../module/header_user.php'; ?>


<header class="py-5" style="background-color: #162737;">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2"><strong>Secure IT</strong>,FAIT LE TOUR DU WEB POUR SÉCURISER VOTRE SITE WEB</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Vous êtes en recherche d’un partenaire de confiance, pour vous accompagner dans la gestion de votre informatique et dans vos projets.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="user_upload_file.php">Vos Fichiers</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="">Dossier Partagé</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                <img class="img-fluid rounded-3 my-5" src="../../public/medias/picture/home-picc.svg" alt="...">
            </div>
        </div>
    </div>
</header>
<section class="container article-homepage">
    <div class="col-lg-8">
        <!-- Post content-->
        <article>
            <!-- Post header-->
            <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
                <!-- Post meta content-->
                <div class="text-muted fst-italic mb-2">Posted on January 1, 2023 by Start Bootstrap</div>
                <!-- Post categories-->
                <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
            </header>
            <!-- Preview image figure-->
            <figure class="mb-4"><img class="img-fluid rounded" src="../../public/medias/picture/pc-pic.svg" alt="..."></figure>
            <!-- Post content-->
            <section class="mb-5">
                <p class="fs-5 mb-4">C’est avant tout la volonté d’accompagner les entreprises vers plus de simplicité dans la gestion de leur système d’information par le biais d’un partenariat durable et d’une relation de confiance.</p>
                <p class="fs-5 mb-4">Je m’appelle Nicolas SITBON et je suis Ingénieur système et réseaux. J’interviens auprès des entreprises de la région AURA pour assurer leur transformation numérique et sécuriser les environnements de travail en mettant mes compétences et mon savoir faire à disposition des professionnels et des utilisateurs.</p>
                <p class="fs-5 mb-4">L’informatique connait aujourd’hui des enjeux décisifs sur l’externalisation des systèmes et la sécurisation des données. Les nouveaux usages numériques demandent une adaptation des outils aux besoins des collaborateurs.</p>
                <h2 class="fw-bolder mb-4 mt-5">Si ces questions font partie de vos prérogatives, vous êtes au bon endroit.</h2>
                <p class="fs-5 mb-4">SECURE IT Conseil propose des prestations personnalisées d’audit, de gestion de projet, de sécurisation de votre système d’information et pourquoi pas une présence régulière dans vos locaux ?</p>
                <p class="fs-5 mb-4">SECURE IT Conseil peut prendre en charge l’exploitation de votre système d’information au travers d’offres de services managés : messagerie, parc client, données, serveurs.</p>
                <p class="fs-5 mb-4">SECURE IT Conseil fourni aussi des formations personnalisées à destination des professionnels de l’informatique et des utilisateurs sur les technologies Microsoft.</p>
            </section>
        </article>
    </div>
</section>

<?php require '../module/footer.php'; ?>
</body>
</html>
