<?php

namespace App\Controllers;

use App\Models\Managers\ComplaintManager;
use App\View;
use App\Models\Managers\UserManager;

class HomeController{

    public function index(){
        if ($this->userConnected()) {
            $this->disconnect();
            $complaint = new ComplaintManager();
            if ($complaint->verifyComplaint() == true) {
                $result = 1;
            } else {
                $result = 0;
            }
            $data = [
                'result' => $result,
                'allSend' => $complaint->AllComplaintSend()
            ];
            return View::render("userHome", "user", "Accueil", compact('data'));
        }else {
            header('Location: ' . '/GRTT/public');
        }
    }

    public static function userConnected(){
        if (session_status() == 1) {
            session_start();
        }
        return !empty($_SESSION['id_user']);
    }

    public static function disconnect()
    {
        if (isset($_REQUEST['disconnect'])) {
            unset($_SESSION['id_user']);
            unset($_SESSION['username']);
            header('Location: /GRTT/public');
        }
    }

}