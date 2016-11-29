<?php
//create by : Guillaume vandierdonck & Qi You


require_once('Modele.php');


class Produit extends Modele
{
    /** Renvoie les informations sur un utillisateurs
     *
     * @param int $id L'identifiant de l'utilisateur
     * @return array L'utilisateur
     * @throws Exception Si l'identifiant de l'utilisateur est inconnu
     */
    public function getProduit($produitID)
    {
        $sql = 'select produitID, nomProduit, prix, description, cheminimage from produit where produitID=?';
        $produit = $this->executerRequete($sql, array($produitID));
        if ($produit->rowCount() == 1)
            return $produit->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun produit ne correspond à l'identifiant '$produitID'");
    }


    /** Renvoie les informations sur un utillisateurs
     *
     * @param int $id L'identifiant de l'utilisateur
     * @return array L'utilisateur
     * @throws Exception Si l'identifiant de l'utilisateur est inconnu
     */
    public function getAllProduit()
    {
        $sql = 'select produitID, nomProduit, prix, description, cheminimage FROM produit';
        $produit = $this->executerRequete($sql);
        if ($produit->rowCount() >= 1) {
            return $produit->fetchAll();  // Accès à la première ligne de résultat
        } else
            throw new Exception("Aucun produit ne correspond à l'identifiant");
    }


    /** Retourne tous les produits appartenants à la catégorie spécifiée
     * @param $idCategorie
     * @return un tableau avec les produits
     * @throws Exception si aucun produit dans la sous catégorie choisie
     */
    public function getAllProduitsByCategorieId($idCategorie)
    {
        $sql = "SELECT * FROM produit, categorie, souscategorie WHERE produit.sousCategorieID = souscategorie.sousCategorieID AND souscategorie.categorieID = categorie.categorieID AND categorie.categorieID = ?";
        $produits = $this->executerRequete($sql, array($idCategorie));
        if ($produits->rowCount() >= 1)
            return $produits->fetchAll();  // Accès à la première ligne de résultat
    }


    /**
     * Retourne toutes les catégories disponibles
     * @return array Un tableau des catégories
     */
    public function getCategories()
    {
        $sql = "SELECT * FROM categorie";
        $produits = $this->executerRequete($sql, array());
        if ($produits->rowCount() >= 1)
            return $produits->fetchAll();  // Accès à la première ligne de résultat
    }


    /**
     * @param $userID   L'id de l'utilisateur
     * @return mixed|null  Le panier en cours ou null s'il y en a aucun
     */
    public function getPanierForUser($userID)
    {
        $sql = "SELECT * FROM panier WHERE panier.etatPanier = 0 AND panier.userID = ?";
        $panier = $this->executerRequete($sql, array($userID));
        if ($panier->rowCount() == 1)
            return $panier->fetch(); // un seul panier possible non terminé...
        else
            return null;
    }


    public function getLignePanier($panierID, $produitID)
    {
        $sql = "SELECT * FROM lignepanier WHERE panierID = ? AND produitID = ?";
        $lignepanier = $this->executerRequete($sql, array($panierID, $produitID));
        if ($lignepanier->rowCount() >= 1)
            return $lignepanier->fetch();
        else
            return null;
    }

    public function createNewLignePanier($panierID, $produitID)
    {
        // Il faut la dernière ligne du panier
        $sql_lastline = "SELECT numeroLignePanier FROM `lignepanier` WHERE panierID = ? ORDER BY numeroLignePanier DESC LIMIT 1";
        $last_line = $this->executerRequete($sql_lastline, array($panierID));
        if ($last_line->rowCount() == 1) {
            $last_ligne = $last_line->fetch();
            echo var_dump($last_ligne);
            $insert_line = "INSERT INTO `lignepanier` (`lignePanierID`, `panierID`, `numeroLignePanier`, `produitID`, `quantité`) VALUES (NULL, ?, ?, ?, ?)";
            $ligne = $this->executerRequete($insert_line, array($panierID, $last_ligne['numeroLignePanier'] + 1, $produitID, 1)); // on rajoute l'item au panier
        } else {
            // étrange... aucune ligne au panier ? comment le panier a été créé ?
            $insert_line = "INSERT INTO `lignepanier` (`lignePanierID`, `panierID`, `numeroLignePanier`, `produitID`, `quantité`) VALUES (NULL, ?, ?, ?, ?)";
            $ligne = $this->executerRequete($insert_line, array($panierID, 1, $produitID, 1)); // on rajoute l'item au panier
        }
    }

    public function increaseQuantityPanier($lignePanierID)
    {
        $sql = "UPDATE `lignepanier` SET `quantité`= `quantité` + 1 WHERE `lignePanierID` = ?";
        $this->executerRequete($sql, array($lignePanierID));
    }

    public function createNewPanier($userID) {
        // TODO ! La table panier est étrange... besoin de connaître tout ces paramètres ?!
        $sql = "INSERT INTO `panier` (`panierID`, `userID`, `etatPanier`, `adresseID`, `moyenDePaiementID`, `HeureAchat`, `IDProduit`) VALUES (NULL, ?, ?, ?, ?, NULL, ?)";
        $this->executerRequete($sql, array($userID, 0, 0, 0, 0));
    }

}


  