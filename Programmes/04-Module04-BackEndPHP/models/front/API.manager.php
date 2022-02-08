<?php
require_once "models/Model.php";

class APIManager extends Model {
    public function getDBAnimals($idFamily,$idContinent) 
    {
        $whereClause = "";
        if($idFamily !== -1 || $idContinent !== -1) $whereClause .= "WHERE ";
        if($idFamily !== -1) $whereClause .= "f.famille_id = :idFamille";
        if($idFamily !== -1 && $idContinent !== -1)  $whereClause .= " AND ";
        if($idContinent !== -1) $whereClause .= "a.animal_id IN (
            SELECT animal_id FROM animal_continent WHERE continent_id = :idContinent
        )";

        $req = "SELECT a.animal_id, animal_nom, animal_description, animal_image, f.famille_id, famille_libelle, famille_description, c.continent_id, continent_libelle 
        FROM animal a INNER JOIN famille f ON f.famille_id = a.famille_id
        LEFT JOIN animal_continent ac ON ac.animal_id = a.animal_id
        LEFT JOIN continent c ON c.continent_id = ac.continent_id ".$whereClause;
        $stmt = $this->getBdd()->prepare($req);
        if($idFamily !== -1) $stmt->bindValue(":idFamille",$idFamily,PDO::PARAM_INT);
        if($idContinent !== -1) $stmt->bindValue(":idContinent",$idContinent,PDO::PARAM_INT);
        $stmt->execute();
        $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $animals;
    }
    
    public function getDBAnimal($idAnimal) 
    {
        $req = "SELECT * 
        FROM animal a INNER JOIN famille f ON f.famille_id = a.famille_id
        INNER JOIN animal_continent ac ON ac.animal_id = a.animal_id
        INNER JOIN continent c ON c.continent_id = ac.continent_id
        WHERE a.animal_id = :idAnimal
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
        $stmt->execute();
        $rowsAnimal = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $rowsAnimal;
    }

    public function getDBFamilies() 
    {
        $req = "SELECT * 
        FROM famille
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $families = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $families;
    }
    public function getDBContinents() 
    {
        $req = "SELECT * 
        FROM continent
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $continents = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $continents;
    }
    
}
