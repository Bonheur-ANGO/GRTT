<?php

namespace App\Models\Managers;

use App\Models\Main\Connexion;

class ComplaintManager{

    private $_bdd;

    public function __construct()
    {
        $this->_bdd = Connexion::getConnexionPDO();
    }
    
    public function sendComplaint(){
        $bdd = $this->_bdd;
        $result = $this->verifyComplaint();
        if ($result == true) {
            return 'Vous avez déjà une réclamation en cours, vous devez attendre que la réclamation soit traitée';
        } else {
            if (isset($_SESSION['id_user'], $_REQUEST['username'], $_REQUEST['mail'], $_REQUEST['customer_type'], $_REQUEST['complaint_type'], $_REQUEST['contact_concerned'], $_REQUEST['number_concerned'], $_REQUEST['message']) && !empty($_REQUEST['message'])) {
                $query = $bdd->prepare('INSERT INTO complaint(user_has_complaint,mail,message,type,id_customer,customer_type,contact_concerned,number_concerned,date_complaint) VALUES (?,?,?,?,?,?,?,?,NOW())');
                $query->execute([$_REQUEST['username'], $_REQUEST['mail'], $_REQUEST['message'], $_REQUEST['complaint_type'], $_SESSION['id_user'], $_REQUEST['customer_type'], $_REQUEST['contact_concerned'], $_REQUEST['number_concerned']]);
                if ($query) {
                    return 'Votre réclamation a bien été envoyée';
                } else {
                    return 'false';
                }
            }
        }
    }

    public function verifyComplaint(){
        $bdd = $this->_bdd;
        $search = $bdd->prepare('SELECT * FROM complaint WHERE id_customer=:id AND state = 1');
        $search->execute([
            ':id' => $_SESSION['id_user']
        ]);
        $result = $search->fetch();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllComplaints(){
        $bdd = $this->_bdd;
        $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer ORDER BY date_complaint desc');
        return $query->fetchAll();
    }

    public function getAllComplaintsStateOne()
    {
        $bdd = $this->_bdd;
        $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE state = 1 ORDER BY date_complaint desc');
        return $query->fetchAll();
    }

    public function getAllComplaintsStateTwo()
    {
        $bdd = $this->_bdd;
        $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE state = 2 ORDER BY date_complaint desc');
        return $query->fetchAll();
    }


    public function getOneComplaint(){
        $bdd = $this->_bdd;
        if (isset($_GET['id'])) {
            $query = $bdd->prepare('SELECT *, complaint_type.idtype FROM complaint INNER JOIN complaint_type ON complaint_type.idtype=complaint.type WHERE id_complaint = :id');
            $query->execute([
                ':id' => $_GET['id']
            ]);
            return $query->fetch();
        }
    }

    public function processedComplaint($id){
        $bdd = $this->_bdd;
        $complaint = $this->getOneComplaint();
        if (isset($_REQUEST['message_personalised'])) {
            $query = $bdd->prepare('UPDATE complaint SET state = 2 where id_complaint =' . $id);
            return $query->execute();
        } elseif (isset($_REQUEST['state_processed'])) {
            $query = $bdd->prepare('UPDATE complaint SET state = 2 where id_complaint =' . $id);
            return $query->execute();
        }
        $mesage = "Votre réclamation a été traitée veuillez vérifiez sur la plateforme";
    }

    public function AllComplaintSend(){
        $bdd = $this->_bdd;
        $query = $bdd->prepare('SELECT COUNT(id_complaint) FROM complaint WHERE id_customer= :id');
        $query->execute([
            ':id' => $_SESSION['id_user']
        ]);
        $result = $query->fetchAll();
        return $result[0]['COUNT(id_complaint)'];
    }

    public function displayAllComplaintSendOfUser(){
        $bdd = $this->_bdd;
        $query = $bdd->prepare('SELECT * FROM complaint WHERE id_customer =:id ORDER BY date_complaint desc');
        $query->execute([
            ':id' => $_SESSION['id_user']
        ]);
        return $query->fetchAll();
    }

    public function getAllComplaintsStateOneOfUser()
    {
        $bdd = $this->_bdd;
        $query = $bdd->prepare('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE state = 1 AND id_customer=:id ORDER BY date_complaint desc');
        $query->execute([
            ':id' => $_SESSION['id_user']
        ]);
        return $query->fetchAll();
    }

    public function getAllComplaintsStateTwoOfUser()
    {
        $bdd = $this->_bdd;
        $query = $bdd->prepare('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE state = 2 AND id_customer=:id ORDER BY date_complaint asc');
        $query->execute([
            ':id' => $_SESSION['id_user']
        ]);
        return $query->fetchAll();
    }

    public function getAllComplaintsByType1(){
        $bdd = $this->_bdd;
        if (isset($_REQUEST['type_1'])) {
            $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE type=1 ORDER BY date_complaint desc');
            return $query->fetchAll();
        }
    }

    public function getAllComplaintsByType2()
    {
        $bdd = $this->_bdd;
        if (isset($_REQUEST['type_2'])) {
            $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE type=2 ORDER BY date_complaint desc');
            return $query->fetchAll();
        }
    }

    public function getAllComplaintsByType3()
    {
        $bdd = $this->_bdd;
        if (isset($_REQUEST['type_3'])) {
            $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE type=3 ORDER BY date_complaint desc');
            return $query->fetchAll();
        }
    }

    public function getAllComplaintsByType4()
    {
        $bdd = $this->_bdd;
        if (isset($_REQUEST['type_4'])) {
            $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE type=4 ORDER BY date_complaint desc');
            return $query->fetchAll();
        }
    }

    public function getAllComplaintsInProgressByType1()
    {
        $bdd = $this->_bdd;
        if (isset($_REQUEST['progress_type_1'])) {
            $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE type=1 AND state=1 ORDER BY date_complaint desc');
            return $query->fetchAll();
        }
    }

    public function getAllComplaintsInProgressByType2()
    {
        $bdd = $this->_bdd;
        if (isset($_REQUEST['progress_type_2'])) {
            $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE type=2 AND state=1 ORDER BY date_complaint desc');
            return $query->fetchAll();
        }
    }

    public function getAllComplaintsInProgressByType3()
    {
        $bdd = $this->_bdd;
        if (isset($_REQUEST['progress_type_3'])) {
            $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE type=3 AND state=1 ORDER BY date_complaint desc');
            return $query->fetchAll();
        }
    }

    public function getAllComplaintsInProgressByType4()
    {
        $bdd = $this->_bdd;
        if (isset($_REQUEST['progress_type_4'])) {
            $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE type=4 AND state=1 ORDER BY date_complaint desc');
            return $query->fetchAll();
        }
    }

    public function getAllComplaintsProcessedByType1()
    {
        $bdd = $this->_bdd;
        if (isset($_REQUEST['processed_type_1'])) {
            $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE type=1 AND state=2 ORDER BY date_complaint desc');
            return $query->fetchAll();
        }
    }

    public function getAllComplaintsProcessedByType2()
    {
        $bdd = $this->_bdd;
        if (isset($_REQUEST['processed_type_2'])) {
            $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE type=2 AND state=2 ORDER BY date_complaint desc');
            return $query->fetchAll();
        }
    }

    public function getAllComplaintsProcessedByType3()
    {
        $bdd = $this->_bdd;
        if (isset($_REQUEST['processed_type_3'])) {
            $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE type=3 AND state=2 ORDER BY date_complaint desc');
            return $query->fetchAll();
        }
    }

    public function getAllComplaintsProcessedByType4()
    {
        $bdd = $this->_bdd;
        if (isset($_REQUEST['processed_type_4'])) {
            $query = $bdd->query('SELECT *, customer.id FROM complaint INNER JOIN customer ON customer.id=complaint.id_customer WHERE type=4 AND state=2 ORDER BY date_complaint desc');
            return $query->fetchAll();
        }
    }
}