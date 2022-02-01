<?php
require_once "models/front/API.manager.php";
require_once "models/Model.php";

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
        $rowsAnimal = $this->apiManager->getDBAnimal($idAnimal);
        echo "<pre>";
        print_r($rowsAnimal);
        echo "</pre>";
        // echo "Données JSON de l'animal avec l'identifiant ".$idAnimal." demandées";
    }

    public function getContinents() {
        $continents = $this->apiManager->getDBContinents();
        Model::viewJSON($continents);
    }

    public function getFamilies() {
        $families = $this->apiManager->getDBFamilies();
        Model::viewJSON($families);
    }

}