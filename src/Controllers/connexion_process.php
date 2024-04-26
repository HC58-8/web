 <?php
require_once('../models/User.php');
echo "hello connexion_porcess";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error_message = "Veuillez remplir tous les champs.";
        echo $error_message;
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (User::connexion($username, $password)) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: ../views/contact.html");
            exit;
        } else {
            $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
            echo $error_message;
        }
    }
}
?>
