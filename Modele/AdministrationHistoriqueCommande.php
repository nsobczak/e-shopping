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
     * Fonction qui récupère les infos d'un panier
     *
     * @return PDOStatement
     */
    public function getPanier()
    {
        $sql = ' select panierID, nom, etatPanier from panier INNER JOIN user where panier.userID=user.userID';
        $panier = $this->executerRequete($sql);
        return $panier;
    }


    /**
     * Fonction qui change l'état du panier à 1
     *
     * @param $panierID
     */
    public function turnPaid($panierID)
    {
        $sql = "UPDATE panier SET etatPanier = 1 WHERE panierID = ?";
        $this->executerRequete($sql, array($panierID));
    }


    /**
     * Fonction qui change l'état du panier à 0
     *
     * @param $panierID
     */
    public function turnNotPaid($panierID)
    {
        $sql = "UPDATE panier SET etatPanier = 0 WHERE panierID = ?";
        $this->executerRequete($sql, array($panierID));
    }

}