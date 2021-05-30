<?php

namespace App\Controllers;

use App\Models\Managers\ComplaintManager;
use App\View;

class AdministrationController{

    public function index(){
        if ($this->adminConnected()) {
            $this->adminDisconnected();
            $data = new ComplaintManager();
                if (isset($_REQUEST['type_1'])) {
                    $complaints = $data->getAllComplaintsByType1();
                } elseif (isset($_REQUEST['type_2'])) {
                    $complaints = $data->getAllComplaintsByType2();
                } elseif (isset($_REQUEST['type_3'])) {
                    $complaints = $data->getAllComplaintsByType3();
                } elseif (isset($_REQUEST['type_4'])) {
                    $complaints = $data->getAllComplaintsByType4();
                } else {
                    $complaints = $data->getAllComplaints();
                }
            return View::render("AdministrationHome", "administrator", "Administration", compact('complaints'));
        } else {
            header('Location: admin');
        }
    }

    public static function adminConnected()
    {
        if (session_status() == 1) {
            session_start();
        }
        return !empty($_SESSION['id']);
    }

    public static function adminDisconnected(){
        if (isset($_REQUEST['logout'])) {
            unset($_SESSION['id']);
            unset($_SESSION['admin']);
            header('Location: admin');
        }
    }

    /*public function allComplaints(){
        $data = new ComplaintManager();
        return $data->getAllComplaints();
    }

    public function getComplaintProcessed()
    {
        $data = new ComplaintManager();
        return $data->getAllComplaintsStateTwo();
    }

    public function getComplaintInProgress()
    {
        $data = new ComplaintManager();
        return $data->getAllComplaintsStateOne();
    }*/
}