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
    <input type="text" name="userDescription" id="userDescription" value="<?= $_SESSION['user']['description'] ?>" placeholder="Descrivez-vous">
    <label for="birthdate">Ajoutez votre date de naissance</label>
    <input type="date" value="<?= $userInfos->birthdate ?>" name="birthdate" id="birthdate">
    <input class="submitBtn" type="submit" name="updateUser" value="Valider les changements">
</form>
<div class="profileSection formFlex">
    <button id="open-modal-btn" class="deleteAcc">Supprimez votre compte</button>
    <div id="modal-container" class="modal-container">
        <div class="modal">
            <div class="modal-header">
                <span class="close-btn">&times;</span>
            </div>
            <div class="modal-content">
                <p>Êtes-vous sûr ?</p>
            </div>
            <div class="modal-footer">
                <form action="profil" method="POST">
                    <input class="deleteAccCheck" type="submit" value="Valider la suppression de mon compte" name="delete">
                </form>
                <span class="close-btn">Annuler</span>
            </div>
        </div>
    </div>
</div>