<?php
/**
 * User: Baudouin LANDAIS
 * Date: 06/11/2016
 */

require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';
require_once 'Modele/AdministrationPaiementLivraison.php';

class ControleurAdministrationPaiementLivraison implements Controleur
{
    private $adminPaiementLivraison;

    public function __construct() {
        $this->adminPaiementLivraison = new AdministrationPaiementLivraison();
    }

    public function getHTML()
    {
        // TODO : vérifier que le client est connecté et qu'il a un niveau d'accrédition suffisant
        $vue = new Vue("AdministrationPaiementLivraison");
        // Par défaut, on affiche la liste des moyens de paiement & livraison
        $vue->generer(array(
            'listMoyensPaiement' => $this->adminPaiementLivraison->getMoyensPaiement(),
            'listModesLivraison' => $this->adminPaiementLivraison->getModesLivraison()
        ));

    }

}

?>
