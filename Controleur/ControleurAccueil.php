<?php

/**
 * Created by PhpStorm.
 * User: Nicolas Sobczak & Vincent Reynaert
 * Date: 21/10/2016
 */
//________________________________________________________________________________________
// Require once
require_once (dirname(__FILE__).'/Controleur.php');
require_once (dirname(__FILE__).'/Vue.php');

class ControleurAccueil implements Controleur
{
    public function __construct()
    {

    }

    // Affiche la page d'accueil
    public function getHTML()
    {
        $vue = new Vue("Accueil");
        $vue->generer(array());
    }
}