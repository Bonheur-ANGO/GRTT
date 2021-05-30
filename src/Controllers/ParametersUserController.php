<?php

namespace App\Controllers;

use App\Models\Managers\UserManager;
use App\View;

class ParametersUserController{
    
    public function index(){
        if (HomeController::userConnected()) {
            $user = new UserManager();
            $result = $user->changePassword();
            return View::render('parameters-user', "parameters", "Paramètres de l'utilisateur", compact('result'));
        } else {
            header('Location: ' . '/GRTT/public');
        }
    }
}