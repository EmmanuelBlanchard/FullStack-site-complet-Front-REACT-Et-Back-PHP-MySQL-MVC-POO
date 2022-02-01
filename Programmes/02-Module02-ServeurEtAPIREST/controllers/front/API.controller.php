<?php
require_once "models/front/API.manager.php";

class APIController {
    private $apiManager;

    public function __construct() {
        $this->apiManager = new APIManager();
    }

    public function getAnimals() {
        $animals = $this->apiManager->getDBAnimals();
        echo "<pre>";
        print_r($animals);
        echo "</pre>";
        //echo "Envoi des informations sur les animaux";
    }

    public function getAnimal($idAnimal) {
        echo "Données JSON de l'animal avec l'identifiant ".$idAnimal." demandées";
    }

    public function getContinents() {
        echo "Données JSON des continents demandées";
    }
    
    public function getFamilies() {
        echo "Données JSON des familles demandées";
    }
    
}