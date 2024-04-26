<?php
require_once __DIR__ . '/../Models/Post.php'; // Inclusion du fichier Post.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['create'])) {
        $content = $_POST['content'];
        $description = $_POST['description'];
        $videoPath = $_POST['videoPath'];
        $imagePath = $_POST['imagePath'];
        $postDate = date('Y-m-d H:i:s'); 

        $post = new Post($content, $description, $videoPath, $imagePath, $postDate);

        $post->create();

        header("Location: index.php");
        exit;
    }

    if (isset($_POST['update'])) {
        $postId = $_POST['postId'];

        $content = $_POST['content'];
        $description = $_POST['description'];
        $videoPath = $_POST['videoPath'];
        $imagePath = $_POST['imagePath'];
        $postDate = date('Y-m-d H:i:s'); 

        $post = new Post($content, $description, $videoPath, $imagePath, $postDate);
        $post->setId($postId); 
        $post->update();

        header("Location: index.php");
        exit;
    }

    if (isset($_POST['delete'])) {
        $postId = $_POST['postId'];

        Post::delete($postId);

        header("Location: index.php");
        exit;
    }
}
?>
