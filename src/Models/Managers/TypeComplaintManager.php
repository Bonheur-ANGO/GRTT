<?php

namespace App\Models\Managers;

use App\Models\Main\Connexion;

class TypeComplaintManager{

    private $_bdd;

    public function __construct()
    {
        $this->_bdd = Connexion::getConnexionPDO();
    }

    public function getComplaintType(){
        $bdd = $this->_bdd;
        $query = $bdd->query('SELECT * FROM complaint_type');
        return $query->fetchAll();
    }

}