<?php

/**
 * Created by PhpStorm.
 * User: Nicolas Sobczak & Vincent Reynaert
 * Date: 21/10/2016
 */
//________________________________________________________________________________________
// Require once
require_once 'Controleur/Controleur.php';

class ControleurAccueil implements Controleur
{
    public function __construct()
    {

    }

    // Affiche la liste de tous les billets du blog
    public function getHTML()
    {
        $vue = new Vue("Accueil");
        $vue = generer(array());
    }
}