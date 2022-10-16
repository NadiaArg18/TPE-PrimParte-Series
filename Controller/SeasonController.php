<?php
require_once "./Model/SeasonModel.php";
require_once "./Model/EpisodeModel.php";
require_once "./View/SeasonView.php";
require_once "./Helpers/authHelper.php";

class SeasonController{
    private $model;
    private $EpisodeModel;
    private $view;
    private $authHelper;

    function __construct(){
        $this->model = new SeasonModel();
        $this->EpisodeModel = new EpisodeModel();
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
        $this->model->addSeason($_POST['id_Season'], $_POST['numberSeason'], $_POST['seasonDescrip']);
        $this->view->showHomeLocation(); #esto nos redirige a la home para que no nos de una pag vacia
    }

    function deleteSeason($id){
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
        try{
            $this->model->deleteSeasonFromDB($id);
            $this->view->showHomeLocation();
        } catch(Exception){
            $this->view->showError();
        }         
    }

    function updateSeason($id_Season){ 
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
        $listSeasons = $this->model->getSeasonToEdit($id_Season);
        $this->view->showUpdateSeason($listSeasons);
    }

    function updateSeasonFromDB(){
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
        $this->model->updateSeasonFromDB($_POST['id_Season'], $_POST['numberSeason'], $_POST['seasonDescrip']);
        $this->view->showHomeLocation();
    }
}