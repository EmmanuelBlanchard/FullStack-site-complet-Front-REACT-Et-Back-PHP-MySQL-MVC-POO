<?php

class APIController {
    public function getAnimals() {
        echo "Envoi des informations sur les animaux";
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