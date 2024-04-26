<?php
require_once('../Controllers/Db.php');
require_once('User.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier si user  existe 
    if (User::userExists($username)) {
        $error_message = "Cet utilisateur existe déjà.";
    } else {
        $user = new User($username, $email, $password);

        if ($user->createUser()) {
            header("Location: connexion.html");
            exit;
        } else {
            $error_message = "Erreur lors de l'inscription.";
        }
    }
} else {
    header("Location: inscription.html");
    exit;
}
?>
