<?php

require "./controllers/back/Security.class.php";
require "./models/back/admin.manager.php";

class AdminController {
    private $adminManager;

    public function __construct()
    {
        $this->adminManager = new AdminManager();
    }

    public function getLoginPage()
    {
        require_once "views/login.view.php";
    }

    public function connection()
    {
        if(!empty($_POST['login']) && !empty($_POST['password'])) {
            $login = Security::secureHTML($_POST['login']);
            $password = Security::secureHTML($_POST['password']);
            if($this->adminManager->isConnectionValid($login,$password)) {
                $_SESSION['access'] = "admin";
                header('Location: '.URL."back/admin");
            } else {
                header('Location: '.URL."back/login");
            }
        }

    }

    public function getHomeAdmin() 
    {
        require "views/homeAdmin.view.php";
    }

}
