<?php
/***
 * User: Baudouin LANDAIS
 * Date: 06/11/2016
 */

class AdministrationPaiementLivraison extends Modele
{
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