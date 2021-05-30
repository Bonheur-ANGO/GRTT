<?php

namespace App\Models\Managers;

use App\Models\Main\Connexion;

class TypeCustomerManager{
    private $_bdd;

    public function __construct()
    {
        $this->_bdd = Connexion::getConnexionPDO();
    }

    public Function getCustomerType(){
        $bdd = $this->_bdd;
        $query = $bdd->query('SELECT * FROM customer_type');
        return $query->fetchAll();
    }
}