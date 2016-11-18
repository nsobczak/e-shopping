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
        $user = new AdministrationUser();
    }

    /**
     * Affiche la page d'admin user
     */
    public function getHTML()
    {
        $vue = new Vue("AdministrationUser");
        // $vue->generer(array());
        $vue->generer($this->displayUser(1));
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
}


?>