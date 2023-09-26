<form class="signupForm formFlex" action="" method="POST" enctype="multipart/form-data">
    <h1>Uploadez votre musique</h1>
    <div class="userMusicFile">
        <label for="musicFile">Choisissez votre musique</label>
        <input type="file" name="musicFile" id="musicFile">
    </div>
    <label for="musicName">Entrez le nom de la musique</label>
    <input type="text" name="musicName" id="musicName" placeholder="Nom de la musique">
    <label for="musicDescription">Entrez une description</label>
    <input type="text" name="musicDescription" id="musicDescription" placeholder="Description de la musique">
    <div class="userMusicImg">
        <label for="musicImg">Choisissez votre image</label>
        <input type="file" name="musicImg" id="musicImg">
    </div>
    <input class="submitBtn" type="submit" value="Uploader">
</form>