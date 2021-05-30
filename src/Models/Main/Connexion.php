<?php 

namespace App\Models\Main;

use PDO;
use Exception;

class Connexion{

    public static function getConnexionPDO()
    {
        try {
         $bdd = new PDO("mysql:host=localhost;dbname=complaint;charset=utf8", 'bonheur', 'bonheur2017');
        } catch (Exception $e) {
            echo "Erreur de connexion à la bdd ". $e->getMessage();
        }
        return $bdd;
    }

}