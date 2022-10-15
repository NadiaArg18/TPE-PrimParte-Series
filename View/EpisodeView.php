<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class EpisodeView {
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }  
  
    function showEpisodes($episodes, $seasons){
        $this->smarty->assign('episodes', $episodes);
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->display('templates/showHome.tpl');
        $this->smarty->display('templates/addEpisode.tpl');
        $this->smarty->display('templates/addSeason.tpl');
    }

    function showEpisode($episode){
        $this->smarty->assign('episode', $episode);
        $this->smarty->display('templates/showEpisode.tpl');
    }

    function showUpdateEpisode($seasons, $listEpisodes){
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->assign('listEpisodes', $listEpisodes);
        $this->smarty->display('templates/updateEpisode.tpl');
    }

    function seasonEpisode($seasonEpisodes){
        $this->smarty->assign('seasonEpisodes', $seasonEpisodes);
        $this->smarty->display('templates/seasonEpisodes.tpl');
    }

    function showHomeLocation(){
        header("Location: " . BASE_URL . "home");
    }

    function showLoginLocation(){
        header("Location: " . BASE_URL . "login");
    }
}