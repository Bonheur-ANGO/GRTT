<?php

namespace App\Controllers;

use App\View;

class ChatbotController{

    public function index(){
        if (HomeController::userConnected()) {
            return View::render("chatbot", "chatbot", "Chatbot");
        } else {
            header('Location: ' . '/GRTT/public');
        }
    }
}