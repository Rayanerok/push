<?php
// Se connecter à la base de données MySQL
$servername = "db";
$username = "root";
$password = "root";
$database = "administrateur";

$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Processus d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validation des entrées
    if (empty($username) || empty($email) || empty($password)) {
        echo "Tous les champs sont obligatoires";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format d'email invalide";
    } elseif (strlen($password) < 8) {
        echo "Le mot de passe doit comporter au moins 8 caractères";
    } elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        echo "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule et un chiffre";
    } elseif ($username === "admin") {
        echo "Désolé, 'admin' est un nom d'utilisateur réservé";
    } else {
        
        $check_query = "SELECT * FROM users WHERE email='$email' OR username='$username'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            echo "L'email ou le nom d'utilisateur existe déjà";
        } else {
            // Hasher le mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insérer un nouvel utilisateur dans la base de données
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                // Rediriger vers la page de connexion
                header("Location: ../connexion.html");
                exit(); // Assure que le script s'arrête ici
            } else {
                echo "Erreur : " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>
