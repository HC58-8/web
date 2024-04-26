<?php



class Post {
    private $id;
    private $content;
    private $description;
    private $videoPath;
    private $imagePath;
    private $postDate;

    // Constructeur
    public function __construct($content, $description, $videoPath, $imagePath, $postDate) {
        $this->content = $content;
        $this->description = $description;
        $this->videoPath = $videoPath;
        $this->imagePath = $imagePath;
        $this->postDate = $postDate;
    }

    // Getter et setter pour ID
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter et setter pour contenu
    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    // Getter et setter pour description
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    // Getter et setter pour chemin de la vidéo
    public function getVideoPath() {
        return $this->videoPath;
    }

    public function setVideoPath($videoPath) {
        $this->videoPath = $videoPath;
    }

    // Getter et setter pour chemin de l'image
    public function getImagePath() {
        return $this->imagePath;
    }

    public function setImagePath($imagePath) {
        $this->imagePath = $imagePath;
    }

    // Getter et setter pour date de publication
    public function getPostDate() {
        return $this->postDate;
    }

    public function setPostDate($postDate) {
        $this->postDate = $postDate;
    }

    // Méthode pour créer un nouveau post
    public function create() {
        $db = Db::getInstance();
        $pdo = $db->getConnection();

        $stmt = $pdo->prepare("INSERT INTO posts (contentPost, descriptionPost, videoPathPost, imagePathPost, postDatePost) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$this->content, $this->description, $this->videoPath, $this->imagePath, $this->postDate]);
    }

    // Méthode pour récupérer tous les posts
    public static function getAllPosts() {
        $db = Db::getInstance();
        $pdo = $db->getConnection();

        $stmt = $pdo->query("SELECT * FROM posts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer un post par son ID
    public static function getPostById($id) {
        $db = Db::getInstance();
        $pdo = $db->getConnection();

        $stmt = $pdo->prepare("SELECT * FROM posts WHERE idPost = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Méthode pour mettre à jour un post
    public function update() {
        $db = Db::getInstance();
        $pdo = $db->getConnection();

        $stmt = $pdo->prepare("UPDATE posts SET contentPost = ?, descriptionPost = ?, videoPathPost = ?, imagePathPost = ?, postDatePost = ? WHERE idPost = ?");
        $stmt->execute([$this->content, $this->description, $this->videoPath, $this->imagePath, $this->postDate, $this->id]);
    }

    // Méthode pour supprimer un post
    public static function delete($id) {
        $db = Db::getInstance();
        $pdo = $db->getConnection();

        $stmt = $pdo->prepare("DELETE FROM posts WHERE idPost = ?");
        $stmt->execute([$id]);
    }
}
?>
