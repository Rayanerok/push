<?php
// Connexion à la base de données MySQL
$servername = "db";
$username = "root";
$password = "root";
$database = "administrateur";

$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Mot de passe admin
$admin_password = "admin";

// Processus de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier si un champ est vide
        if (empty($username) || empty($password)) {
        echo "Tous les champs sont requis";
    } else {
        if ($password === $admin_password) {
            header("Location: welcome.php");
            exit();
        }

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                header("Location: user_dashboard.php");
                exit();
            } else {
                echo "Mot de passe incorrect";
            }
        } else {
            echo "Utilisateur non trouvé";
        }
    }
}
    
$conn->close();
?>
