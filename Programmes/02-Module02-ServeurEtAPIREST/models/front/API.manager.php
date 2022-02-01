<?php
require_once "models/Model.php";

class APIManager extends Model {
    public function getDBAnimals() {
        $req = "SELECT * 
        FROM animal a INNER JOIN famille f ON f.famille_id = a.famille_id
        INNER JOIN animal_continent ac ON ac.animal_id = a.animal_id
        INNER JOIN continent c ON c.continent_id = ac.continent_id
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $animals;
    }
    
}
