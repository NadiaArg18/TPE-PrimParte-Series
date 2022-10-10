<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class SeasonView {
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }  
  
    function showSeasons($seasons){
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->display('templates/showHome.tpl');
    }

    function showUpdateSeason($listSeasons) {
        $this->smarty->assign('listSeasons', $listSeasons);
        $this->smarty->display('templates/updateSeason.tpl');
    }

    function showHomeLocation(){
        header("Location: " . BASE_URL . "home");
    }

    function showLoginLocation(){
        header("Location: " . BASE_URL . "login");
    }
}
