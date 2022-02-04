<?php

require_once "models/Model.php";

class AnimalsManager extends Model {
    
    public function getAnimals()
    {
        $req = "SELECT * FROM animal";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $animals;
    }

}
