<?php

namespace App\Controllers;
use App\View;
use App\Models\Managers\AdministratorManager;

class AdminController{

    public function index(){
        $response = $this->loginAdmin();
        return View::render("loginAdministration", "administrator", "S'identifier", compact('response'));
    }

    public function loginAdmin(){
        $data = new AdministratorManager();
        $admin = $data->getAdmin();
        if (isset($_REQUEST['admin'], $_REQUEST['password'])) {
            if ($admin) {
                session_start();
                $_SESSION['id'] = $admin['id'];
                $_SESSION['admin'] = $admin['administrator_name'];
                $_SESSION['role'] = $admin['role'];
                header('Location: administration');
            } else {
                return 'Administrateur incorrect';
            }
        }
        if (AdministrationController::adminConnected()) {
            header('Location: administration');
        }
            
    }
}