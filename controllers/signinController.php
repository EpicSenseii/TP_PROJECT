<?php
session_start();
require_once '../models/usersModel.php';
$title = "SoundTherapy - Sign In";

if (isset($_SESSION['user'])) {
    header('Location:feed');
    exit;
}

if (count($_POST) > 0) {
    $user = new users();

    //Récupérer l'adresse mail
    if (!empty($_POST['userEmail'])) {
        //S'il s'agit bien d'une adresse mail valide (sécurisé via filter_var)
        if (filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL)) {
            //Si l'adresse entrée est bien la même que celle enregistrée dans la base de donnée
            $user->email = $_POST['userEmail'];
            //Si l'adresse email n'est pas dans la base de donnée on retourne une erreur
            if ($user->checkAvaibility() == 0) {
                $formErrors['email'] = $formErrors['password'] = 'L\'adresse mail ou le mot de passe est incorrect.';
            }
        } else {
            $formErrors['email'] = 'Votre adresse e-mail n\'est pas valide. Elle ne peut comporter que des lettres, tirets, underscores, points et chiffres.';
        }
    } else {
        $formErrors['email'] = 'Veuillez renseigner votre email';
    }

    //Récupérer le mot de passe
    if (!empty($_POST['userPwd'])) {
        //S'il n'y pas d'erreur dans l'adresse mail
        if (!isset($formErrors['email'])) {
            //On récupère le mot de passe dans la base de donnée
            $user->password = $user->getHash();
            //On compare le mot de passe entré et le mot de passe dans la base de donnée, via une sécurité qui permet de comparer un mot de passe hashé
            if (password_verify($_POST['userPwd'], $user->password)) {
                //Si le mot de passe est correspondant on stock les informations de la base de donnée dans la session
                $_SESSION['user'] = $user->getInfos();
                header('Location:feed');
                // exit;
            } else {
                $formErrors['email'] = $formErrors['password'] = 'L\'adresse mail ou le mot de passe est incorrect.';
            }
        }
    } else {
        $formErrors['password'] = 'Le mot de passe est obligatoire';
    }
}


require_once '../views/header.php';
require_once '../views/parts/nav.php';
require_once '../views/pages/signin.php';
require_once '../views/footer.php';
