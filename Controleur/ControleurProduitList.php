<?php
//create by : Guillaume vandierdonck & Qi You

//________________________________________________________________________________________
// Require once
require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';
require_once 'Modele/Produit.php';

class ControleurProduitList implements Controleur
{
    /**
     * @var Produit
     */
    private $produit;


    //______________________________________________________________________________________
    /**
     * ControleurProduitList constructor.
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
        $vue = new Vue("ProduitList");
        //$produitID = $this->selectHTML();
        $vue->generer(array('ProduitList' => $this->produit->getAllProduit()));
    }


}
