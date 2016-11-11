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
    private $adminPaiementLivraison_code;

    public function __construct() {
        $this->adminPaiementLivraison = new AdministrationPaiementLivraison();
        $this->adminPaiementLivraison_code = 0; // default
    }

    /**
     * Gestionnaire principal de la page d'administration pour la livraison
     * ainsi que pour les modes de livraison, les vérifications des variables
     * se feront ici + appel de la page HTML
     */
    public function handlerPaiementLivraison() {
        $this->addPaiementLivraison(); // vérification si ajout paiement / livraison
        $this->checkEditPaiement();  // vérification s'il veut éditer un moyen de paiement
        $this->removePaiementLivraison();  // vérification s'il veut supprimer un paiement

        $this->getHTML();
    }

    private function addPaiementLivraison() {
        if (empty($_POST['type_mode']) && empty($_POST['nomPaiementLivraison']) && empty($_POST['descriptionPaiementLivraison']))
            $this->adminPaiementLivraison_code = 0;
        elseif (empty($_POST['type_mode']) || empty($_POST['nomPaiementLivraison']) || empty($_POST['descriptionPaiementLivraison']))
            $this->adminPaiementLivraison_code = AdministrationPaiementLivraison::MISSING_PARAMETERS;
        elseif (!empty($_POST['type_mode']) && !empty($_POST['nomPaiementLivraison']) && !empty($_POST['descriptionPaiementLivraison'])) {
            if ($_POST['type_mode'] == "paiement" xor $_POST['type_mode'] == "livraison")
                $this->adminPaiementLivraison_code = $this->adminPaiementLivraison->insertPaiementLivraison($_POST['type_mode'], $_POST['nomPaiementLivraison'], $_POST['descriptionPaiementLivraison']);
            else
                $this->adminPaiementLivraison_code = AdministrationPaiementLivraison::INVALID_PARAMETER;

        }
    }

    private function checkEditPaiement() {
        if(!empty($_GET['do']) && !empty($_GET['paiementID'])) {
            if ($_GET['do'] == "delete")
                return;
            if ($_GET['do'] == "editPaiement") {
                $this->adminPaiementLivraison->editMoyenPaiement($_POST['nomPaiementLivraison'], $_POST['descriptionPaiementLivraison'], $_GET['paiementID']);
                $this->adminPaiementLivraison_code = AdministrationPaiementLivraison::EDIT_OK;
            }
        }
        if (!empty($_GET['paiementID']) && empty($_GET['do'])) {
            $paiement = $this->adminPaiementLivraison->getMoyensPaiementById($_GET['paiementID']);
            $vue = new Vue("AdminEditPaiement");
            $vue->generer(array(
                'paiement' => $paiement,
                'listMoyensPaiement' => $this->adminPaiementLivraison->getMoyensPaiement()));
            die();
        }
    }

    private function removePaiementLivraison() {
        if(!empty($_GET['paiementID']) && !empty($_GET['do'])) {
            if($_GET['do'] == "delete")
                $this->adminPaiementLivraison_code == $this->adminPaiementLivraison->removePaiementLivraison($_GET['paiementID']);
        }
    }

    public function getHTML()
    {
        // TODO : vérifier que le client est connecté et qu'il a un niveau d'accrédition suffisant
        $vue = new Vue("AdministrationPaiementLivraison");
        // Par défaut, on affiche la liste des moyens de paiement & livraison
        $vue->generer(array(
            'listMoyensPaiement' => $this->adminPaiementLivraison->getMoyensPaiement(),
            'listModesLivraison' => $this->adminPaiementLivraison->getModesLivraison(),
            'code'               => $this->adminPaiementLivraison_code
        ));

    }

}

?>
