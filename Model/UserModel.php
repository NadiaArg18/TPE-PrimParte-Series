<?php

class UserModel{

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_serie;charset=utf8', 'root', '');
    }

    //Registro usuario
    function registration($email, $password){
        $query = $this->db->prepare("INSERT INTO usuarios(Email, Password) VALUES(?,?)");
        $query->execute(array($email, $password));
    }

    function getUsers(){
        $query = $this->db->prepare("SELECT * FROM usuarios");
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    function getUser($email){     
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE Email = ?");
        $query->execute(array($email));
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}
