<?php

namespace App\Models\Managers;

use PDO;
use App\Models\User;
use App\Models\Main\Connexion;

class UserManager
{
    private $_bdd;

    public function __construct()
    {
        $this->_bdd = Connexion::getConnexionPDO();
    }

    public function getUser(){
        $bdd = $this->_bdd;
        if (isset($_REQUEST['username'], $_REQUEST['password'])) {
            $query = $bdd->prepare('SELECT * FROM customer WHERE username = :username');
            $query->execute([
                ":username" => $_REQUEST['username']
            ]);
            return $user = $query->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function insertUser(){
        $bdd = $this->_bdd;
        if ($_REQUEST['password'] == $_REQUEST['confirm_password']) {
            $user = $this->getUser();
            if (empty($user)) {
                $query = $bdd->prepare('INSERT INTO customer(username, mail, password, city) VALUES(?,?,?,?)');
                $query->execute([$_REQUEST['username'], $_REQUEST['mail'], password_hash($_REQUEST['password'], PASSWORD_DEFAULT), $_REQUEST['city']]);
                if ($query) {
                    return 'Utilisateur enregistré avec success';
                } else {
                    return false;
                }
            } else {
                return "Cet utilisateur existe déjà";
            }
        } else {
            return 'Les mots de passe ne correspondent pas';
        }
    }

    public function changePassword(){
        $bdd = $this->_bdd;
        if (isset($_REQUEST['old_password'], $_REQUEST['confirmation'], $_REQUEST['new_password'])) {
                $select = $bdd->prepare('SELECT * FROM customer WHERE id =:id');
                $select->execute([
                    ':id' => $_SESSION['id_user']
                ]);
                
                $user = $select->fetch();
            if ($_REQUEST['new_password'] == $_REQUEST['confirmation']) {
                if (password_verify($_REQUEST['old_password'],$user['password'])) {
                    if (password_verify($_REQUEST['new_password'], $user['password'])) {
                        return "Le nouveau mot de passe doit être différent de l'ancien";
                    } else {
                        $password = password_hash($_REQUEST['new_password'], PASSWORD_DEFAULT);
                        $query = $bdd->prepare("UPDATE customer SET password ='" . $password . "' WHERE id =" . $_SESSION['id_user']);
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


    public function changePasswordForget()
    {
        $bdd = $this->_bdd;
        if (isset($_REQUEST['name'], $_REQUEST['confirmation'], $_REQUEST['new_password'])) {
            $select = $bdd->prepare('SELECT * FROM customer WHERE username =:name');
            $select->execute([
                ':name' => $_REQUEST['name']
            ]);

            $user = $select->fetch();
            if ($_REQUEST['new_password'] == $_REQUEST['confirmation']) {
                    $password = password_hash($_REQUEST['new_password'], PASSWORD_DEFAULT);
                    $query = $bdd->prepare("UPDATE customer SET password ='" . $password . "' WHERE username ='" . $_REQUEST['name'] . "'");
                    $query->execute();
                    if ($query) {
                        return 'Mot de passe changé avec succès';
                    } else {
                        return false;
                    }
                }else {
                return "Les mots de passe ne correspondent pas";
            }
        }
    }
}