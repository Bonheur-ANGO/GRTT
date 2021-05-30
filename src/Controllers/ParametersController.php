<?php

namespace App\Controllers;

use App\Models\Managers\AdministratorManager;
use App\View;

class ParametersController
{
    
    public function index(){
        if (AdministrationController::adminConnected()) {
            $admins = [
                'allAdmins' => $this->allAdmins(),
                'responseAddAdmin' => $this->insertAdmin(),
                'deleteAdmin' => $this->deleteOneAdmin(),
                'changePassword' => $this->changeAdminPassword()
            ];
            return View::render("parameters", "parameters", "Paramètres", compact('admins'));
        } else {
            header('Location: /GRTT/public/admin');
        }
    }

    public function allAdmins(){
        $data = new AdministratorManager();
        return $data->getAllAdmin();
    }

    public function insertAdmin(){
        $insert = new AdministratorManager();
        return $insert->addAdmin();
    }

    public function deleteOneAdmin()
    {
        $delete = new AdministratorManager();
        return $delete->deleteAdmin();
    }

    public function changeAdminPassword(){
        $change = new AdministratorManager();
        return $change->changePassword();
    }
}
