<?php

/**
 * Created by PhpStorm.
 * User: Nicolas Sobczak & Vincent Reynaert
 * Date: 02/11/2016
 */
//________________________________________________________________________________________
// Require once
require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';
require_once 'Modele/UserProfile.php';

class ControleurUserProfile implements Controleur
{
    private $user;

    public function __construct()
    {
        $this->user = new UserProfile();
    }

    // Affiche la page d'accueil
    public function getHTML()
    {
        $vue = new Vue("UserProfile");
        $vue->generer(array());
    }
}