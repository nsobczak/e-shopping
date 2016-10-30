<?php

/**
 * Created by PhpStorm.
 * User: Nicolas Sobczak & Vincent Reynaert
 * Date: 30/10/2016
 */
//________________________________________________________________________________________
// Require once
require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';

class ControleurErreur implements Controleur
{
    public function __construct()
    {

    }

    // Affiche la page d'erreur
    public function getHTML()
    {
        $vue = new Vue("Erreur");
        $vue->generer(array());
    }
}