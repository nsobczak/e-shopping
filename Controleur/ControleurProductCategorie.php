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
        $this->produit = new Produit();
    }

    //TODO: getters et setters



    //______________________________________________________________________________________
    /**
     * Affiche la page d'accueil
     */
    public function getHTML()
    {
        if(isset($_GET['idCategorie'])) {
            $vue = new Vue("ProduitList");
            $vue->generer(array("ProduitList" => $this->produit->getAllProduitsByCategorieId($_GET['idCategorie'])));
        }
        else if(isset($_GET['id'])) {
            // On a un item !
            $vue = new Vue("Produit");
            $vue->generer(array());
        }
        else {
            // Erreur
        }
    }
}