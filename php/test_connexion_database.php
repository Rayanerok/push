<?php
$servername = "db";
$username = "root";
$password = "root";
$database = "administrateur";

// Établir la connexion
$conn = mysqli_connect($servername, $username, $password, $database);

// Vérifier la connexion
if (!$conn) {
    die("La connexion a échoué : " . mysqli_connect_error());
} else {
    echo "Connecté avec succès";
}
?>
