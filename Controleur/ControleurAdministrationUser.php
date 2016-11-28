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

    public function handlerAdministrationUser()
    {
        $this->deleteUser();
        $this->changeAccre();
        $this->getHTML();
    }

    /**
     * Fonction qui...
     *
     * @param $userID
     * @return array
     */
    public function displayUser($userID)
    {
        $user = new AdministrationUser();
        $result = $user->getUser($userID);
        // print_r($result);

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

    public function deleteUser()
    {
        if (isset($_GET['do']) && (isset($_GET['userID']))) {
            if ($_GET['do'] == "deleteUser") {
                // if ('<script type="text/javascript" language="javascript"> confirm("Vous désirez vraiment quitter?")</script>') {
                $this->user->deleteUser($_GET["userID"]);
                // }
            }
        }
    }

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
    function changeAccreditation(value, id) {
        window.location = "?action=AdministrationUser&do=changeAcc&userID=" + id + "&accLevel=" + value;
    }
</script>