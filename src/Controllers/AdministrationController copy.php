<?php

namespace App\Controllers;

use App\Models\Managers\ComplaintManager;
use App\View;

class AdministrationController{

    public function index(){
        if ($this->adminConnected()) {
            $this->adminDisconnected();
            $data = new ComplaintManager();
            if (isset($_REQUEST['in_progress'])) {
                if (isset($_REQUEST['progress_type_1'])) {
                    $complaints = $data->getAllComplaintsInProgressByType1();
                } elseif (isset($_REQUEST['progress_type_2'])) {
                    $complaints = $data->getAllComplaintsInProgressByType2();
                } elseif (isset($_REQUEST['progress_type_3'])) {
                    $complaints = $data->getAllComplaintsInProgressByType3();
                } elseif (isset($_REQUEST['progress_type_4'])) {
                    $complaints = $data->getAllComplaintsInProgressByType4();
                } else {
                    $complaints = $data->getAllComplaintsStateOne();
                }
                return View::render("progress", "complaint", "progress", compact('complaints'));
            } elseif (isset($_REQUEST['processed'])) {
                if (isset($_REQUEST['type_1'])) {
                    $complaints = $data->getAllComplaintsProcessedByType1();
                } elseif (isset($_REQUEST['type_2'])) {
                    $complaints = $data->getAllComplaintsProcessedByType2();
                } elseif (isset($_REQUEST['type_3'])) {
                    $complaints = $data->getAllComplaintsProcessedByType3();
                } elseif (isset($_REQUEST['type_4'])) {
                    $complaints = $data->getAllComplaintsProcessedByType4();
                } else {
                    $complaints = $data->getAllComplaintsStateTwo();
                }
                return View::render("processed", "complaint", "processed", compact('complaints'));
            } else {
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
            }
        } else {
            header('Location: admin');
        }
    }

/*if (isset($_REQUEST['in_progress'])) {
    if (isset($_REQUEST['type_1'])) {
        $complaints = $data->getAllComplaintsInProgressByType1();
    } elseif (isset($_REQUEST['type_2'])) {
        $complaints = $data->getAllComplaintsInProgressByType2();
    } elseif (isset($_REQUEST['type_3'])) {
        $complaints = $data->getAllComplaintsInProgressByType3();
    } elseif (isset($_REQUEST['type_4'])) {
        $complaints = $data->getAllComplaintsInProgressByType4();
    } else {
        $complaints = $data->getAllComplaintsStateOne();
    }
} elseif (isset($_REQUEST['processed'])) {
    if (isset($_REQUEST['type_1'])) {
        $complaints = $data->getAllComplaintsProcessedByType1();
    } elseif (isset($_REQUEST['type_2'])) {
        $complaints = $data->getAllComplaintsProcessedByType2();
    } elseif (isset($_REQUEST['type_3'])) {
        $complaints = $data->getAllComplaintsProcessedByType3();
    } elseif (isset($_REQUEST['type_4'])) {
        $complaints = $data->getAllComplaintsProcessedByType4();
    } else {
        $complaints = $data->getAllComplaintsStateTwo();
    }
} else {
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
}*/

    public static function adminConnected()
    {
        if (session_status() == 1) {
            session_start();
        }
        return !empty($_SESSION['id']);
    }

    public function adminDisconnected(){
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