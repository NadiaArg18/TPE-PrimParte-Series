<?php
require_once "./Model/SeasonModel.php";
require_once "./View/SeasonView.php";
require_once "./Helpers/authHelper.php";

class SeasonController{

    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        $this->model = new SeasonModel();
        $this->view = new SeasonView();
        $this->authHelper = new AuthHelper();
    }

    function showHome(){
        $seasons = $this->model->getSeasons();
        $this->view->showSeasons($seasons);
    }

    function addSeason(){
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
        $this->model->addSeason($_POST['id_Season'], $_POST['numberSeason'], $_POST['Description']);
        $this->view->showHomeLocation(); #esto nos redirige a la home para que no nos de una pag vacia
    }

    function deleteSeason($id){
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
        $this->model->deleteSeasonFromDB($id);
        $this->view->showHomeLocation();
    }

    function updateSeason($id_Season){ 
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
        $listSeasons = $this->model->getSeasonToEdit($id_Season);
        $this->view->showUpdateSeason($listSeasons);
    }
}