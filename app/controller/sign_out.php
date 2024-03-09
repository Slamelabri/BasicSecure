<?php
session_start();
// Supprimer toutes les variables de session
$_SESSION = array();

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers index.php
header("Location: ../view/index.php");
exit();
?>
