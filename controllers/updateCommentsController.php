<?php
session_start();
require_once '../models/commentsModel.php';
require_once '../models/postsModel.php';
require_once '../models/usersModel.php';

$title = "SoundTherapy - Editer";

$updateComment = new comments();
$updateComment->commentId = $_GET['commentId'];

$formErrors = [];

if (isset($_POST['updateComment'])) {

    if (!empty($_POST['updated_comment'])) {
            $updateComment->updatedComment = strip_tags($_POST['updated_comment']);
    } else {
        $formErrors['comment'] = 'Veuillez entrer un commentaire';
    }

    if (count($formErrors) == 0) {
        try {
            if ($updateComment->updateComment()) {
                $success['infos'] = "Le commentaire à été modifié";
            }
        } catch (PDOException $e) {
            $formErrors['general'] = 'Une erreur est survenue, l\'administrateur a été prévenu';
        }
    }
}

var_dump($_GET['edit-']);

require_once '../views/header.php';
require_once '../views/parts/nav.php';
require_once '../views/parts/updateComment.php';
require_once '../views/footer.php';
