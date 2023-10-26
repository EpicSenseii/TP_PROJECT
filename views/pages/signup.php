<?php

// $formErr = [];
?>

<?php

// if (count($_POST) > 0) {
//     if (!empty($_POST['username'])) {
//         $username = $_POST['username'];
//     } else {
//         $formErr['username'] = "Veuillez entrer un pseudo valide";
//     }

//     if (!empty($_POST['userEmail'])) {
//         $userEmail = $_POST['userEmail'];
//     } else {
//         $formErr['userEmail'] = "Veuillez entrer un email valide";
//     }

//     if (!empty($_POST['userPwd'])) {
//         $userPwd = $_POST['userPwd'];
//     } else {
//         $formErr['userPwd'] = "Veuillez entrer un mot de passe valide";
//     }

//     if (!empty($_POST['userPwdVerification']) && $_POST['userPwdVerification'] === $_POST['userPwd']) {
//         $userPwdVerification = $_POST['userPwdVerification'];
//     } else {
//         $formErr['userPwdVerification'] = "Les mots de passe ne correspondent pas";
//     }
// }
?>

<?php if (isset($success)) { ?>
    <div class="accountCreated">
        <p>Votre inscription a bien été prise en compte.</p>
        <p>Vous pouvez <a href="signin">vous connecter</a> dès maintenant.</p>
    </div>
<?php } else { ?>
    <form class="signupForm formFlex" action="" method="POST">
        <h1>Inscrivez-vous</h1>

        <label for="username">Entrez votre pseudo</label>
        <input type="text" name="username" id="username" placeholder="Pseudo : Epic" value="<?= @$_POST['username'] ?>">
        <?php if (isset($formErrors['username'])) { ?>
            <span class="formErr"><?= $formErrors['username']; ?></span>
        <?php } ?>

        <label for="userEmail">Entrez votre adresse email</label>
        <input type="email" name="userEmail" id="userEmail" placeholder="Email : email@email.com" value="<?= @$_POST['userEmail'] ?>">
        <?php if (isset($formErrors['email'])) { ?>
            <span class="formErr"><?= $formErrors['email']; ?></span>
        <?php } ?>

        <label for="userPwd">Entrez votre mot de passe</label>
        <div class="pwdEye">
            <input type="password" name="userPwd" id="userPwd" class="userPwd" placeholder="Mot de passe">
            <span class="visibilityPwd">
                <i class="bi bi-eye-slash-fill eyeClose" id="eyeClose"></i>
                <i class="bi bi-eye-fill eyeOpen id=" eyeOpen"></i>
            </span>
        </div>

        <?php if (isset($formErrors['password'])) { ?>
            <span class="formErr"><?= $formErrors['password']; ?></span>
        <?php } ?>
        <label for="userPwdVerification">Veuillez confirmer votre mot de passe</label>
        <div class="pwdEye">
            <input type="password" name="userPwdVerification" id="userPwdVerification" class="userPwd2" placeholder="Confirmez votre mot de passe">
            <span class="visibilityPwd2">
                <i class="bi bi-eye-slash-fill eyeClose" id="eyeClose"></i>
                <i class="bi bi-eye-fill eyeOpen id=" eyeOpen"></i>
            </span>
        </div>

        <?php if (isset($formErrors['passwordConfirm'])) { ?>
            <span class="formErr"><?= $formErrors['passwordConfirm']; ?></span>
        <?php } ?>
        <div class="userImg">
            <label for="userAvatar">Choisissez votre image de profil</label>
            <input type="file" name="userAvatar" id="userAvatar">
        </div>

        <input class="submitBtn" type="submit" value="S'inscrire">
        <p>Déjà un compte ? <a href="signin">Connectez-vous</a></p>
    </form>
<?php } ?>

<script>
    const visibilityPwd = document.querySelector('.visibilityPwd');
    const visibilityPwd2 = document.querySelector('.visibilityPwd2');
    const passwordInputs = document.querySelector('.userPwd');
    const passwordInputs2 = document.querySelector('.userPwd2');

    visibilityPwd.addEventListener("click", (e) => {
        if (passwordInputs.type == "password") {
            passwordInputs.type = "text";
            eyeClose.style.display = "none";
            eyeOpen.style.display = "block";
        } else {
            passwordInputs.type = "password";
            eyeClose.style.display = "block";
            eyeOpen.style.display = "none";
        }
    })

    visibilityPwd2.addEventListener("click", (e) => {
        if (passwordInputs2.type == "password") {
            passwordInputs2.type = "text";
            eyeClose.style.display = "none";
            eyeOpen.style.display = "block";
        } else {
            passwordInputs2.type = "password";
            eyeClose.style.display = "block";
            eyeOpen.style.display = "none";
        }
    })
</script>