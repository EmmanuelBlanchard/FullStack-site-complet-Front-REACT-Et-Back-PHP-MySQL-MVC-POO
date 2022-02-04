<?php

require_once "models/Model.php";

class ContinentsManager extends Model {

    public function getContinents()
    {
        $req = "SELECT * FROM continent";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $continents = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $continents;
    }

    public function addContinentAnimal($idAnimal,$idContinent)
    {
        $req ="INSERT INTO animal_continent (animal_id,continent_id)
        VALUES (:idAnimal,:idContinent)
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
        $stmt->bindValue(":idContinent",$idContinent,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

}