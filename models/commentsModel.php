<?php
class comments
{
    public $id;
    public $comment;
    public $id_bty9i_sounds;
    public $id_bty9i_users;
    public $userId;
    public $updatedComment;
    public $commentId;
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=soundtherapy;charset=utf8', 'root', 'root');
        } catch (PDOException $e) {
            //Renvoyer vers une page d'erreur
        }
    }

    public function add()
    {
        $query = 'INSERT INTO `bty9i_comments` (`comment`, `publicationDate`, `id_bty9i_sounds`, `id_bty9i_users`) 
        VALUES (:comment, NOW(), :id_bty9i_sounds, :bty9i_users);';
        $request = $this->db->prepare($query);
        $request->bindValue(':comment', $this->comment, PDO::PARAM_STR);
        $request->bindValue(':id_bty9i_sounds', $this->id_bty9i_sounds, PDO::PARAM_INT);
        $request->bindValue(':bty9i_users', $this->id_bty9i_users, PDO::PARAM_INT);
        return $request->execute();
    }

    public function getCommentsList()
    {
        $query = 'SELECT bty9i_comments.id AS commentId, id_bty9i_sounds, username, `bty9i_users`.`img` ,`comment`, DATE_FORMAT(`publicationDate`, "%d/%m/%Y") AS `publicationDate` FROM `bty9i_comments`
        INNER JOIN `bty9i_users` ON id_bty9i_users = bty9i_users.id
        INNER JOIN `bty9i_sounds` ON id_bty9i_sounds = bty9i_sounds.id
        WHERE `bty9i_sounds`.`id` = :id
        ORDER BY publicationDate DESC';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id_bty9i_sounds, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function delComment()
    {
        $query = 'DELETE FROM bty9i_comments WHERE id = :commentId AND id_bty9i_users = :userId';
        $request = $this->db->prepare($query);
        $request->bindValue(':commentId', $this->id, PDO::PARAM_INT);
        $request->bindValue(':userId', $this->userId, PDO::PARAM_INT);
        return $request->execute();
    }

    public function updateComment()
    {
        $query = "UPDATE bty9i_comments SET comment = :updated_comment WHERE id = :comment_id";
        $request = $this->db->prepare($query);
        $request->bindValue(':updated_comment', $this->updatedComment, PDO::PARAM_STR);
        $request->bindValue(':comment_id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }
}
