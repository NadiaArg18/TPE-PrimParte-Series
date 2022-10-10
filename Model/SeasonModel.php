<?php

class SeasonModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_serie;charset=utf8', 'root', '');
    }

    function getSeasons(){    
        $sentence = $this->db->prepare( "SELECT * FROM temporadas");
        $sentence->execute();
        $seasons = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $seasons;        
    }

    function getSeasonToEdit($id){
        $sentencia = $this->db->prepare('SELECT * FROM temporadas  WHERE id_Season = ?');
        $sentencia->execute(array($id));
        $season = $sentencia->fetch(PDO::FETCH_OBJ);
        return $season;
    }

    function addSeason($id_Season, $numberSeason, $Description){      
        $sentence = $this->db->prepare("INSERT INTO temporadas (id_Season, numberSeason, Description) VALUES(?,?,?)");
        $sentence->execute(array($id_Season, $numberSeason, $Description));              
    }
    
    function deleteSeasonFromDB($id){
        $sentence = $this->db->prepare("DELETE FROM temporadas WHERE id_Season = ?");
        $sentence->execute(array($id));
    }

    function updateSeasonFromDB($id_Season, $numberSeason, $Description){
        $sentence = $this->db->prepare("UPDATE temporadas SET numberSeason = ?, Description = ? WHERE id_Season = ?");
        $sentence->execute(array($numberSeason, $Description, $id_Season));
    }
}