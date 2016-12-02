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
    // Attributs
    /**
     * @var AdministrationPaiementLivraison
     */
    private $adminPaiementLivraison;
    /**
     * @var int
     */
    private $adminPaiementLivraison_code;


    //______________________________________________________________________________________
    /**
     * ControleurAdministrationPaiementLivraison constructor.
     */
    public function __construct()
    {
        $this->adminPaiementLivraison = new AdministrationPaiementLivraison();
        $this->adminPaiementLivraison_code = 0; // default
    }

    /**
     * Getter de $adminPaiementLivraison
     *
     * @return AdministrationPaiementLivraison
     */
    public function getAdminPaiementLivraison()
    {
        return $this->adminPaiementLivraison;
    }

    /**
     * Getter de $adminPaiementLivraison_code
     *
     * @return int adminPaiementLivraison_code
     */
    public function getAdminPaiementLivraison_code()
    {
        return $this->adminPaiementLivraison_code;
    }

    /**
     * Setter de $adminPaiementLivraison
     *
     * @param $newAdminPaiementLivraison
     */
    public function setAdminPaiementLivraison($newAdminPaiementLivraison)
    {
        $this->adminPaiementLivraison = $newAdminPaiementLivraison;
    }

    /**
     * Setter de $adminPaiementLivraison_code
     *
     * @param $newAdminPaiementLivraison_code
     */
    public function setAdminPaiementLivraison_code($newAdminPaiementLivraison_code)
    {
        $this->adminPaiementLivraison_code = $newAdminPaiementLivraison_code;
    }

    //______________________________________________________________________________________
    /**
     * Gestionnaire principal de la page d'administration pour la livraison
     * ainsi que pour les modes de livraison, les vérifications des variables
     * se feront ici + appel de la page HTML
     */
    public function handlerPaiementLivraison()
    {
        if (isset($_SESSION['userID']) && $_SESSION['niveau_accreditation'] == 1) {
            $this->addPaiementLivraison(); // vérification si ajout paiement / livraison
            $this->checkEditPaiement();  // vérification s'il veut éditer un moyen de paiement
            $this->removePaiementLivraison();  // vérification s'il veut supprimer un paiement

            $this->getHTML();
        } else {
            header('Location: index.php?action=login');
            die();
        }
    }


    /**
     * Fonction qui ajoute un moyen de paiement
     */
    private function addPaiementLivraison()
    {
        if (empty($_POST['nomPaiementLivraison']) && empty($_POST['descriptionPaiementLivraison']))
            $this->adminPaiementLivraison_code = 0;
        elseif (empty($_POST['nomPaiementLivraison']) || empty($_POST['descriptionPaiementLivraison']))
            $this->adminPaiementLivraison_code = AdministrationPaiementLivraison::MISSING_PARAMETERS;
        elseif (empty($_GET['do']) && !empty($_POST['nomPaiementLivraison']) && !empty($_POST['descriptionPaiementLivraison'])) {
            $this->adminPaiementLivraison_code = $this->adminPaiementLivraison->insertPaiementLivraison($_POST['nomPaiementLivraison'], $_POST['descriptionPaiementLivraison']);
        }
    }


    /**
     * Fonction qui édite un moyen de paiement
     */
    private function checkEditPaiement()
    {
        if (!empty($_GET['do']) && !empty($_GET['paiementID'])) {
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


    /**
     * Fonction qui supprime un moyen de paiement
     */
    private function removePaiementLivraison()
    {
        if (!empty($_GET['paiementID']) && !empty($_GET['do'])) {
            if ($_GET['do'] == "delete")
                $this->adminPaiementLivraison_code == $this->adminPaiementLivraison->removePaiementLivraison($_GET['paiementID']);
        }
    }


    /**
     * Fonction qui affiche la vue
     */
    public function getHTML()
    {
        // TODO : vérifier que le client est connecté et qu'il a un niveau d'accrédition suffisant
        $vue = new Vue("AdministrationPaiementLivraison");
        // Par défaut, on affiche la liste des moyens de paiement & livraison
        $vue->generer(array(
            'listMoyensPaiement' => $this->adminPaiementLivraison->getMoyensPaiement(),
            'code' => $this->adminPaiementLivraison_code
        ));

    }

}

?>
