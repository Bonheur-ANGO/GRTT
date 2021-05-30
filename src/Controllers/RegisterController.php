<?php

namespace App\Controllers;

use App\Models\Managers\UserManager;
use App\View;

class RegisterController{

    public function index(){
        $user = new UserManager();
        $response = null;
        if (isset($_REQUEST['username'], $_REQUEST['mail'], $_REQUEST['password'], $_REQUEST['confirm_password'],$_REQUEST['city'])) {
            $response = $user->insertUser();
        }
        return View::render("Register", "user", "Enregistrement", compact('response'));
    }
}