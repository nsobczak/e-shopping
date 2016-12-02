<?php

/**
 * Created by PhpStorm.
 * User: Julien Vermeil & Pierre Trouche
 * Date: 05/11/2016
 */

require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';
require_once 'Modele/AdministrationProduit.php';

class ControleurAdministrationProduit implements Controleur
{
    //Attributs
    /**
     * @var int $produit_code
     */
    private $produit_code;
    /**
     * @var $sous_categorie
     */
    private $sous_categorie;
    /**
     * @var $categorie
     */
    private $categorie;
    /**
     * @var $newSousCategorieID
     */
    private $newSousCategorieID;
    /**
     * @var $newCategorieID
     */
    private $newCategorieID;

    //______________________________________________________________________________________
    /**
     * ControleurAdministrationProduit constructor.
     */
    public function __construct()
    {
        $this->produit_code = 0;
        //$this->add_produit = new AdministrationProduit();
        //$this->del_produit = new AdministrationProduit();
        $this->produit = new AdministrationProduit();
    }

    //TODO: getters et setters


    //______________________________________________________________________________________
    /**
     * Fonction qui ajoute un produit
     */
    public function addProduit()
    {
        if (!empty($_POST['nomProduit']) AND is_numeric($_POST['prix']) AND !empty($_POST['description_produit']) AND !empty($_POST['cheminimage'])) {

            if (empty($_POST['newSousCategorie'])) {
                $this->produit_code = $this->produit->insertProduit($_POST['nomProduit'], $_POST['prix'], $_POST['description_produit'], $_POST['cheminimage'], $_POST['idSousCategorie']);
            } elseif (!empty($_POST['newSousCategorie']) AND !empty($_POST['descriptionSousCategorie'])) {

                if (empty($_POST['newCategorie'])) {

                    $this->newSousCategorieID = $this->produit->insertNewSousCategorie($_POST['newSousCategorie'], $_POST['descriptionSousCategorie'], $_POST['idCategorie']);
                    $this->produit_code = $this->produit->insertProduit($_POST['nomProduit'], $_POST['prix'], $_POST['description_produit'], $_POST['cheminimage'], $this->newSousCategorieID);
                } elseif (!empty($_POST['newCategorie']) AND !empty($_POST['descriptionCategorie'])) {

                    $this->newCategorieID = $this->produit->insertNewCategorie($_POST['newCategorie'], $_POST['descriptionCategorie']);
                    $this->newSousCategorieID = $this->produit->insertNewSousCategorie($_POST['newSousCategorie'], $_POST['descriptionSousCategorie'], $this->newCategorieID);
                    $this->produit_code = $this->produit->insertProduit($_POST['nomProduit'], $_POST['prix'], $_POST['description_produit'], $_POST['cheminimage'], $this->newSousCategorieID);

                } else {
                    $this->produit_code = 2;
                }
            }
        } else {
            $this->produit_code = 2;
        }
    }


    /**
     * Fonction qui supprime un produit
     */
    public function delProduit()
    {
        if (!empty($_POST['nomProduit'])) {

            $this->produit_code = $this->produit->deleteProduit($_POST['nomProduit']);

        }
    }


    /**
     * Fonction qui modifie un produit
     */
    public function modProduit()
    {
        if (!empty($_POST['nomProduit']) and (!empty($_POST['newNomProduit']) or !empty($_POST['prix']) or !empty($_POST['description_produit']) or !empty($_POST['cheminimage']))) {

            if (!empty($_POST['newNomProduit'])) {

                $this->produit_code = $this->produit->modifyProduit($_POST['nomProduit'], $_POST['prix'], $_POST['description_produit'], $_POST['cheminimage'], $_POST['newNomProduit']);
            } else {
                $this->produit_code = $this->produit->modifyProduit($_POST['nomProduit'], $_POST['prix'], $_POST['description_produit'], $_POST['cheminimage']);
            }

        } else
            $this->produit_code = 2;
    }


    /**
     * Fonction qui récupère une sous-catégorie d'un produit et initialise $this->sous_categorie avec
     */
    public function getSCategorie()
    {
        $this->sous_categorie = $this->produit->getSousCategorie();
    }


    /**
     * Fonction qui récupère une catégorie d'un produit et initialise $this->categorie avec
     */
    public function getCateg()
    {
        $this->categorie = $this->produit->getCategorie();

    }


    /**
     * Fonction qui affiche la vue
     */
    public function getHTML()
    {

        $vue = new Vue("AdministrationProduit");
        $this->getSCategorie();
        $this->getCateg();
        if (!empty($_POST['product_choice'])) {

            if ($_POST['product_choice'] == "delete") {
                $this->delProduit();
            } elseif ($_POST['product_choice'] == "add") {
                $this->addProduit();
            } elseif ($_POST['product_choice'] == "modify") {
                $this->modProduit();
            }
        }

        $vue->generer(array('produit_code' => $this->produit_code, 'sous_categorie' => $this->sous_categorie, 'categorie' => $this->categorie));

    }

}