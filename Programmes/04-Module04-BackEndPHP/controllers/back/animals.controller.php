<?php
require_once "./controllers/back/Security.class.php";
require_once "./models/back/animals.manager.php";
require_once "./models/back/families.manager.php";
require_once "./models/back/continents.manager.php";

class AnimalsController {
    private $animalsManager;

    public function __construct()
    {
        $this->animalsManager = new AnimalsManager();
    }

    public function visualization() 
    {
        if(Security::sessionAccessVerification()) {
            $animals = $this->animalsManager->getAnimals();
            require_once "views/animalsVisualisation.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function deletion()
    {
        if(Security::sessionAccessVerification()) {
            $idAnimal = (int)Security::secureHTML($_POST['animal_id']);
            
            $this->animalsManager->deleteDBAnimalContinent($idAnimal);
            $this->animalsManager->deleteDBAnimal($idAnimal);
            $_SESSION['alert'] = [
                "message" => "L'animal a été supprimé",
                "type" => "alert-success"
            ];
           
            header('Location: '.URL.'back/animaux/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function creationTemplate()
    {
        if(Security::sessionAccessVerification()) {
            $familiesManager = new FamiliesManager();
            $families = $familiesManager->getFamilies();
            $continentsManager = new ContinentsManager();
            $continents = $continentsManager->getContinents();
            require_once "views/creationAnimal.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }
}
