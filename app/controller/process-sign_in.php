<?php
session_start();
$pdo = require __DIR__ . '/../../database/config.php';
const LOGIN_ATTEMPT_LIMIT = 5; // Limite de tentatives de connexion
const LOGIN_TIMEOUT = 15 * 60; // Délai d'attente après trop de tentatives

// Fonction pour créer un token aléatoire
function generateToken() {
    return bin2hex(random_bytes(32));
}

function logErrors($errors): void
{
    $logFile = __DIR__ . '../../logs/errors.log'; // Chemin vers le fichier journal des erreurs
    $logMessage = "[" . date('Y-m-d H:i:s') . "] " . implode("\n", $errors) . "\n"; // Journalisation avec date et erreurs
    file_put_contents($logFile, $logMessage, FILE_APPEND); // Écriture dans le fichier journal
}

/**
 * Traitement du formulaire après soumission en POST
 * Récupération des données et validation
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); // Nettoyage de l'e-mail
    $password = $_POST["password"]; // Récupération du mot de passe
    $token = generateToken(); // Création d'un token

    // Validation des entrées
    $errors = [];
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Adresse e-mail invalide";
    }
    if (empty($password)) {
        $errors['password'] = "Mot de passe requis";
    }

    // Vérification des erreurs avant de continuer
    if (empty($errors)) {
        // Vérification de la limite de tentatives de connexion
        if (!isset($_SESSION['login_attempts'][$email])) {
            $_SESSION['login_attempts'][$email] = 0;
        }
        $loginAttempts = $_SESSION['login_attempts'][$email];

        if ($loginAttempts >= LOGIN_ATTEMPT_LIMIT) {
            // Vérification du délai d'attente après trop de tentatives
            if (isset($_SESSION['last_login_time'][$email])) {
                $lastLoginTime = $_SESSION['last_login_time'][$email];
                if (time() - $lastLoginTime < LOGIN_TIMEOUT) {
                    $remainingTime = LOGIN_TIMEOUT - (time() - $lastLoginTime);
                    $errors['timeout'] = "Trop de tentatives de connexion. Réessayez dans " . gmdate("i:s", $remainingTime);
                } else {
                    // Réinitialisation des tentatives de connexion et du dernier temps de connexion
                    $_SESSION['login_attempts'][$email] = 0;
                    $_SESSION['last_login_time'][$email] = time();
                }
            }
        }

        // Authentification de l'utilisateur
        if (empty($errors)) {
            // Vérification dans la base de données
            $data = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1;');
            $data->bindParam(':email', $email, PDO::PARAM_STR);
            $data->execute();
            $user = $data->fetch();

            if ($user && password_verify($password, $user['password'])) {
                // Connexion réussie
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['token'] = $token;
                $_SESSION['login_attempts'][$email] = 0;
                $_SESSION['last_login_time'][$email] = time();

                // Redirection
                echo json_encode(['success' => true, 'redirect' => '../view/user_index.php']);
                exit;
            } else {
                // Échec de la connexion
                $_SESSION['login_attempts'][$email]++;
                $_SESSION['last_login_time'][$email] = time();
                $errors['auth'] = "Identifiants incorrects.";
            }
        }
    }

    // Retour des erreurs en JSON
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}
