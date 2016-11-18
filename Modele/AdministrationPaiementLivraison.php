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
     * Fonction qui...
     *
     * @param $type_mode
     * @param $nom
     * @param $description
     * @return int
     */
    public function insertPaiementLivraison($type_mode, $nom, $description)
    {
        // TODO
        if($type_mode == "paiement") {
            $sql = "INSERT INTO moyendepaiement(moyenDePaiementID,nomMoyenDePaiement,descriptionMoyenDePaiement) VALUES (NULL, ?, ?)";
            $this->executerRequete($sql, array($nom, $description));
        }
        elseif($type_mode == "livraison") {
            // TODO : BDD incomplète
        }
        return AdministrationPaiementLivraison::ACTION_OK;
    }


    /**
     * Fonction qui...
     *
     * @param $paiementID
     * @return int
     */
    public function removePaiementLivraison($paiementID)
    {
        // TODO
        $sql = "DELETE FROM moyendepaiement WHERE moyenDePaiementID = ?";
        $this->executerRequete($sql, array($paiementID));
        return AdministrationPaiementLivraison::ACTION_OK;
    }


    /**
     * Fonction qui...
     *
     * @param $nom
     * @param $description
     * @param $paiementID
     * @return int
     */
    public function editMoyenPaiement($nom, $description, $paiementID) {
        $sql = "UPDATE moyendepaiement SET nomMoyenDePaiement = ?, descriptionMoyenDePaiement = ? WHERE moyenDePaiementID = ?";
        $this->executerRequete($sql, array($nom, $description, $paiementID));
        return AdministrationPaiementLivraison::EDIT_OK;
    }


    /**
     * Fonction qui...
     *
     * @return PDOStatement
     */
    public function getMoyensPaiement() {
        $sql = "SELECT * FROM moyendepaiement";
        $moyensPaiement = $this->executerRequete($sql);
        return $moyensPaiement;
    }


    /**
     * Fonction qui...
     *
     * @param $paiementID
     * @return mixed
     * @throws Exception
     */
    public function getMoyensPaiementById($paiementID) {
        $sql = "SELECT * FROM moyendepaiement WHERE moyenDePaiementID =  ?";
        $paiement = $this->executerRequete($sql, array($paiementID));
        if ($paiement->rowCount() == 1)
            return $paiement->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun moyen de paiement n'existe pour l'identifiant '. $paiementID .'");
    }


    //Fonction à supprimer car on ne va pas s'occuper de modes de livraisons
    /**
     * Fonction qui...
     *
     * @return array
     */
    public function getModesLivraison() {
        // TODO : attente bdd
        return array();
    }

}