<?php

namespace App\Controllers;

use App\Models\Managers\ComplaintManager;
use App\View;

class DisplayAllComplaintOfCustomerController
{

    public function index()
    {
        if (HomeController::userConnected()) {
            $data = new ComplaintManager();
            $complaints = $data->displayAllComplaintSend();
            return View::render("oneComplaintSend", "complaint", "Toutes vos réclamations", compact('complaints'));
        } else {
            header('Location: GRTT/public');
        }
    }
}
