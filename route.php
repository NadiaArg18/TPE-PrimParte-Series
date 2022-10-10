<?php
require_once "Controller/EpisodeController.php";
require_once "Controller/LogInController.php";
require_once "Controller/SeasonController.php";

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);

$episodeController = new EpisodeController();
$logInController = new LogInController();
$seasonController = new SeasonController();

switch ($params[0]) {
    case 'login':
        $logInController->login();
        break;
    case 'logout':
        $logInController->logout();
        break;
    case 'verify': 
        $logInController->verifyLogin(); 
        break;
    case 'registerUser':
        $logInController->registerUser();
        break;
    case 'home':
        $episodeController->showHome();
        break;
    case 'addEpisode':
        $episodeController->addEpisode();
        break;
    case 'getEpisode':
        $episodeController->getEpisode($params[1]);
        break;
    case 'deleteEpisode':
        $episodeController->deleteEpisode($params[1]);
        break;
    case 'updateEpisode':
        $episodeController->updateEpisode();
        break;
    case 'home':
        $seasonController->showHome();
        break;
    case 'showSeasonEp':
        $episodeController->showSeasonEp($params[1]);
        break;
    case 'addSeason':
        $seasonController->addSeason();
        break;
    case 'deleteSeason':
        $seasonController->deleteSeason($params[1]);
        break;
    case 'updateSeason':
        $seasonController->updateSeason($params[1]);
        break;
    default:
        echo ('404 page not found');
        break;
}
