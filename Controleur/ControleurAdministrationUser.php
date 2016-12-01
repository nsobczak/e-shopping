<?php

/**
 * Created by PhpStorm.
 * User: Romain Vanmarcke & Vivien Valencourt
 * Date: 04/11/2016
 */
//________________________________________________________________________________________
// Require once
require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';
require_once 'Modele/AdministrationUser.php';

class ControleurAdministrationUser implements Controleur
{

    /**
     * @var
     */
    private $user;


    //______________________________________________________________________________________
    /**
     * ControleurAdministrationUser constructor.
     */
    public function __construct()
    {
        $this->user = new AdministrationUser();
    }

    /**
     * Getter de $user
     *
     * @return AdministrationUser
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Setter de $user
     *
     * @param $newUser
     */
    public function setUser($newUser)
    {
        $this->user = $newUser;
    }


    //______________________________________________________________________________________
    /**
     * Fonction qui appelle toutes les ahutres fonctions
     *
     * @param $userID
     */
    public function handlerAdministrationUser()
    {
        if (isset($_SESSION['userID']) && $_SESSION['niveau_accreditation'] == 1) {
            $this->deleteUser();    // fonction appelée pour supprimer un utilisateur
            $this->changeAccre();   // fonction appelée pour changer le niveau d'accréditation d'un utilisateur
            $this->getHTML();       // fonction appelée pour générer le code HTML de la page
        } else {
            header('Location: index.php?action=login');
            die();
        }
    }


    /**
     * Fonction qui affiche un utilisateur
     *
     * @param $userID
     * @return array
     */
    public function displayUser($userID)
    {
        $user = new AdministrationUser();
        $result = $user->getUser($userID);
        return $result;
    }


    /**
     * Affiche la page d'admin user
     */
    public function getHTML()
    {
        $vue = new Vue("AdministrationUser");
        $listUsers = $this->user->getUserList();
        $vue->generer(array('listUsers' => $listUsers));

    }


    /**
     * Fonction qui exécute la requête de suppression d'utilisateur de la base de données
     *
     */
    public function deleteUser()
    {
        if (isset($_GET['do']) && (isset($_GET['userID']))) {
            if ($_GET['do'] == "deleteUser") {
                if ($_SESSION['userID'] != $_GET['userID']) {
                    $this->user->deleteUser($_GET["userID"]);
                } else {
                    throw new Exception("Impossible de supprimer le compte sur lequel vous êtes connecté actuellement");
                }
            }
        }
    }


    /**
     * Fonction qui exécute la requête de changement d'accreditation d'un utilisateur, dans la base de
     *
     * @param $userID
     */
    public function changeAccre()
    {
        if (isset($_GET['do']) && (isset($_GET['userID'])) && (isset($_GET['accLevel']))) {
            if ($_GET['do'] == "changeAcc") {
                // if ('<script type="text/javascript" language="javascript"> confirm("Vous désirez vraiment quitter?")</script>') {
                $this->user->updateUserStatus($_GET["userID"], $_GET["accLevel"]);
                // }
            }
        }
    }


}


?>

<script type="text/javascript">
    /**
     * Fonction qui permet de générer l'URL voulue pour le changement d'accreditation
     *
     * @param $userID
     */
    function changeAccreditation(value, id) {
        window.location = "?action=adminUser&do=changeAcc&userID=" + id + "&accLevel=" + value;
    }
</script>