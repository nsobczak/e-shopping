<?php
//create by : Guillaume vandierdonck & Qi You

//________________________________________________________________________________________
// Require once
require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';
require_once 'Modele/Produit.php';

class ControleurProduitList implements Controleur
{
    private $produit;

    public function __construct()
    {
        $this->produit = new Produit();
    }


    // Affiche la page d'accueil
    public function getHTML()
    {
        $vue = new Vue("ProduitList");
        //$produitID = $this->selectHTML();
        $vue->generer(array('ProduitList' => $this->produit->getAllProduit()));
    }

    /*
            if ($produitID >= 0) {
                //$produit = $this->displayProduit($produitID);
                //$vue->generer($produit);


                $vue->generer(array(
                'ProduitList' => $this->Produit->getProduit(),
            } // sinon redirection vers la page de login
            else {
                header('Location: index.php?action=login');
                die();
            }
    */

}
