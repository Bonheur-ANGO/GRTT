<?php

namespace App\Controllers;

use App\Models\Managers\ComplaintManager;
use App\Models\Managers\ResponseManager;
use App\View;

class DisplayComplaintToAdminController{

    public function index(){
        $complaint = [
            'complaint' => $this->getComplaintofUser(),
            'response' => $this->processedComplaintOfUser()
        ];
        return View::render("displayComplaintToAdmin","complaint","réclamation", compact('complaint'));
    }

    public function getComplaintofUser(){
        $data = new ComplaintManager();
        return $data->getOneComplaint();
    }

    public function processedComplaintOfUser(){
        $response = new ResponseManager();
        $complaint = new ComplaintManager();
        if (isset($_GET['id'])) {
            $complaint->processedComplaint($_GET['id']);
        }
        return $response->sendResponse();
    }
}