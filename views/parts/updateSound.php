<h1>Modifier votre musique</h1>
<form action="" method="POST">
    <input type="hidden" name="comment_id" value="<?= $commentId ?>">
    <textarea name="updated_comment" placeholder="Modifier le commentaire"></textarea>
    <input type="submit" value="Enregistrer les modifications" name="updateComment">
</form>