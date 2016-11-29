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
    public function getAllProduitsByCategorieId($idCategorie) {
        $sql = "SELECT * FROM produit, categorie, souscategorie WHERE produit.sousCategorieID = souscategorie.sousCategorieID AND souscategorie.categorieID = categorie.categorieID AND categorie.categorieID = ?";
        $produits = $this->executerRequete($sql, array($idCategorie));
        if ($produits->rowCount() >= 1)
            return $produits->fetchAll();  // Accès à la première ligne de résultat
    }


    public function getCategories() {
        $sql = "SELECT * FROM categorie";
        $produits = $this->executerRequete($sql, array());
        if ($produits->rowCount() >= 1)
            return $produits->fetchAll();  // Accès à la première ligne de résultat
    }

}


  