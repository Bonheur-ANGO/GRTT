<?php

namespace App\Controllers;

use App\View;
use App\Models\Managers\ComplaintManager;
use App\Models\Managers\TypeComplaintManager;
use App\Models\Managers\TypeCustomerManager;

class SendComplaintController{
    
    public function index(){

        if (HomeController::userConnected()) {
            $data = new TypeComplaintManager();
            $complaintTypes = $data->getComplaintType();
            $type = new TypeCustomerManager();
            $customerType = $type->getCustomerType();
            $complaint = new ComplaintManager();
            $response = $complaint->sendComplaint();
            $data = [
                'response' => $response,
                'typeCustomer' => $customerType,
                'typeComplaint' => $complaintTypes
            ];
            HomeController::disconnect();
            return View::render("sendComplaint", "complaint", "Envoyer une réclamation", compact('data'));
        } else {
            header('Location: ' . '/GRTT/public');
        }
    }

}