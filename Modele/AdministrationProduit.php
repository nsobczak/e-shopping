<?php

require_once('Modele.php');

/**
 * Created by PhpStorm.
 * User:
 * Date: 05/11/2016
 */
class AdministrationProduit extends Modele
{
    //Constantes
    const ALREADY_EXIST = 1;
    const ERROR_FORM = 2;
    const ADD_OK = 3;

    //______________________________________________________________________________________
    /**
     * Fonction qui...
     *
     * @param $name
     * @return bool
     */
    public function produitExists($name)
    {
        $sql = 'SELECT * FROM produit WHERE nomProduit like ?';
        $produit = $this->executerRequete($sql, array($name));
        if ($produit->rowCount() >= 1)
            return true;
        else
            return false;
    }


    /**
     * Fonction qui...
     *
     * @param $nom
     * @param $prix
     * @param $description
     * @param $cheminimage
     * @return int
     */
    public function insertProduit($nom, $prix, $description, $cheminimage)
    {
        if ($this->produitExists($nom))
            return AdministrationProduit::ALREADY_EXIST;
        $sql = 'INSERT INTO `produit` (`produitID`, `nomProduit`, `prix`, `description`, `cheminimage`, `sousCategorieID`) VALUES (NULL, ?, ?, ?, ?, ?)';
        $this->executerRequete($sql, array($nom, $prix, $description, $cheminimage, '1'));
        return AdministrationProduit::ADD_OK;
    }

}