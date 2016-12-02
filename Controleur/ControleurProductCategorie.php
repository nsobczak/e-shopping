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

    /**
     * Getter du produit
     *
     * @return Produit
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Getter du produit
     *
     * @param $newProduct
     */
    public function setProduit($newProduct)
    {
        $this->produit = $newProduct;
    }


    //______________________________________________________________________________________
    /**
     * Affiche la page d'accueil
     */
    public function getHTML()
    {
        if (isset($_GET['idCategorie'])) { // veut voir la liste des produits dans une catégorie
            $vue = new Vue("ProduitList");
            $vue->generer(array("ProduitList" => $this->produit->getAllProduitsByCategorieId($_GET['idCategorie'])));
        } else if (isset($_GET['id']) && !isset($_GET["do"])) {   // veut voir un produit en particulier
            // On a un item !
            $vue = new Vue("Produit");
            $vue->generer(array(
                "add_panier" => false,
                "produit" => $this->getProduit()->getProduit($_GET['id'])));
        } else if (isset($_GET['do']) && isset($_GET['id'])) { // ajout d'un produit au panier
            if (!isset($_SESSION['userID'])) // il faut être connecté
                return;
            if ($_GET['do'] == "addPanier") {
                $vue = new Vue("Produit");
                $vue->generer(array(
                    "add_panier" => $this->addProduitToPanier($_GET['id']),
                    "produit" => $this->getProduit()->getProduit($_GET['id']),
                ));
            }
        } else {
            // Erreur
        }
    }


    /**
     * La fonction qui va s'occuper du panier et toutes les vérifications annexes
     *
     * @param $produitID Id du produit
     */
    public function addProduitToPanier($produitID)
    {
        // Connecté ?
        if (!isset($_SESSION['userID'])) {
            //redirection vers page de login
            echo "Veuillez vous connecter";
            header('Location: index.php?action=login');
            return;
        }
        // Est-ce que l'utilisateur a un panier
        $panier = $this->produit->getPanierForUser($_SESSION['userID']);
        if ($panier == null) {
            // insert new panier (soit aucun panier, soit tous sont achetés
            $this->produit->createNewPanier($_SESSION['userID']);
            $panier = $this->produit->getPanierForUser($_SESSION['userID']);
        }
        $ligne_panier = $this->produit->getLignePanier($panier['panierID'], $produitID);
        if ($ligne_panier == null) // pas trouvé de ligne panier pour ce produit
            $ligne_panier = $this->produit->createNewLignePanier($panier['panierID'], $produitID);
        else
            $this->produit->increaseQuantityPanier($ligne_panier['lignePanierID']);

        return true;
    }

}