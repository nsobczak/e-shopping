<?php

/**
 * Created by PhpStorm.
 * User:
 * Date: 05/11/2016
 */

require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';
require_once 'Modele/AdministrationProduit.php';

class ControleurAdministrationProduit implements Controleur
{
    //Attributs
    /**
     * @var
     */

    /**
     * @var int
     */
    private $produit_code;
    private $sous_categorie;
    private $categorie;
    private $newSousCategorieID;
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


    /**
     * Fonction qui...
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

    public function delProduit()
    {
        if (!empty($_POST['nomProduit'])) {

            $this->produit_code = $this->produit->deleteProduit($_POST['nomProduit']);

        }
    }

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

    public function getSCategorie()
    {

        $this->sous_categorie = $this->produit->getSousCategorie();

    }

    public function getCateg()
    {

        $this->categorie = $this->produit->getCategorie();

    }

    /**
     * Fonction qui...
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