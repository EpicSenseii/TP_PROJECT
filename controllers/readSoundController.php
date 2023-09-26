<?php
session_start();
require_once '../models/postsModel.php';
$title = "TITLE";


$formErrors = [];

//Instanciation de l'objet posts
$posts = new posts;

//Je récupère l'id de l'article dans l'url et je le stocke dans l'attribut id de l'objet posts
$posts->id = $_GET['id'];

// ça me permet d'utiliser la méthode checkIfExists() et getOneById() qui me permettent de vérifier que l'article existe bien et de récupérer ses informations
if ($posts->checkIfExists() == 1) {
    $post = $posts->getOneById();
} else {
    // Si l'article n'existe pas, je redirige l'utilisateur vers la liste des articles
    header('Location:feed');
    exit;
}

require_once '../views/header.php';
require_once '../views/parts/nav.php';
require_once '../views/pages/soundDetail.php';
require_once '../views/footer.php';