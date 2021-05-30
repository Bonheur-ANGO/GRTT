<?php

namespace App\Controllers;

use App\View;
use App\Models\Managers\ResponseManager;
use App\Models\Managers\ComplaintManager;

class DisplayComplaintToUserController{

    public function index(){
        $complaint = [
            'complaint' => $this->getComplaintofUser(),
            'response' => $this->getResponseOfAdmin()
        ];
        return View::render("displayComplaintToUser","complaint","Réclamation", compact('complaint'));
    }

    public function getComplaintofUser()
    {
        $data = new ComplaintManager();
        return $data->getOneComplaint();
    }

    public function getResponseOfAdmin(){
        $r = new ResponseManager();
        return $r->getResponse();
    }
}