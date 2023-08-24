<?php

class users {
    public $id;
    public $username;
    public $email;
    public $password;
    public $img;
    public $id_bty9i_userRoles;
    private $db;

    public function __construct() {

            $this->db = new PDO('mysql:host=localhost;dbname=soundtherapy;charset=utf8', 'root', 'root');

    }

    public function add(){
        $query = 'INSERT INTO `bty9i_users` (`username`, `email`,`password`, `img`, `id_bty9i_usersRoles`) 
        VALUES (:username, :email, :password, :img, 1)';

        $request = $this->db->prepare($query);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        $request->bindValue(':img', $this->img, PDO::PARAM_STR);
        return $request->execute();
    }

    public function checkAvaibility() {
        $query = 'SELECT COUNT(*) FROM `bty9i_users` WHERE email = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    public function getHash(){
        $query = 'SELECT `password` FROM `bty9i_users` WHERE `email` = :email;';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    public function getInfos(){
        $query = 'SELECT `id`, `username`, `id_bty9i_usersRoles` FROM `bty9i_users` WHERE `email` = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_ASSOC);
    }

} 