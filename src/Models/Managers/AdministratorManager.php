<?php

namespace App\Models\Managers;

use PDO;
use App\Models\Main\Connexion;

class AdministratorManager{

    private $_bdd;

    public function __construct()
    {
        $this->_bdd = Connexion::getConnexionPDO();
    }

    public function getAdmin(){
        $bdd = $this->_bdd;

        if (isset($_REQUEST['admin'], $_REQUEST['password'])) {
            $query = $bdd->prepare('SELECT * FROM administrator WHERE administrator_name = :admin and password = :password');
            $query->execute([
                ":admin" => $_REQUEST['admin'],
                ':password' => $_REQUEST['password']
            ]);
            return $user = $query->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function getAllAdmin(){
        $bdd = $this->_bdd;
        $query = $bdd->query('SELECT * FROM administrator WHERE role=2');
        return $query->fetchAll();
    }

    public function addAdmin(){
        $bdd = $this->_bdd;
        if (isset($_REQUEST['add_administrator_name'], $_REQUEST['cp'], $_REQUEST['add_administrator_password'])) {
            if ($_REQUEST['cp'] == $_REQUEST['add_administrator_password'] ) {
                $req = $bdd->prepare('SELECT * FROM administrator WHERE administrator_name = :admin');
                $req->execute([
                    ':admin' => $_REQUEST['add_administrator_name']
                ]);
                $admin = $req->fetch();
                if (!empty($admin['administrator_name'])) {
                    return 'Veuillez changer de nom svp';
                } else {
                    $query = $bdd->prepare('INSERT INTO administrator(administrator_name, password) VALUES(?,?)');
                    $query->execute([$_REQUEST['add_administrator_name'], $_REQUEST['add_administrator_password']]);
                    if ($query) {
                        return 'Administrateur enregistré avec success';
                    } else {
                        return false;
                    }
                }
            } else {
                return "les mots de passes ne correspondent pas";
            }
            
        }
    }

    public function deleteAdmin(){
        $bdd = $this->_bdd;
        if (isset($_REQUEST['delete_admin'])) {
            $query = $bdd->prepare('DELETE FROM administrator WHERE id =' . $_REQUEST['delete_admin']);
            $query->execute();
            if ($query) {
                return 'Administrateur supprimé avec success';
            } else {
                return false;
            }
        }
    }

    public function changePassword(){
        $bdd = $this->_bdd;
        if (isset($_REQUEST['old_password'], $_REQUEST['confirmation'], $_REQUEST['new_password'])) {
            $select = $bdd->prepare('SELECT * FROM administrator WHERE id =:id');
            $select->execute([
                ':id' => $_SESSION['id']
            ]);

            $admin = $select->fetch();

            if ($_REQUEST['new_password'] == $_REQUEST['confirmation'] ) {
                if ($_REQUEST['old_password'] == $admin['password']) {
                    if ($_REQUEST['new_password'] == $admin['password']) {
                        return "Le nouveau mot de passe doit être différent de l'ancien";
                    } else {
                        $query = $bdd->prepare("UPDATE administrator SET password ='" . $_REQUEST['new_password'] . "' WHERE id =" . $_SESSION['id']);
                        $query->execute();
                        if ($query) {
                            return 'Mot de passe changé avec succès';
                        } else {
                            return false;
                        }
                    }
                } else {
                    "Mot de passe actuel incorrect";
                }
            } else {
                return "Les mots de passe ne correspondent pas";
            }
        }
    }
}