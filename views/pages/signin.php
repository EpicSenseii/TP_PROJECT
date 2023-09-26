<form class="signinForm formFlex" action="" method="POST">
    <h1>Connectez-vous</h1>
    <label for="userEmail">Entrez votre adresse email</label>
    <input type="email" name="userEmail" id="userEmail" placeholder="Email : email@email.com">
    <label for="userPwd">Entrez votre mot de passe</label>
    <div class="pwdEye">
        <input type="password" name="userPwd" id="userPwd" class="userPwd" placeholder="Mot de passe">
        <span class="visibilityPwd">
            <i class="bi bi-eye-slash-fill eyeClose" id="eyeClose"></i>
            <i class="bi bi-eye-fill eyeOpen id=" eyeOpen"></i>
        </span>
    </div>
    <input class="submitBtn" type="submit" value="Se connecter">
    <p>Aucun compte ? <a href="signup">Créer un compte</a></p>
</form>

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
</script>