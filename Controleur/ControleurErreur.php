<?php

/**
 * Created by PhpStorm.
 * User: Nicolas Sobczak & Vincent Reynaert
 * Date: 30/10/2016
 */
//________________________________________________________________________________________
// Require once
require_once('Controleur/Controleur.php');
require_once('Vue/Vue.php');

class ControleurErreur implements Controleur
{
    //______________________________________________________________________________________
    /**
     * ControleurErreur constructor.
     */
    public function __construct()
    {

    }

    //______________________________________________________________________________________
    /**
     * Affiche la page d'erreur
     */
    public function getHTML()
    {
        $vue = new Vue("Erreur");
        $vue->generer(array());
    }
}