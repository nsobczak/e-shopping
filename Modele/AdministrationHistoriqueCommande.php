<?php

require_once('Modele.php');

/**
 * Created by PhpStorm.
 * User: Timothée Percq & Sylvain Pryfer
 * Date: 04/11/2016
 */
class AdministrationHistoriqueCommande extends Modele
{


    /**
     * Fonction qui récupète la liste de tous les paniers
     *
     * @return liste des paniers de la base de données
     */
    public function getAllPanier()
    {
        $sql = ' select panierID, nom, etatPanier from panier INNER JOIN user where panier.userID=user.userID';
        $panier = $this->executerRequete($sql);
        return $panier;

    }


    /**
     * Fonction qui cherche un panier
     *
     * @param int ID du panier
     * @return le panier ayant l'ID voulu
     */
    public function getPanier($panierID)
    {
        $sql = 'select panierID, nom, etatPanier from panier INNER JOIN user where panier.userID=user.userID and panier.panierID=?';
        $panier = $this->executerRequete($sql, array($panierID));
        return $panier;

    }


    /**
     * Fonction qui récupère les infos d'un panier
     *
     * @param int ID du panier rechercher
     * @return array le contenu du panier
     */
    public function getCommande($panierID)
    {
        $sql = ' select quantité, nomProduit, prix from lignepanier inner join produit where lignepanier.produitID=produit.produitID and panierID=?';
        $commande = $this->executerRequete($sql, array($panierID));
        return $commande;
    }


    /**
     * Fonction qui récupère la liste des paniers d'un utilisateur
     *
     * @param string nom de l'utilisateur
     * @return array, la liste des paniers de l'utilisateur
     */
    public function getPanierUser($userName)
    {
        $sql = " select panierID, nom, etatPanier FROM panier INNER JOIN user where panier.userID=user.userID and user.nom=?";
        $panier = $this->executerRequete($sql, array($userName));
        return $panier;
    }


    /**
     * Fonction qui change l'état du panier à 1 (changer un panier en payé)
     *
     * @parem int ID du panier a modifier
     */
    public function turnPaid($panierID)
    {
        $sql = "UPDATE panier SET etatPanier = 1 WHERE panierID = ?";
        $this->executerRequete($sql, array($panierID));

    }


    /**
     * Fonction qui change l'état du panier à 0 (changer un panier en non payé)
     *
     * @parem int ID du panier a modifier
     */
    public function turnNotPaid($panierID)
    {
        $sql = "UPDATE panier SET etatPanier = 0 WHERE panierID = ?";
        $this->executerRequete($sql, array($panierID));
    }


}