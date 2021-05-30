<?php

namespace App\Controllers;

use App\View;
use App\Models\Managers\ComplaintManager;

class ComplaintProcessedController{

    public function index(){
        if (AdministrationController::adminConnected()) {
            $this->adminDisconnected();
            $data = new ComplaintManager();
            if (isset($_REQUEST['processed_type_1'])) {
                $complaints = $data->getAllComplaintsProcessedByType1();
            } elseif (isset($_REQUEST['processed_type_2'])) {
                $complaints = $data->getAllComplaintsProcessedByType2();
            } elseif (isset($_REQUEST['processed_type_3'])) {
                $complaints = $data->getAllComplaintsProcessedByType3();
            } elseif (isset($_REQUEST['processed_type_4'])) {
                $complaints = $data->getAllComplaintsProcessedByType4();
            } else {
                $complaints = $data->getAllComplaintsStateTwo();
            }
            return View::render("processed", "complaint", "Réclamations Traitées", compact('complaints'));
        } else {
            header('Location: /GRTT/public/admin');
        }
    }

    public function adminDisconnected()
    {
        if (isset($_REQUEST['logout'])) {
            unset($_SESSION['id']);
            unset($_SESSION['admin']);
            header('Location: /GRTT/public/admin');
        }
    }
}