<?php

/***
 * User: Baudouin LANDAIS
 * Date: 06/11/2016
 */
class AdministrationPaiementLivraison extends Modele
{
    //Constantes
    const ACTION_OK = 1;
    const INVALID_PARAMETER = 2;
    const MISSING_PARAMETERS = 3;
    const BAD_ITEM_EDIT = 4;
    const EDIT_OK = 5;


    //______________________________________________________________________________________
    /**
     * Fonction qui ajoute un moyen de paiement à la bdd
     *
     * @param $nom
     * @param $description
     * @return int
     */
    public function insertPaiementLivraison($nom, $description)
    {
        $sql = "INSERT INTO moyendepaiement(moyenDePaiementID,nomMoyenDePaiement,descriptionMoyenDePaiement) VALUES (NULL, ?, ?)";
        $this->executerRequete($sql, array($nom, $description));
        return AdministrationPaiementLivraison::ACTION_OK;
    }


    /**
     * Fonction qui supprime un moyen de paiement de la bdd
     *
     * @param $paiementID
     * @return int
     */
    public function removePaiementLivraison($paiementID)
    {
        $sql = "DELETE FROM moyendepaiement WHERE moyenDePaiementID = ?";
        $this->executerRequete($sql, array($paiementID));
        return AdministrationPaiementLivraison::ACTION_OK;
    }


    /**
     * Fonction qui modifie un moyen de paiement de la bdd
     *
     * @param $nom
     * @param $description
     * @param $paiementID
     * @return int
     */
    public function editMoyenPaiement($nom, $description, $paiementID)
    {
        $sql = "UPDATE moyendepaiement SET nomMoyenDePaiement = ?, descriptionMoyenDePaiement = ? WHERE moyenDePaiementID = ?";
        $this->executerRequete($sql, array($nom, $description, $paiementID));
        return AdministrationPaiementLivraison::EDIT_OK;
    }


    /**
     * Fonction qui retourne la liste des moyens de paiement actuellement dans la BDD
     *
     * @return array    Tableau contenant la liste des moyens de paiement
     */
    public function getMoyensPaiement()
    {
        $sql = "SELECT * FROM moyendepaiement";
        $moyensPaiement = $this->executerRequete($sql);
        if ($moyensPaiement->rowCount() > 0)
            return $moyensPaiement->fetchAll();
        else
            return array();
    }


    /**
     * Fonction qui retourne un moyen de paiement depuis son identifiant
     *
     * @param $paiementID   ID du moyen de paiement
     * @return mixed    Soit retourne le moyen de paiement (tableau), soit une erreur
     * @throws Exception    Si erreur, moyen de paiement introuvable
     */
    public function getMoyensPaiementById($paiementID)
    {
        $sql = "SELECT * FROM moyendepaiement WHERE moyenDePaiementID =  ?";
        $paiement = $this->executerRequete($sql, array($paiementID));
        if ($paiement->rowCount() == 1)
            return $paiement->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun moyen de paiement n'existe pour l'identifiant '. $paiementID .'");
    }
}