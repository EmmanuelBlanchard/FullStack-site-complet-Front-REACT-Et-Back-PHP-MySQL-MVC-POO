<?php 
//http://localhost/...
//https://www.h2prog.com/...
session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "./controllers/front/API.controller.php";
require_once "./controllers/back/admin.controller.php";
require_once "./controllers/back/families.controller.php";
require_once "controllers/back/animals.controller.php";
$apiController = new APIController();
$adminController = new AdminController();
$familiesController = new FamiliesController();
$animalsController = new AnimalsController();

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
                    case "deconnexion" : $adminController->disconnection();
                    break;
                    case "familles" :
                        switch($url[2]) {
                            case "visualisation" : $familiesController->visualization();
                            break;
                            case "validationSuppression" : $familiesController->deletion();
                            break;
                            case "validationModification" : $familiesController->modification();
                            break;
                            case "creation" : $familiesController->creationTemplate();
                            break;
                            case "creationValidation" : $familiesController->creationValidation();
                            break;
                            default : throw new Exception ("La page n'existe pas");
                        }
                    break;
                    case "animaux" :
                        switch($url[2]) {
                            case "visualisation" : $animalsController->visualization();
                            break;
                            case "validationSuppression" : $animalsController->deletion();
                            break;
                            case "creation" : $animalsController->creationTemplate();
                            break;
                            case "creationValidation" : $animalsController->creationValidation();
                            break;
                            default : throw new Exception ("La page n'existe pas");
                        }
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
    echo "<br/> <a href='".URL."back/login'>Login</a>";
}
