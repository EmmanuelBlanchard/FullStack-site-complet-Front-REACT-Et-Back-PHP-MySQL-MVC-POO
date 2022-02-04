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
            $idFamily = (int)Security::secureHTML($_POST['famille_id']);

            if($this->familiesManager->countAnimals($idFamily) > 0) {
                $_SESSION['alert'] = [
                    "message" => "La famille n'a pas été supprimée",
                    "type" => "alert-danger"
                ];
            } else {
                $this->familiesManager->deleteDBFamille($idFamily);
                $_SESSION['alert'] = [
                    "message" => "La famille a été supprimée",
                    "type" => "alert-success"
                ];
            }
           
            header('Location: '.URL.'back/familles/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function modification()
    {
        if(Security::sessionAccessVerification()) {
            $idFamily = (int)Security::secureHTML($_POST['famille_id']);
            $libelleFamily = Security::secureHTML($_POST['famille_libelle']);
            $descriptionFamily = Security::secureHTML($_POST['famille_description']);
            $this->familiesManager->updateDBFamille($idFamily,$libelleFamily,$descriptionFamily);

            $_SESSION['alert'] = [
                "message" => "La famille a bien été modifiée",
                "type" => "alert-success"
            ];

            header('Location: '.URL.'back/familles/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

}