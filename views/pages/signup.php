<?php $title = "SoundTherapy - Sign Up" ?>
<?php include "../header.php"; ?>

<?php include "../parts/nav.php"; ?>

<?php

$formErr = [];

if (count($_POST) > 0) {
    if (!empty($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        $formErr['username'] = "Veuillez entrer un pseudo valide"; 
    }

    if (!empty($_POST['userEmail'])) {
        $userEmail = $_POST['userEmail'];
    } else {
        $formErr['userEmail'] = "Veuillez entrer un email valide";
    }

    if (!empty($_POST['userPwd'])) {
        $userPwd = $_POST['userPwd'];
    } else {
        $formErr['userPwd'] = "Veuillez entrer un mot de passe valide";
    }

    if (!empty($_POST['userPwdVerification']) && $_POST['userPwdVerification'] === $_POST['userPwd']) {
        $userPwdVerification = $_POST['userPwdVerification'];
    } else {
        $formErr['userPwdVerification'] = "Les mots de passe ne correspondent pas";
    }
}
?>

<form class="signupForm formFlex" action="" method="POST">
    <h1>Inscrivez-vous</h1>
    <label for="username">Entrez votre pseudo</label>
    <input type="text" name="username" id="username" placeholder="Pseudo : Epic">
    <?php if (isset($formErr['username'])) { ?>
        <span class="formErr"><?= $formErr['username']; ?></span>
    <?php } ?>
    <label for="userEmail">Entrez votre adresse email</label>
    <input type="email" name="userEmail" id="userEmail" placeholder="Email : email@email.com">
    <?php if (isset($formErr['userEmail'])) { ?>
        <span class="formErr"><?= $formErr['userEmail']; ?></span>
    <?php } ?>
    <label for="userPwd">Entrez votre mot de passe</label>
    <input type="password" name="userPwd" id="userPwd" placeholder="Mot de passe">
    <?php if (isset($formErr['userPwd'])) { ?>
        <span class="formErr"><?= $formErr['userPwd']; ?></span>
    <?php } ?>
    <label for="userPwdVerification">Veuillez confirmer votre mot de passe</label>
    <input type="password" name="userPwdVerification" id="userPwdVerification" placeholder="Confirmez votre mot de passe">
    <?php if (isset($formErr['userPwdVerification'])) { ?>
        <span class="formErr"><?= $formErr['userPwdVerification']; ?></span>
    <?php } ?>
    <div class="userImg">
        <label for="userAvatar">Choisissez votre image de profil</label>
        <input type="file" name="userAvatar" id="userAvatar">
    </div>
    <input class="submitBtn" type="submit" value="S'inscrire">
    <p>Déjà un compte ? <a href="signin.php">Connectez-vous</a></p>
</form>

<?php include "../footer.php"; ?>