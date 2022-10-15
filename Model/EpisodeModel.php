<?php

class EpisodeModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_serie;charset=utf8', 'root', '');
    }

    function getEpisodes(){    
        $sentence = $this->db->prepare("SELECT * FROM episodios");
        $sentence->execute();
        $episodes = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $episodes; 
    }
    
    function showEpisode($id){ 
        $sentence = $this->db->prepare("SELECT a.*,b.* FROM episodios a INNER JOIN temporadas b ON a.fk_id_Season = b.id_Season WHERE a.id = ?");
        $sentence->execute(array($id));
        $episode = $sentence->fetch(PDO::FETCH_OBJ);
        return $episode;
    }

    function addEpisode($nameEpisode, $Director, $fk_id_Season, $Year){      
        $sentence = $this->db->prepare("INSERT INTO episodios (nameEpisode, Director, fk_id_Season, Year) VALUES(?,?,?,?)");
        $sentence->execute(array($nameEpisode, $Director, $fk_id_Season, $Year));              
    }
    
    function deleteEpisodeFromDB($id){
        $sentence = $this->db->prepare("DELETE FROM episodios WHERE id = ?");
        $sentence->execute(array($id));
    }

    function getEpisodeToEdit($id){
        $sentence = $this->db->prepare("SELECT * FROM episodios WHERE id = ?");
        $sentence->execute(array($id));
        return $sentence->fetch(PDO::FETCH_OBJ);
    }
    
    function updateEpisodeFromDB($id, $nameEpisode, $Director, $fk_id_Season, $Year){
        $sentence = $this->db->prepare("UPDATE episodios SET nameEpisode = ?, Director = ?, fk_id_Season = ?, Year = ? WHERE id = ?");
        $sentence->execute(array($nameEpisode, $Director, $fk_id_Season, $Year, $id));
    }

    function getEpisodesBySeason($season){
        $sentence = $this->db->prepare("SELECT a.*,b.* FROM episodios a INNER JOIN temporadas b ON a.fk_id_Season = b.id_Season WHERE b.id_Season = ?");
        $sentence->execute(array($season));
        $seasonEpisode = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $seasonEpisode;
    }
}
