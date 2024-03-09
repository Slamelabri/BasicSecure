<?php

// Database configuration
$host = 'localhost';
$dbname = 'secureit';
$username = 'root';
$password = 'Kal71Draga89Kzeaf71893Brava*';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur PDO à exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch(PDOException $e) {
    // En cas d'erreur de connexion, affichez l'erreur
    die("Erreur de connexion : " . $e->getMessage());
}
