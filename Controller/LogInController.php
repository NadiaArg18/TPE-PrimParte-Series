<?php
require_once "./Model/UserModel.php";
require_once "./View/LogInView.php";

class LogInController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LogInView();
    }

    function login(){
        $this->view->showLogin();
    }
    
    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin("Te deslogueaste!");
    }

    function verifyLogin(){
        if (!empty($_POST['Email']) && !empty($_POST['Password'])) {
            $email = $_POST['Email'];
            $password = $_POST['Password'];
        }
            // Obtengo el usuario de la base de datos
            $user = $this->model->getUser($email);

            // Si el usuario existe y las contraseñas coinciden
            if ($user && password_verify($password, $user->Password)) {
                session_start();
                //$_SESSION['USER_ID'] = $user->id;
                //$_SESSION["Email"] = $email->email;
                $_SESSION["IS_LOGGED"] = 1;
                $this->view->showHome();
            } else {
                $this->view->showLogin("Acceso denegado");
            }
    }

    //Registro user
    function registerUser(){
        $password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
        $exists = $this->existsUser($_POST['Email']);
        if($exists){
            $this->view->showHome();
        }
        $this->model->registration($_POST['Email'], $password);
        $this->view->showLogin("¡Registrado con exito!");
    }

    function existsUser($user){
        $lista = $this->model->getUsers();
        foreach ($lista as $list){
            if($list->email === $user){
                return true;
            }
        }
    }
}