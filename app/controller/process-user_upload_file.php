<?php
// Récupérer l'ID de l'utilisateur depuis la session
$user_id = $_SESSION['user_id'];

// Répertoire de téléchargement
$upload_directory = "uploads/user_$user_id/";

// Créer le répertoire de téléchargement s'il n'existe pas
if (!file_exists($upload_directory)) {
    mkdir($upload_directory, 0777, true);
}

// Déplacer le fichier téléchargé dans le répertoire de l'utilisateur
move_uploaded_file($_FILES['file']['tmp_name'], $upload_directory . $_FILES['file']['name']);


// Pas eu le temps de m'y mettre, j'avais creer une nouvelle table qui contiendrait les fichier lies au compte par
// leur id(uuid) a l'aide d'une clé secondaire, mais je n'ai implémenté aucune logique de code