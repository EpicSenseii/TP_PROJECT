<?php
$title = "SoundTherapy - Upload";
require_once '../models/postsModel.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('Location:feed');
    exit;
}

$postL = new posts;
$postList = $postL->getList();

$formErrors = [];

if (count($_POST) > 0) {
    $post = new posts;

    if (!empty($_POST['musicName'])) {
        //strip_tags permet de sécuriser les input en retirant les balises html et php
        $post->title = strip_tags($_POST['musicName']);
    } else {
        $formErrors['title'] = "Veuillez entrer un titre";
    }

    if (!empty($_POST['musicDescription'])) {
        $post->soundDescription = strip_tags($_POST['musicDescription']);
    } else {
        $formErrors['description'] = "Veuillez entrer une description";
    }

    //S'il n'y pas d'erreur
    if ($_FILES['musicImg']['error'] != 4) {
        //Si le fichier ne dépasse pas une certaine taille, ici 1000000
        if ($_FILES['musicImg']['size'] < 1000000) {
            //Ici nous déclarons les extensions que nous souhaitons accepter
            $extension = pathinfo($_FILES['musicImg']['name'], PATHINFO_EXTENSION);
            $authorizedExtension = [
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'png' => 'image/png',
            ];
            //Si le fichier est bien de l'unes des extentions choisies plus haut, nous l'acceptons, le fichier sera ensuite déplacé dans le chemin indiqué (medias)
            if (array_key_exists($extension, $authorizedExtension) && mime_content_type($_FILES['musicImg']['tmp_name']) == $authorizedExtension[$extension]) {
                $post->img = 'medias/' . uniqid() . '.' . $extension;
            } else {
                $formErrors['image'] = "test";
            }
        } else {
            $formErrors['image'] = "test";
        }
    } else {
        $formErrors['image'] = ERROR_POSTS_IMAGE_SIZE;
    }

    if ($_FILES['musicFile']['error'] != 4) {
        if ($_FILES['musicFile']['size'] < 10000000000) {
            $extension = pathinfo($_FILES['musicFile']['name'], PATHINFO_EXTENSION);
            $authorizedExtension = [
                'audio/mp3',
                'audio/mpeg',
                'video/mp4',
            ];
            if ($extension == "mp3" && in_array(mime_content_type($_FILES['musicFile']['tmp_name']), $authorizedExtension)) {
                $post->mp3Files = 'medias/' . uniqid() . '.' . $extension;
            } else {
                $formErrors['mp3File'] = "test1";
            }
        } else {
            $formErrors['mp3File'] = "test2";
        }
    } else {
        $formErrors['mp3File'] = ERROR_POSTS_IMAGE_SIZE;
    }

    if (count($formErrors) == 0) {
        $post->id_users = $_SESSION['user']['id'];
        if (move_uploaded_file($_FILES['musicImg']['tmp_name'], '../' . $post->img) && move_uploaded_file($_FILES['musicFile']['tmp_name'], '../' . $post->mp3Files)) {
            if ($post->add()) {
                $success = "SUCCESS_POSTS_ADD";
            } else {
                $formErrors['general'] = "erreur";
                unlink('../' . $post->img);
                unlink('../' . $post->mp3Files);
            }
        } else {
            $formErrors['image'] = "ERROR_POSTS_IMAGE_UPLOAD";
        }
    }
}

require_once '../views/header.php';
require_once '../views/parts/nav.php';
require_once '../views/pages/uploadPage.php';
require_once '../views/footer.php';
