<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once 'C:\xampp\htdocs\project\src\Models\Post.php';
require_once __DIR__ . '/Models/Post.php';

?>

<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> Blog - Start free palestine</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">free palestine</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../views/about.html">About</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../views/contact.html">poster un article</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../src/views/connexion.html">connexion</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../views/inscription.html">inscription</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead headerContainer" style="background-image: url('2.jpg');">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Palestine Blog</h1>
                        <span class="subheading">Un blog par haroun chedli</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php
                require_once 'Post.php';

                // récupérer les posts
                $allPosts = Post::getAllPosts();

                // Vérifier s'il y a des posts
                if ($allPosts) {
                    // Afficher les posts
                    foreach ($allPosts as $post) {
                        $postDate = new DateTime($post['postDatePost']); 
                        $currentDate = new DateTime();
                        $interval = $postDate->diff($currentDate);
                        $timeElapsed = $interval->format('%a jours');
                ?>
                <div class="post-preview">
                    <a href="post.php">
                        <h2 class="post-title"><?php echo isset($post['contentPost']) ? $post['contentPost'] : ''; ?></h2>
                        <?php if (!empty($post['imagePathPost'])): ?>
                            <img src="<?php echo $post['imagePathPost']; ?>" class="img-fluid" alt="Image du poste">
                        <?php endif; ?>
                        <h3 class="post-subtitle"><?php echo isset($post['descriptionPost']) ? $post['descriptionPost'] : ''; ?></h3>
                    </a>
                    <p class="post-meta">
                        Publié il y a <?php echo $timeElapsed; ?> le <?php echo isset($post['postDatePost']) ? date('d F Y', strtotime($post['postDatePost'])) : ''; ?>
                    </p>
                </div>
                <?php
                    }
                } else {
                    // Aucun post trouvé
                    echo "<p>Aucun post trouvé.</p>";
                }
                ?>
                <!-- Divider-->
                <hr class="my-4" />
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Articles plus anciens →</a></div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="small text-center text-muted fst-italic">Droits d'auteur &copy; Votre site Web 2023</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="scripts.js"></script>
</body>
</html>
