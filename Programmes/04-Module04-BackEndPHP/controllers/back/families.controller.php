<?php
require_once "./controllers/back/Security.class.php";
require_once "./models/back/families.manager.php";

class FamiliesController {
    private $familiesManager;

    public function __construct()
    {
        $this->familiesManager = new FamiliesManager();
    }

    public function visualization()
    {
        if(Security::sessionAccessVerification()) {
            $families = $this->familiesManager->getFamilies();
            require_once "views/familyVisualization.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function deletion() 
    {
        if(Security::sessionAccessVerification()) {
            $this->familiesManager->deleteDBFamille((int)Security::secureHTML($_POST['famille_id']));
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

}