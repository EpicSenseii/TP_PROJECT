<form class="profileSection formFlex" action="" method="POST" enctype="multipart/form-data">
    <div class="profilHeader">
        <img class="userIcon" src="<?= $_SESSION['user']['img'] ?>" alt="">
        <h1>Profile</h1>
    </div>
    <div class="userMusicImg">
        <label for="userImg">Modifiez votre image de profil</label>
        <input type="file" name="userImg" id="userImg" enc>
    </div>
    <label for="usernameChange">Modifiez votre nom d'utilisateur</label>
    <input type="text" name="usernameChange" id="usernameChange" value="<?= $_SESSION['user']['username'] ?>" placeholder="<?= $_SESSION['user']['username'] ?>">
    <label for="userDescription">Entrez une description</label>
    <input type="text" name="userDescription" id="userDescription" value="<?= $userInfos->description ?>" placeholder="Descrivez-vous">
    <label for="birthdate">Ajoutez votre date de naissance</label>
    <input type="date" value="<?= $userInfos->birthdate ?>" name="birthdate" id="birthdate">
    <input class="submitBtn" type="submit" name="updateUser" value="Valider les changements">
    <button class="deleteAcc">Supprimez votre compte</button>
</form>