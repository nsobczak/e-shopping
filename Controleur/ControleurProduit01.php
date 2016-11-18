<?php

/**
 * User: Magaly & Cuize
 * Date: 04/11/2016
 */
//________________________________________________________________________________________
// Require once
require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';


class ControleurProduit01 implements Controleur
{
    /**
     * @var
     */
    private $produit;


    //______________________________________________________________________________________
    /**
     * ControleurProduit01 constructor.
     */
    public function __construct()
    {
        //$this->user = new UserProfile();
    }

    
    /**
     * Affiche la page produit
     */
    public function getHTML()
    {
        $vue = new Vue("Produit");
        $vue->generer(array());
    }
}