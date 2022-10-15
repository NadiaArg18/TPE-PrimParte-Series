<?php
require_once "./Model/EpisodeModel.php";
require_once "./Model/SeasonModel.php";
require_once "./View/EpisodeView.php";
require_once "./Model/UserModel.php";
require_once "./Helpers/authHelper.php";

class EpisodeController{
    private $EpisodeModel;
    private $SeasonModel;
    private $EpisodeView;
    private $UserModel;
    private $authHelper;

    function __construct(){
        $this->EpisodeModel = new EpisodeModel();
        $this->SeasonModel = new SeasonModel();
        $this->EpisodeView = new EpisodeView();
        $this->UserModel = new UserModel();
        $this->authHelper = new AuthHelper();
    }

    function showHome(){
        $episodes = $this->EpisodeModel->getEpisodes();
        $seasons = $this->SeasonModel->getSeasons();
        $users = $this->UserModel->getUsers();
        $this->EpisodeView->showEpisodes($episodes, $seasons, $users);
    }

    function addEpisode(){
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
        $this->EpisodeModel->addEpisode($_POST['nameEpisode'], $_POST['Director'], $_POST['fk_id_Season'], $_POST['Year']);
        $this->EpisodeView->showHomeLocation();
    }

    function deleteEpisode($id){
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
        $this->EpisodeModel->deleteEpisodeFromDB($id);
        $this->EpisodeView->showHomeLocation();
    }

    function updateEpisode($id){
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
        $seasons = $this->SeasonModel->getSeasons();
        $listEpisodes = $this->EpisodeModel->getEpisodeToEdit($id[0]);
        $this->EpisodeView->showUpdateEpisode($seasons, $listEpisodes);
    }

    function updateEpisodeFromDB(){
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
        $this->EpisodeModel->updateEpisodeFromDB($_POST['id'], $_POST['nameEpisode'], $_POST['Director'], $_POST['fk_id_Season'], $_POST['Year']);
        $this->EpisodeView->showHomeLocation();
    }

    function getEpisode($id){
        $episode = $this->EpisodeModel->showEpisode($id);
        $this->EpisodeView->showEpisode($episode);
    }

    function showSeasonEp($season){
        $seasonEpisode = $this->EpisodeModel->getEpisodesBySeason($season);
        $this->EpisodeView->seasonEpisode($seasonEpisode);
    }
}
