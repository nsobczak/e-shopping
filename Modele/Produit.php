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
            throw new Exception("Aucun utilisateur ne correspond à l'identifiant '$produitID'");
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
}


  