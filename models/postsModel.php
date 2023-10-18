<?php
class posts
{
    public $id;
    public $title;
    public $mp3Files;
    public $img;
    public $soundDescription;
    public $creationDate;
    public $id_users;
    public $birthdate;
    public $username;
    public $email;
    public $description;
    public $searchTerm;
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
        $query = 'INSERT INTO `bty9i_sounds` (`title`, `mp3Files`,`img`, `description`, `creationDate`,`id_bty9i_users`) 
        VALUES (:title, :mp3Files, :img, :soundDescription, NOW(),:id_users)';

        $request = $this->db->prepare($query);
        $request->bindValue(':title', $this->title, PDO::PARAM_STR);
        $request->bindValue(':mp3Files', $this->mp3Files, PDO::PARAM_STR);
        $request->bindValue(':img', $this->img, PDO::PARAM_STR);
        $request->bindValue(':soundDescription', $this->soundDescription, PDO::PARAM_STR);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $request->execute();
    }

    public function checkIfExists()
    {
        $query = 'SELECT COUNT(*) FROM `bty9i_sounds` WHERE id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    public function getList()
    {
        $query = 'SELECT `bty9i_sounds`.`id`, `title`, `mp3Files`,`bty9i_sounds`.`img`, `username`, DATE_FORMAT(`creationDate`, "%d/%m/%Y") AS `creationDate` FROM bty9i_sounds
        INNER JOIN bty9i_users ON `id_bty9i_users` = bty9i_users.id';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOneById()
    {
        $query = 'SELECT `title`, `mp3Files`,`bty9i_sounds`.`img`, `username`, DATE_FORMAT(`creationDate`, "%d/%m/%Y") AS `creationDate` FROM bty9i_sounds
        INNER JOIN bty9i_users ON `id_bty9i_users` = bty9i_users.id 
        WHERE `bty9i_sounds`.`id` = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }

    public function getByName()
    {
        $query = 'SELECT `title`, `mp3Files`,`bty9i_sounds`.`img`, `username`, DATE_FORMAT(`creationDate`, "%d/%m/%Y") AS `creationDate` FROM bty9i_sounds
        INNER JOIN bty9i_users ON `id_bty9i_users` = bty9i_users.id 
        WHERE `bty9i_sounds`.`title` = :title';
        $request = $this->db->prepare($query);
        $request->bindValue(':title', $this->searchTerm, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}
