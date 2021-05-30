<?php

namespace App\Controllers;

use App\Models\Managers\UserManager;
use App\View;

class PasswordForgetController {
    
    public Function index(){
        $password = new UserManager();
        $result = $password->changePasswordForget();
        return View::render("forgetPassword", "parameters", "Changer votre mot de passe", compact('result'));
    }
}