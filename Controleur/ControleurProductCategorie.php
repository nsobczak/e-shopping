<?php

/**
 * User: Magaly & Cuize
 * Date: 04/11/2016
 */
//________________________________________________________________________________________
// Require once
require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';


class ControleurProductCategorie implements Controleur
{
    /**
     * @var Produit
     */
    private $produit;


    //______________________________________________________________________________________
    /**
     * ControleurProductCategorie constructor.
     */
    public function __construct()
    {
        //$this->user = new UserProfile();
    }

    //TODO: getters et setters


    //______________________________________________________________________________________
    /**
     * Affiche la page d'accueil
     */
    public function getHTML()
    {
        $vue = new Vue("Produit");
        $vue->generer(array());
    }
}