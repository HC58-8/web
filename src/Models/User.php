<?php

require_once('Db.php');

class User {
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function createUser() {
        $db = Db::getInstance();
        $pdo = $db->getConnection();

        if (self::userExists($this->username)) {
            return false;
        }

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $hashedPassword);

        try {
            $stmt->execute();
            return true; 
        } catch (PDOException $e) {
         
            echo "Erreur lors de la création de l'utilisateur : " . $e->getMessage();
            return false; 
        }
    }

    public static function userExists($username) {
        $db = Db::getInstance();
        $pdo = $db->getConnection();

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");

        $stmt->bindParam(':username', $username);

        $stmt->execute();

        $count = $stmt->fetchColumn();

        return $count > 0;
    }

    public static function connexion($username, $password) {
        $db = Db::getInstance();
        $pdo = $db->getConnection();

        $stmt = $pdo->prepare("SELECT password FROM users WHERE username = :username");

        $stmt->bindParam(':username', $username);

        $stmt->execute();

        $hashedPassword = $stmt->fetchColumn();

        if ($hashedPassword && password_verify($password, $hashedPassword)) {
            return true; 
        }

        return false;
    }


    public function setUsername($username) {
        $this->username = $username;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}
?>
