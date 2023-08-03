<?php $title = "SoundTherapy - Sign Up" ?>
<?php include "../header.php"; ?>

<?php include "../parts/nav.php"; ?>

<form action="" method="POST">
    <h1>Inscrivez-vous</h1>
    <input type="text" name="username" id="username" placeholder="Pseudo : Epic">
    <input type="email" name="userEmail" id="userEmail" placeholder="Email : email@email.com">
    <input type="password" name="userPwd" id="userPwd" placeholder="Password">
    <input type="password" name="userPwdVerification" id="userPwdVerification" placeholder="Confirm your password">
    <input type="submit" value="S'inscrire">
</form>

<?php include "../footer.php"; ?>