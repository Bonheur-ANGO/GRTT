<?php

namespace App\Models\Managers;

use App\Models\Main\Connexion;

class ResponseManager{

    private $_bdd;

    public function __construct()
    {
        $this->_bdd = Connexion::getConnexionPDO();
    }

    public function sendResponse()
    {
        $bdd = $this->_bdd;
        if (isset($_GET['id'])) {
            if (isset($_REQUEST['state_processed'])) {
                $q = $bdd->prepare('INSERT INTO response(message_response, id_complaint, date_response) VALUES (\' Votre réclamation a bien été traitée par nos agents, nous vous demandons de faire quelques vérifications pour vous en assurez. Nous vous remercions...   Equipe TT... \', ?, NOW() ) ');
                $q->execute([$_GET['id']]);
                if ($q) {
                    return 'Un message automatique a bien été envoyé au client pour lui confirmer que la réclamation a bien été traitée';
                }
            } elseif (isset($_REQUEST['message_personalised'])) {
                $q = $bdd->prepare('INSERT INTO response(message_response, id_complaint, date_response) VALUES (?, ?, NOW() ) ');
                $q->execute([$_REQUEST['message_personalised'], $_GET['id'] ]);
                if ($q) {
                    return 'Votre message a bien été envoyé au client pour lui confirmer que la réclamation a bien été traitée';
                }
            }
        }
        
    }

    public function getResponse(){
        $bdd = $this->_bdd;
        if (isset($_GET['id'])) {
            $q = $bdd->prepare('SELECT * FROM response WHERE id_complaint=:id');
            $q->execute([
                ':id' => $_GET['id']
                ]);
            return $q->fetchAll();
        }
    }

}