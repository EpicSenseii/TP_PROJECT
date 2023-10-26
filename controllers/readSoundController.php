<?php
session_start();
require_once '../models/postsModel.php';
require_once '../models/commentsModel.php';


$formErrors = [];

//Instanciation de l'objet posts
$posts = new posts;
$comment = new comments;
$deleteComment = new comments;

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

$comment->id_bty9i_sounds = $posts->id;

if (count($_POST) > 0) {
    //Instanciation de l'objet comments

    if (!empty($_POST['commentOnID'])) {
        $comment->comment = $_POST['commentOnID'];
    } else {
        $formErrors['commentOnID'] = "Veuillez ajoutez un commentaire";
    }

    $comment->id_bty9i_users = $_SESSION['user']['id'];

    if (count($formErrors) == 0) {
        if ($comment->add()) {
            $success = "Votre commentaire a été ajouté";
        } else {
            $formErrors['general'] = "Merci de contacter l'administrateur";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comment_id'])) {
        // Récupérer l'ID du commentaire à supprimer depuis le formulaire
        $commentId = $_POST['comment_id'];
        
        // Créer une instance de la classe comments
        $comment = new comments();
        $comment->id = $commentId;
        $comment->userId = $_SESSION['user']['id'];

        $posts = new posts;

        // Appeler la méthode pour supprimer le commentaire
        if ($comment->delComment()) {
            // Commentaire supprimé avec succès
            header('Location: #');
            exit();
        } else {
            // Erreur lors de la suppression du commentaire
            echo 'Erreur lors de la suppression du commentaire.';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comment_id'])) {
        // Récupérer l'ID du commentaire à supprimer depuis le formulaire
        $commentId = $_POST['comment_id'];
        
        // Créer une instance de la classe comments
        $comment = new comments();
        $comment->id = $commentId;
        $comment->userId = $_SESSION['user']['id'];

        $posts = new posts;

        // Appeler la méthode pour supprimer le commentaire
        if ($comment->delComment()) {
            // Commentaire supprimé avec succès
            header('Location: #');
            exit();
        } else {
            // Erreur lors de la suppression du commentaire
            echo 'Erreur lors de la suppression du commentaire.';
        }
    }
}



$commentsList = $comment->getCommentsList();

$title = "$post->title";
require_once '../views/header.php';
require_once '../views/parts/nav.php';
require_once '../views/pages/soundDetail.php';
require_once '../views/footer.php';
