<?php

namespace App\Controllers;

use App\View;
use App\Models\Managers\ComplaintManager;

class ComplaintInProgressController{

    public function index(){
        if (AdministrationController::adminConnected()) {
            $data = new ComplaintManager();
            $this->adminDisconnected();
            if (isset($_REQUEST['progress_type_1'])) {
                $complaints = $data->getAllComplaintsInProgressByType1();
            } elseif (isset($_REQUEST['progress_type_2'])) {
                $complaints = $data->getAllComplaintsInProgressByType2();
            } elseif (isset($_REQUEST['progress_type_3'])) {
                $complaints = $data->getAllComplaintsInProgressByType3();
            } elseif (isset($_REQUEST['progress_type_4'])) {
                $complaints = $data->getAllComplaintsInProgressByType4();
            } else {
                $complaints = $data->getAllComplaintsStateOne();
            }
            return View::render("progress", "complaint", "Réclamations en cours", compact('complaints'));
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