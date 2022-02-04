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

}