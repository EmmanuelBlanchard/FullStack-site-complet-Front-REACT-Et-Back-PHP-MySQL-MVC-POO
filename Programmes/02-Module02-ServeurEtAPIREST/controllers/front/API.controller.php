<?php
require_once "models/front/API.manager.php";
require_once "models/Model.php";

class APIController {
    private $apiManager;

    public function __construct() {
        $this->apiManager = new APIManager();
    }

    public function getAnimals($idFamily,$idContinent) {
        $animals = $this->apiManager->getDBAnimals($idFamily,$idContinent);
        $tabResult = $this->formatDatasRowsAnimals($animals);
        // echo "<pre>";
        // print_r($tabResult);
        // echo "</pre>";
        Model::viewJSON($tabResult);
    }

    public function getAnimal($idAnimal) {
        $rowsAnimal = $this->apiManager->getDBAnimal($idAnimal);

        $tabResult = $this->formatDatasRowsAnimals($rowsAnimal);
        // echo "<pre>";
        // print_r($tabResult);
        // echo "</pre>";
        Model::viewJSON($tabResult);
    }

    private function formatDatasRowsAnimals($rows) {
        $tab = [];
        
        foreach($rows as $row) {
            if(!array_key_exists($row['animal_id'],$tab)) {
                $tab[$row['animal_id']] = [
                    "id" => $row['animal_id'],
                    "nom" => $row['animal_nom'],
                    "description" => $row['animal_description'],
                    "image" => URL."public/images/".$row['animal_image'],
                    "famille" => [
                        "idFamille" => $row['famille_id'],
                        "libelleFamille" => $row['famille_libelle'],
                        "descriptionFamille" => $row['famille_description']
                    ]
                ];
            }
           
            $tab[$row['animal_id']]['continents'][] = [
                "idContinent" => $row['continent_id'],
                "libelleContinent" => $row['continent_libelle']
            ];
        }

        return $tab;
    }

    public function getContinents() {
        $continents = $this->apiManager->getDBContinents();
        Model::viewJSON($continents);
    }

    public function getFamilies() {
        $families = $this->apiManager->getDBFamilies();
        Model::viewJSON($families);
    }

    public function sendMessage() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");

        $obj = json_decode(file_get_contents('php://input'));
        
        // $to = "contact@h2prog.com";
        // $subject = "Message du site MyZoo de : ".$obj->nom;
        // $message = $obj->contenu;
        // $headers = "From : ".$obj->email;
        // mail($to, $subject, $message, $headers);

        $returnMessage = [
            'from' => $obj->email,
            'to' => "contact@h2prog.com"
        ];

        echo json_encode($returnMessage);
    }

}