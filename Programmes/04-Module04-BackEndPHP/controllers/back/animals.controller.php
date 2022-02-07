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

    public function creationValidation()
    {
        if(Security::sessionAccessVerification()) {
            $nameAnimal = Security::secureHTML($_POST['animal_nom']);
            $descriptionAnimal = Security::secureHTML($_POST['animal_description']);
            $imageAnimal = "";
            $familyAnimal = (int) Security::secureHTML($_POST['famille_id']);

            $idAnimal = $this->animalsManager->createDBAnimal($nameAnimal,$descriptionAnimal,$imageAnimal,$familyAnimal);

            $continentsManager = new ContinentsManager();
            if(!empty($_POST['continent-1']))
                $continentsManager->addDBContinentAnimal($idAnimal,1);
            if(!empty($_POST['continent-2']))
                $continentsManager->addDBContinentAnimal($idAnimal,2);
            if(!empty($_POST['continent-3']))
                $continentsManager->addDBContinentAnimal($idAnimal,3);
            if(!empty($_POST['continent-4']))
                $continentsManager->addDBContinentAnimal($idAnimal,4);
            if(!empty($_POST['continent-5']))
                $continentsManager->addDBContinentAnimal($idAnimal,5);

            $_SESSION['alert'] = [
                "message" => "L'animal a été créé avec l'id : ".$idAnimal,
                "type" => "alert-success"
            ];
            header('Location: '.URL.'back/animaux/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function modification($idAnimal)
    {
        if(Security::sessionAccessVerification()) {
            $familiesManager = new FamiliesManager();
            $families = $familiesManager->getFamilies();
            $continentsManager = new ContinentsManager();
            $continents = $continentsManager->getContinents();

            $rowsAnimal = $this->animalsManager->getDBAnimal((int)Security::secureHTML($idAnimal));
            $tabContinents = [];
            foreach($rowsAnimal as $continent) {
                $tabContinents[] = $continent['continent_id'];
            }
            $animal = array_slice($rowsAnimal[0],0,5);

            require_once "views/modificationAnimal.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function modificationValidation()
    {
        if(Security::sessionAccessVerification()) {
            $idAnimal = Security::secureHTML($_POST['animal_id']);
            $nameAnimal = Security::secureHTML($_POST['animal_nom']);
            $descriptionAnimal = Security::secureHTML($_POST['animal_description']);
            $imageAnimal = "";
            $familyAnimal = (int) Security::secureHTML($_POST['famille_id']);

            $this->animalsManager->updateAnimal($idAnimal,$nameAnimal,$descriptionAnimal,$imageAnimal,$familyAnimal);
            
            $continents = [
                1 => !empty($_POST['continent-1']),
                2 => !empty($_POST['continent-2']),
                3 => !empty($_POST['continent-3']),
                4 => !empty($_POST['continent-4']),
                5 => !empty($_POST['continent-5']),
            ];

            $continentsManager = new ContinentsManager;

            foreach ($continents as $key => $continent) {
                //continent coché et non présent en BD
                if($continents[$key] && !$continentsManager->checkAnimalContinentExists($idAnimal,$key)) {
                    $continentsManager->addDBContinentAnimal($idAnimal,$key);
                }

                //continent non coché et présent en BD
                if(!$continents[$key] && $continentsManager->checkAnimalContinentExists($idAnimal,$key)) {
                    $continentsManager->deleteDBContinentAnimal($idAnimal,$key);
                }
            }

            $_SESSION['alert'] = [
                "message" => "L'animal a bien été modifié",
                "type" => "alert-success"
            ];
            header('Location: '.URL.'back/animaux/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

}
