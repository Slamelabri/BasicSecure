<?php
session_start();

$pdo = require __DIR__ . '/../../database/config.php';

// Générer un jeton de session
$sessionToken = bin2hex(random_bytes(32));
$_SESSION['session_token'] = $sessionToken;

// Fonction pour générer un jeton aléatoire
function generateToken() {
    return bin2hex(random_bytes(32));
}

$errors = [];

// Valider le nom d'utilisateur
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
if (empty($username)) {
    $errors[] = "Nom d'utilisateur OBLIGATOIRE";
}

// Valider le format de l'e-mail
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Adresse e-mail invalide";
}

// Valider la longueur du mot de passe
if (strlen($_POST["password"]) < 8 ) {
    $errors[] = "Le mot de passe doit contenir au moins 8 caractères";
}

// Valider la complexité du mot de passe
if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@!%*#?&])[A-Za-z\d$@!%*#?&]{8,}$/', $_POST["password"])) {
    $errors[] = "Le mot de passe doit contenir au moins une lettre, un chiffre et un caractère spécial";
}

// Vérifier si la confirmation du mot de passe correspond
if ($_POST["password"] !== $_POST["password_confirm"]) {
    $errors[] = "Les mots de passe doivent être identiques";
}

// Vérifier si le nom d'utilisateur existe déjà
$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$sql_check_username = "SELECT COUNT(*) AS count FROM users WHERE username = ?";
$stmt_check_username = $pdo->prepare($sql_check_username);
$stmt_check_username->execute([$username]);
$username_count = $stmt_check_username->fetchColumn();

if ($username_count > 0) {
    $errors[] = "Le nom d'utilisateur est déjà utilisé. Veuillez en choisir un autre.";
}

// Vérifier si l'e-mail existe déjà
$sql_check_email = "SELECT COUNT(*) AS count FROM users WHERE email = ?";
$stmt_check_email = $pdo->prepare($sql_check_email);
$stmt_check_email->execute([$email]);
$email_count = $stmt_check_email->fetchColumn();

if ($email_count > 0) {
    $errors[] = "L'adresse e-mail est déjà utilisée. Veuillez en choisir une autre.";
}

// Enregistrer toutes les erreurs dans le fichier journal des erreurs
function logErrors($errors): void {
    $logFile = __DIR__ . '/../../logs/errors.log';
    $logMessage = "[" . date('Y-m-d H:i:s') . "] " . implode("\n", $errors) . "\n";
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

// Enregistrer les erreurs dans le fichier journal et rediriger s'il y en a
if (!empty($errors)) {
    logErrors($errors);
    header("Location: ../view/sign_up.php");
    exit;
}

// Générer un UUID
$uuid = $pdo->query("SELECT UUID()")->fetchColumn();

// Générer le hachage du mot de passe
$password = $_POST["password"];
$salt = bin2hex(random_bytes(16));
$password_salted = $password . $salt;
$password_hash = password_hash($password_salted, PASSWORD_BCRYPT);

// Insérer l'utilisateur dans la base de données
$insert_user_query = $pdo->prepare("INSERT INTO users (id, username, email, password) VALUES (:id, :username, :email, :password)");
$insert_user_query->execute(['id' => $uuid, 'username' => $username, 'email' => $email, 'password' => $password_hash]);

// Rediriger vers la page de connexion
header("Location: ../view/sign_in.php");
exit;
