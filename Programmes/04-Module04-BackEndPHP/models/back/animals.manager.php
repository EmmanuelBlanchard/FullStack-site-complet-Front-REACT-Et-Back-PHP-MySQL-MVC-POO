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

    public function deleteDBAnimalContinent($idAnimal)
    {
        $req ="DELETE FROM animal_continent WHERE animal_id= :idAnimal";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function deleteDBAnimal($idAnimal)
    {
        $req ="DELETE FROM animal WHERE animal_id= :idAnimal";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function createDBAnimal($nameAnimal,$descriptionAnimal,$imageAnimal,$familyAnimal)
    {
        $req ="INSERT INTO animal (animal_nom,animal_description,animal_image,famille_id)
            VALUES (:nameAnimal,:descriptionAnimal,:imageAnimal,:familyAnimal)
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nameAnimal",$nameAnimal,PDO::PARAM_STR);
        $stmt->bindValue(":descriptionAnimal",$descriptionAnimal,PDO::PARAM_STR);
        $stmt->bindValue(":imageAnimal",$imageAnimal,PDO::PARAM_STR);
        $stmt->bindValue(":familyAnimal",$familyAnimal,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        return $this->getBdd()->lastInsertId();
    }

    public function getDBAnimal($idAnimal)
    {
        $req = "SELECT * FROM animal a
            INNER JOIN famille f ON a.famille_id = f.famille_id 
            INNER JOIN animal_continent ac ON ac.animal_id = a.animal_id
            WHERE a.animal_id = :idAnimal";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
        $stmt->execute();
        $rowsAnimal = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $rowsAnimal;
    }

}
