<?php
session_start();
require_once '../models/usersModel.php';
$title = "SoundTherapy - Profil";

if (!isset($_SESSION['user'])) {
    header('Location:signin');
    exit;
}

$formErrors = [];
$user = new users();
//Permet de renseigner l'id de l'utilisateur depuis la session
$user->id = $_SESSION['user']['id'];
$userInfos = $user->getOneById();

$updateProfil = new users();
$updateProfil->id = $_SESSION['user']['id'];

if (isset($_POST['updateUser'])) {
    if ($_FILES['userImg']['error'] != 4) {
        //Si le fichier ne dépasse pas une certaine taille, ici 1000000
        if ($_FILES['userImg']['size'] < 1000000) {
            //Ici nous déclarons les extensions que nous souhaitons accepter
            $extension = pathinfo($_FILES['userImg']['name'], PATHINFO_EXTENSION);
            $authorizedExtension = [
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'png' => 'image/png',
            ];
            //Si le fichier est bien de l'unes des extentions choisies plus haut, nous l'acceptons, le fichier sera ensuite déplacé dans le chemin indiqué (medias)
            if (array_key_exists($extension, $authorizedExtension) && mime_content_type($_FILES['userImg']['tmp_name']) == $authorizedExtension[$extension]) {
                $updateProfil->img = 'medias/' . uniqid() . '.' . $extension;
            } else {
                $formErrors['image'] = "test";
            }
        } else {
            $formErrors['image'] = "test";
        }
    } else {
        $formErrors['image'] = "La taille de l'image est trop grande";
    }
    if (isset($_POST['usernameChange'])) {
        $updateProfil->username = strip_tags($_POST['usernameChange']);
    } else {
        $formErrors['username'] = "Le nom d'utilisateur n'a pas pu être changé";
    }
    if (isset($_POST['userDescription'])) {
        $updateProfil->description = strip_tags($_POST['userDescription']);
    } else {
        $formErrors['description'] = "La description n'a pas pu être changée";
    }
    if (isset($_POST['birthdate'])) {
        $updateProfil->birthdate = strip_tags($_POST['birthdate']);
    } else {
        $formErrors['birthdate'] = "La date de naissance n'a pas pu être changée";
    }
    if (count($formErrors) == 0) {
        try {
            if ($updateProfil->update()) {
                move_uploaded_file($_FILES['userImg']['tmp_name'], '../' . $updateProfil->img);
                //Permet de changer le nom d'utilisateur immédiatement
                $_SESSION['user']['username'] = $updateProfil->username;
                $_SESSION['user']['img'] = $updateProfil->img;
                //Permet de rafraichir la page après le submit, pour rafraichir les éléments avec les nouveaux textes
                // echo "<meta http-equiv='refresh' content='0'>";
            }
        } catch (PDOException $e) {
            $formErrors['general'] = 'Une erreur est survenue, l\'administrateur a été prévenu';
        }
    }
}

var_dump($formErrors);

require_once '../views/header.php';
require_once '../views/parts/nav.php';
require_once '../views/pages/profile.php';
require_once '../views/footer.php';