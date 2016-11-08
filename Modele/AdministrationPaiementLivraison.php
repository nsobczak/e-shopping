<?php
/***
 * User: Baudouin LANDAIS
 * Date: 06/11/2016
 */

class AdministrationPaiementLivraison extends Modele
{
    const ACTION_OK = 1;
    const INVALID_PARAMETER = 2;
    const MISSING_PARAMETERS = 3;
    const BAD_ITEM_EDIT = 4;

    public function insertPaiementLivraison($type_mode, $nom, $description)
    {
        // TODO
        return AdministrationPaiementLivraison::ACTION_OK;
    }

    public function removePaiementLivraison($paiementID)
    {
        // TODO
        return AdministrationPaiementLivraison::ACTION_OK;
    }

    public function getMoyensPaiement() {
        $sql = "SELECT * FROM moyendepaiement";
        $moyensPaiement = $this->executerRequete($sql);
        return $moyensPaiement;
    }

    public function getModesLivraison() {
        // TODO : attente bdd
        return array();
    }

}