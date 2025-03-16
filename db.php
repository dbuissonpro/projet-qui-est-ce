<?php
$host = "localhost";
$user = "root"; // Par défaut sous XAMPP
$password = "";
$dbname = "qui_est_ce";

// Connexion à MySQL
$conn = new mysqli($host, $user, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}
?>
