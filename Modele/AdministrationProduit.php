<?php

require_once('Modele.php');

/**
 * Created by PhpStorm.
 * User: Julien Vermeil & Pierre Trouche
 * Date: 05/11/2016
 */
class AdministrationProduit extends Modele
{
    //Constantes
    const PRODUCT_ALREADY_EXIST = 1;
    const ERROR_FORM = 2;
    const ADD_OK = 3;
    const DOES_NOT_EXIST = 4;
    const DEL_OK = 5;
    const MODIFY_OK = 6;

    //______________________________________________________________________________________
    /**
     * Fonction qui vérifie si un existe ou pas
     *
     * @param $name
     * @return bool
     */
    public function produitExists($name)
    {
        $sql = 'SELECT * FROM produit WHERE nomProduit = ?';
        $produit = $this->executerRequete($sql, array($name));
        if ($produit->rowCount() >= 1)
            return true;
        else
            return false;
    }


    /**
     * Fonction qui vérifie si une sous-catégorie existe ou pas
     *
     * @param $name
     * @return bool
     */
    public function sousCategorieExists($name)
    {
        $sql = 'SELECT * FROM sousCategorie WHERE nomSousCategorie = ?';
        $sCateg = $this->executerRequete($sql, array($name));
        if ($sCateg->rowCount() >= 1)
            return true;
        else
            return false;
    }


    /**
     * Fonction qui vérifie si une catégorie existe ou pas
     *
     * @param $name
     * @return bool
     */
    public function categorieExists($name)
    {
        $sql = 'SELECT * FROM categorie WHERE nomCategorie = ?';
        $categ = $this->executerRequete($sql, array($name));
        if ($categ->rowCount() >= 1)
            return true;
        else
            return false;
    }


    /**
     * Fonction qui récupère les informations d'une catégorie
     *
     * @param $categorie
     * @return mixed
     */
    public function getCategorieID($categorie)
    {
        $sql = "SELECT categorieID FROM categorie WHERE nomCategorie = ?";
        $req = $this->executerRequete($sql, array($categorie));
        $req1 = $req->fetch();
        return $req1['categorieID'];
    }


    /**
     * Fonction qui récupère les information d'une sous-catégorie
     *
     * @param $sousCategorie
     * @return mixed
     */
    public function getSousCategorieID($sousCategorie)
    {
        $sql = "SELECT sousCategorieID FROM souscategorie WHERE nomSousCategorie = ?";
        $req = $this->executerRequete($sql, array($sousCategorie));
        $req1 = $req->fetch();
        return $req1['sousCategorieID'];
    }


    /**
     * Fonction qui récupère les informations des sous-catégories
     *
     * @return string
     */
    public function getSousCategorie()
    {
        $sql = "SELECT nomSousCategorie, sousCategorieID FROM souscategorie";
        $req = $this->executerRequete($sql);
        $chaine = "";
        while ($req1 = $req->fetch()) {
            $chaine .= "<option value='" . $req1['sousCategorieID'] . "'>" . $req1['nomSousCategorie'] . "</option>";
        }
        return $chaine;
    }


    /**
     * Fonction qui récupère les informations des catégories
     *
     * @return string
     */
    public function getCategorie()
    {
        $sql = "SELECT categorieID, nomCategorie FROM categorie";
        $req = $this->executerRequete($sql);
        $chaine = "";
        while ($req1 = $req->fetch()) {
            $chaine .= "<option value='" . $req1['categorieID'] . "'>" . $req1['nomCategorie'] . "</option>";
        }
        return $chaine;
    }

    /**
     * Fonction qui ajoute un produit dans la bdd
     *
     * @param $nom
     * @param $prix
     * @param $description
     * @param $cheminimage
     * @return int
     */

    public function insertProduit($nom, $prix, $description, $cheminimage, $id_sous_categorie)
    {
        if ($this->produitExists($nom))
            return AdministrationProduit::PRODUCT_ALREADY_EXIST;
        $sql = 'INSERT INTO `produit` (`nomProduit`, `prix`, `description`, `cheminimage`, `sousCategorieID`) VALUES (?, ?, ?, ?, ?)';
        $this->executerRequete($sql, array($nom, $prix, $description, $cheminimage, $id_sous_categorie));
        return AdministrationProduit::ADD_OK;
    }


    /**
     * Fonction qui ajoute une nouvelle sous-catégorie à la bdd
     *
     * @param $sousCategorie
     * @param $description
     * @param $categorieID
     * @return mixed
     */
    public function insertNewSousCategorie($sousCategorie, $description, $categorieID)
    {
        if ($this->sousCategorieExists($sousCategorie)) {
            return $this->getSousCategorieID($sousCategorie);
        }
        $sql = 'INSERT INTO `souscategorie` (`nomSousCategorie`, `descriptionSousCategorie`, `CategorieID`) VALUES (?, ?, ?)';
        $this->executerRequete($sql, array($sousCategorie, $description, $categorieID));
        return $this->getSousCategorieID($sousCategorie);

    }


    /**
     * Fonction qui ajoute une nouvelle catégorie
     *
     * @param $categorie
     * @param $description
     * @return mixed
     */
    public function insertNewCategorie($categorie, $description)
    {
        if ($this->categorieExists($categorie)) {
            return $this->getCategorieID($sousCategorie);
        }
        $sql = 'INSERT INTO `categorie` (`nomCategorie`, `descriptionCategorie`) VALUES (?, ?)';
        $this->executerRequete($sql, array($categorie, $description));
        return $this->getCategorieID($categorie);

    }


    /**
     * Fonction qui modifie les informations d'un produit
     *
     * @param $nom
     * @param $prix
     * @param $description
     * @param $image
     * @param null $newNom
     * @return int : le résultat de la fonction
     */
    public function modifyProduit($nom, $prix, $description, $image, $newNom = null)
    {

        if ($this->produitExists($nom)) {

            if ($newNom != null) {
                $sql = "UPDATE produit SET nomProduit = ? WHERE nomProduit = ?";
                $this->executerRequete($sql, array($newNom, $nom));
                $nom = $newNom;
            }
            if (!empty($prix)) {
                if (is_numeric($prix)) {
                    $sql = "UPDATE produit SET prix = ? WHERE nomProduit = ?";
                    $this->executerRequete($sql, array($prix, $nom));
                } else
                    return AdministrationProduit::ERROR_FORM;
            }
            if (!empty($description)) {
                $sql = "UPDATE produit SET description = ? WHERE nomProduit = ?";
                $this->executerRequete($sql, array($description, $nom));
            }
            if (!empty($image)) {
                $sql = "UPDATE produit SET cheminimage = ? WHERE nomProduit = ?";
                $this->executerRequete($sql, array($image, $nom));
            }
            return AdministrationProduit::MODIFY_OK;
        } else
            return AdministrationProduit::DOES_NOT_EXIST;
    }


    /**
     * Fonction qui supprime un produit dans la bdd
     *
     * @param $nom : le nom du produit à effacer
     * @return int : le résultat de la fonction
     */
    public function deleteProduit($nom)
    {
        if ($this->produitExists($nom)) {

            $sql = "DELETE from produit WHERE nomProduit = ?";
            $this->executerRequete($sql, array($nom));
            return AdministrationProduit::DEL_OK;
        } else
            return AdministrationProduit::DOES_NOT_EXIST;
    }

}