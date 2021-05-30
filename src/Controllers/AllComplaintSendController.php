<?php

namespace App\Controllers;

use App\Models\Managers\ComplaintManager;
use App\View;

class AllComplaintSendController{

    public function index(){
        if (HomeController::userConnected()) {
            $data = new ComplaintManager();
            if (isset($_REQUEST['in_progress'])) {
                $complaints = $this->getComplaintInProgress();
            } elseif (isset($_REQUEST['processed'])) {
                $complaints = $this->getComplaintProcessed();
            } else {
                $complaints = $data->displayAllComplaintSendOfUser();
            }
            return View::render("allComplaintSend", "complaint", "Toutes vos réclamations", compact('complaints'));
        } else {
            header('Location: GRTT/public');
        }
    }

    public function getComplaintProcessed()
    {
        $data = new ComplaintManager();
        return $data->getAllComplaintsStateTwoOfUser();
    }

    public function getComplaintInProgress()
    {
        $data = new ComplaintManager();
        return $data->getAllComplaintsStateOneOfUser();
    }
}