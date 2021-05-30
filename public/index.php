<?php

use App\Controllers\HomeController;
use App\Controllers\AdminController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\ParametersController;
use App\Controllers\SendComplaintController;
use App\Controllers\AdministrationController;
use App\Controllers\ParametersUserController;
use App\Controllers\AllComplaintSendController;
use App\Controllers\ChatbotController;
use App\Controllers\ComplaintInProgressController;
use App\Controllers\ComplaintProcessedController;
use App\Controllers\DisplayComplaintToAdminController;
use App\Controllers\DisplayComplaintToUserController;
use App\Controllers\PasswordForgetController;

require '../vendor/autoload.php';
$url = explode("/", $_GET['url']);
if (isset($url[0])) {
    switch ($url[0]) {
        case $url[0] == " ":
            $login = new LoginController();
            $login->index();
            break;

        case $url[0] == "home":
            if (isset($url[1])) {
                switch ($url[1]) {
                    case $url[1] == 'sendComplaint':
                        $complaint = new SendComplaintController();
                        $complaint->index();
                        break;

                    case $url[1] == 'parameters':
                        $parametersUser = new ParametersUserController();
                        $parametersUser->index();
                        break;

                    case $url[1] == 'chatbot':
                        $chatbot = new ChatbotController();
                        $chatbot->index();
                        break;

                    case $url[1] == 'allComplaints':
                        if (isset($url[2])) {
                            switch ($url[2]) {
                                case 'complaint':
                                   $displayTo = new DisplayComplaintToUserController();
                                   $displayTo->index();
                                break;
                                
                                default:
                                    echo 'page introuvable';
                                break;
                            }
                        } else{
                            $send = new AllComplaintSendController();
                            $send->index();
                        }

                        break;

                    default:
                        $userHome = new HomeController();
                        $userHome->index();
                        break;
                }
            } else {
                $userHome = new HomeController();
                $userHome->index();
            }
            break;

        case $url[0] == "register":
            $register = new RegisterController();
            $register->index();
            break;

        case $url[0] == "change_password":
            $change = new PasswordForgetController();
            $change->index();
            break;

        case $url[0] == 'admin':
            $loginAdmin = new AdminController();
            $loginAdmin->index();
            break;

        case 'administration':
            if (isset($url[1])) {
                switch ($url[1]) {
                    case $url[1] == 'complaint':
                        $displayComplaint = new DisplayComplaintToAdminController();
                        $displayComplaint->index();
                        break;

                    case $url[1] == 'parameters':
                        $parameters = new ParametersController();
                        $parameters->index();
                        break;

                    case $url[1] == 'complaints_in_progress':
                        $progress = new ComplaintInProgressController();
                        $progress->index();
                        break;

                    case $url[1] == 'complaints_processed':
                        $processed = new ComplaintProcessedController();
                        $processed->index();
                        break;

                    default:
                        echo "page introuvable";
                        break;
                }
            } else {
                $administration = new AdministrationController();
                $administration->index();
            }
        break;
        
        default:
           http_response_code(404);
           echo "Page introuvable";
        break;
    }
}

//var_dump($_SERVER);