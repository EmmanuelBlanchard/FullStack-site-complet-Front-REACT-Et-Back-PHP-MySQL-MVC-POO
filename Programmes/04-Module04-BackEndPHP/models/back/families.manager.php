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

    public function deleteDBFamily($idFamily) 
    {
        $req ="DELETE FROM famille WHERE famille_id= :idFamily";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idFamily",$idFamily,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function countAnimals($idFamily)
    {
        $req ="SELECT count(*) AS 'numberAnimals'
        FROM famille f INNER JOIN animal a ON a.famille_id = f.famille_id
        WHERE f.famille_id = :idFamily";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idFamily",$idFamily,PDO::PARAM_INT);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['numberAnimals'];
    }

    public function updateDBFamily($idFamily,$libelleFamily,$descriptionFamily)
    {
        $req ="UPDATE famille SET famille_libelle = :libelleFamily, famille_description = :descriptionFamily
        WHERE famille_id= :idFamily";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idFamily",$idFamily,PDO::PARAM_INT);
        $stmt->bindValue(":libelleFamily",$libelleFamily,PDO::PARAM_STR);
        $stmt->bindValue(":descriptionFamily",$descriptionFamily,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function createDBFamily($libelleFamily,$descriptionFamily) {
        $req ="INSERT INTO famille (famille_libelle,famille_description)
            VALUES (:libelleFamily,:descriptionFamily)
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":libelleFamily",$libelleFamily,PDO::PARAM_STR);
        $stmt->bindValue(":descriptionFamily",$descriptionFamily,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
        return $this->getBdd()->lastInsertId();
    }

}