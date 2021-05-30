<?php

namespace App\Controllers;

use App\View;
use App\Models\Managers\UserManager;

class LoginController
{
    public function index()
    {
        $response = $this->login();
        return View::render("loginUser", "user", "S'identifier", compact('response'));
    }

    public function login()
    {
        $data = new UserManager();
        $user = $data->getUser();
        if (isset($_REQUEST['username'], $_REQUEST['password'])) {
            if ($user && password_verify($_REQUEST['password'], $user['password'])) {
                session_start();
                $_SESSION['id_user'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: ' . $_SERVER['REQUEST_URI'] . 'home');
            } else {
                return 'Utilisateur incorrect';
            }
        }
        $home = new HomeController();
        if ($home->userConnected()) {
            header('Location: ' . $_SERVER['REQUEST_URI'] . 'home');
        }
    }
}
