<?php
require_once "./controllers/back/Security.class.php";
require_once "./models/back/animals.manager.php";

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
}
