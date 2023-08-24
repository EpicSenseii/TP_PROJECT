<?php
$title = "SoundTherapy - Sign Up";

require_once '../models/usersModel.php';
//var_dump($_POST);

$regex = [
    'username' => '/^(?=.*[a-zA-Z]{3,})[a-zA-Z0-9-]+$/',
    'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
    'birthdate' => '/^[0-9]{4}(-[0-9]{2}){2}$/',
];

$formErrors = [];

if (count($_POST) > 0) {
    $user = new users;
    if (!empty($_POST['username'])) {
        if (preg_match($regex['username'], $_POST['username'])) {
            $user->username = strip_tags($_POST['username']);
        } else {
            $formErrors['username'] = 'Votre nom d\'utilisateur n\'est pas valide. Il doit comporter au moins 3 lettres et ne peut contenit que des lettres, chiffres et tirets.';
        }
    } else {
        $formErrors['username'] = 'Veuillez renseigner votre nom d\'utilisateur.';
    }

    if (!empty($_POST['userEmail'])) {
        if (filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL)) {
            $user->email = strip_tags($_POST['userEmail']);
            try {
                if ($user->checkAvaibility() == 1) {
                    $formErrors['email'] = 'L\'adresse mail est déjà utilisée.';
                }
            } catch (PDOException $e) {
                $formErrors['general'] = 'Une erreur est survenue, l\'administrateur a été prévenu';
            }
        } else {
            $formErrors['email'] = 'Votre adresse e-mail n\'est pas valide. Elle ne peut comporter que des lettres, tirets, underscores, points et chiffres.';
        }
    } else {
        $formErrors['email'] = 'Veuillez renseigner votre adresse e-mail.';
    }

    if (!empty($_POST['userPwd'])) {
        if (!preg_match($regex['password'], $_POST['userPwd'])) {
            $formErrors['password'] = 'Votre mot de passe n\'est pas valide. Il doit comporter au moins 8 caractères dont une majuscule, une minuscule, un chiffre et un caractère spécial.';
        }
    } else {
        $formErrors['password'] = 'Veuillez renseigner votre mot de passe.';
    }

    if (!empty($_POST['userPwdVerification'])) {
        if (!isset($formErrors['password'])) {
            if ($_POST['userPwd'] == $_POST['userPwdVerification']) {
                $user->password = password_hash($_POST['userPwd'], PASSWORD_DEFAULT);
            } else {
                $formErrors['password'] = $formErrors['passwordConfirm'] = 'Les mots de passes ne correspondent pas.';
            }
        }
    } else {
        $formErrors['passwordConfirm'] = 'Veuillez confirmer votre mot de passe.';
    }

    if (count($formErrors) == 0) {
        try {
            if($user->add()) {
                $success = true;
            }
        } catch (PDOException $e) {
            $formErrors['general'] = 'Une erreur est survenue, l\'administrateur a été prévenu';
        }
    }
}

require_once '../views/header.php';
require_once '../views/parts/nav.php';
require_once '../views/pages/signup.php';
require_once '../views/footer.php';