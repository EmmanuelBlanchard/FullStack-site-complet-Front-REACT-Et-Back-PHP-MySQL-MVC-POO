<?php 
//http://localhost/...
//https://www.h2prog.com/...
session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "./controllers/front/API.controller.php";
require_once "./controllers/back/admin.controller.php";
$apiController = new APIController();
$adminController = new AdminController();

try {
    if(empty($_GET['page'])) {
        throw new Exception("La page n'existe pas");
    } else {
        $url = explode("/",filter_var($_GET['page'],FILTER_SANITIZE_URL));
        if(empty($url[0]) || empty($url[1])) throw new Exception ("La page n'existe pas");
        switch($url[0]) {
            case "front" : 
                switch($url[1]) {
                    case "animaux": 
                        if(!isset($url[2]) || !isset($url[3])) {
                            $apiController->getAnimals(-1,-1);
                        } else {
                            $apiController->getAnimals((int)$url[2],(int)$url[3]);
                        }
                    break;
                    case "animal": 
                        if(empty($url[2])) throw new Exception ("L'identifiant de l'animal est manquant");
                        $apiController->getAnimal($url[2]);
                    break;
                    case "continents": $apiController->getContinents();
                    break;
                    case "familles": $apiController->getFamilies();
                    break;
                    case "sendMessage" : $apiController->sendMessage();
                    break;
                    default : throw new Exception ("La page n'existe pas");
                }
            break;
            case "back" : 
                switch($url[1]) {
                    case "login" : $adminController->getLoginPage();
                    break;
                    case "connexion" : $adminController->connection();
                    break;
                    case "admin" : $adminController->getHomeAdmin();
                    break;
                    default : throw new Exception ("La page n'existe pas");
                }
            break;
            default : throw new Exception ("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    echo $msg;
}
