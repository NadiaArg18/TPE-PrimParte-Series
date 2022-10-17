<?php

class SeasonModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_serie;charset=utf8', 'root', '');
    }

    function getSeasons(){    
        $sentence = $this->db->prepare("SELECT * FROM temporadas");
        $sentence->execute();
        $seasons = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $seasons;        
    }

    function getSeasonToEdit($id_Season){
        $sentence = $this->db->prepare("SELECT * FROM temporadas WHERE id_Season = ?");
        $sentence->execute(array($id_Season));
        $listSeasons = $sentence->fetch(PDO::FETCH_OBJ);
        return $listSeasons;
    }

    function addSeason($id_Season, $numberSeason, $seasonDescrip){      
        $sentence = $this->db->prepare("INSERT INTO temporadas (id_Season, numberSeason, seasonDescrip) VALUES(?,?,?)");
        $sentence->execute(array($id_Season, $numberSeason, $seasonDescrip));              
    }
    
    function deleteSeasonFromDB($id){
        $sentence = $this->db->prepare("DELETE FROM temporadas WHERE id_Season = ?");
        $sentence->execute(array($id));
    }

    function updateSeasonFromDB($id_Season, $numberSeason, $seasonDescrip){
        $sentence = $this->db->prepare("UPDATE temporadas SET numberSeason = ?, seasonDescrip = ? WHERE id_Season = ?");
        $sentence->execute(array($numberSeason, $seasonDescrip, $id_Season));
    }
}