<?php


/**
 * Created by PhpStorm.
 * User: Quentin Levert
 * Date: 18/11/2016
 * Time: 14:44
 */
class ChiffreAffaire extends Modele
{
    /**
     * Fonction qui calcule le chiffre d'affaire
     *
     * @return int: le chiffre d'affaire
     */
    public function getChiffreAffaire()
    {
        if (isset($_POST['month']) && isset($_POST['year'])) {
            $month = $_POST['month'];
            $year = $_POST['year'];

            $finalprix = 0;

            if (!empty($month) && !empty($year)) {
                $reqItemPanier = "SELECT * FROM panier INNER JOIN lignepanier ON (panier.panierID = lignepanier.panierID) WHERE panier.etatPanier=1 AND MONTH (panier.HeureAchat)=$month AND YEAR(panier.HeureAchat)=$year";
                $itemsPanier = $this->executerRequete($reqItemPanier);
                if ($itemsPanier->rowCount() > 0) {
                    $items = $itemsPanier->fetchAll();
                    foreach ($items as $item) {
                        $idproduit = $item['produitID'];
                        $sqlPrix = "SELECT * FROM produit WHERE produitID=?";
                        $prix = $this->executerRequete($sqlPrix, array($idproduit));
                        if ($prix->rowCount() == 1) {
                            $prixFetch = $prix->fetch();
                            $finalprix += $prixFetch['prix'] * $item['quantité'];
                        }
                    }

                }
                return $finalprix;

            } else if (empty($month) && !empty($year)) {
                $reqItemPanier = "SELECT * FROM panier INNER JOIN lignepanier ON (panier.panierID = lignepanier.panierID) WHERE panier.etatPanier=1 AND YEAR(panier.HeureAchat)=$year";

                $itemsPanier = $this->executerRequete($reqItemPanier);
                if ($itemsPanier->rowCount() > 0) {
                    $items = $itemsPanier->fetchAll();
                    foreach ($items as $item) {
                        $idproduit = $item['produitID'];
                        $sqlPrix = "SELECT * FROM produit WHERE produitID=?";
                        $prix = $this->executerRequete($sqlPrix, array($idproduit));
                        if ($prix->rowCount() == 1) {
                            $prixFetch = $prix->fetch();
                            $finalprix += $prixFetch['prix'] * $item['quantité'];
                        }
                    }
                }
                return $finalprix;
            }
        }

    }
}

