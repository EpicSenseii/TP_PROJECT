<?php
session_start();
require_once '../models/commentsModel.php';
require_once '../models/postsModel.php';
require_once '../models/usersModel.php';

$title = "SoundTherapy - Editer";

$updateComment = new comments();
$updateComment->id = $_GET['id'];

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
                header('location: music-'.$_GET['id']);
            }
        } catch (PDOException $e) {
            $formErrors['general'] = 'Une erreur est survenue, l\'administrateur a été prévenu';
        }
    }
}

require_once '../views/header.php';
require_once '../views/parts/nav.php';
require_once '../views/parts/updateComment.php';
require_once '../views/footer.php';
