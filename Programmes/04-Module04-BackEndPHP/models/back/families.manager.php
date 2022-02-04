<?php

require_once "models/Model.php";

class FamiliesManager extends Model {

    public function getFamilies() 
    {
        $req = "SELECT * FROM famille";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $families  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $families;
    }

    public function deleteDBFamille($idFamily) 
    {
        $req ="DELETE FROM famille WHERE famille_id= :idFamily";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idFamily",$idFamily,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

}