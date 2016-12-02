<?php

/**
 * Auteur: Baudouin Landais
 */
class Recherche extends Modele
{
    const NO_RESULT = 1;

    /**
     * Fonction qui récupère la liste des produits correspondant à la recherche
     *
     * @param $name
     * @return array
     */
    public function getProduitByName($name)
    {
        $term = '%' . $name . '%';
        $sql = "SELECT * FROM `produit` WHERE `nomProduit` LIKE ?";
        $results = $this->executerRequete($sql, array($term));
        if ($results->rowCount() > 0)
            return $results->fetchAll();
        else
            return null;
    }
}