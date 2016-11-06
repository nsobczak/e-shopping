<?php
/**
 * Created by PhpStorm.
 * User: Nicolas Sobczak & Vincent Reynaert
 * Date: 21/10/2016
 */
//________________________________________________________________________________________
// Require once
require_once('Vue/Vue.php');
require_once('Controleur/Controleur.php');
require_once('Controleur/ControleurAccueil.php');
require_once('Controleur/ControleurUserProfile.php');
require_once('Controleur/ControleurInscription.php');
require_once('Controleur/ControleurAdministrationProduit.php');
require_once('Controleur/ControleurAdministrationUser.php');
require_once('Controleur/ControleurAdministrationPaiementLivraison.php');
require_once('Controleur/ControleurProduit01.php');
require_once('Controleur/ControleurTunnel.php');

//________________________________________________________________________________________
// Class
class Routeur
{
    // Attributs
    private $ctrlAccueil;
    private $ctrlUserProfile;
    private $ctrlAdminProduit;
    private $ctrlAdminUser;
    private $ctrlProduit01;
    private $ctrlTunnel;

    // Constructeur
    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlUserProfile = new ControleurUserProfile();
        $this->ctrlProduit01 = new ControleurProduit01();
        $this->ctrlInscription = new ControleurInscription();
        $this->ctrlAdminProduit = new ControleurAdministrationProduit();
        $this->ctrlAdminUser = new ControleurAdministrationUser();
        $this->ctrlAdminPaiementLivraison = new ControleurAdministrationPaiementLivraison();
        $this->ctrlTunnel = new ControleurTunnel();
    }

    // Traite une requête entrante
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'accueil') {
                    $this->ctrlAccueil->getHTML();
                } elseif ($_GET['action'] == 'userProfile') {
                    $this->ctrlUserProfile->getHTML();
                } elseif ($_GET['action'] == 'produit01') {
                    $this->ctrlProduit01->getHTML();
                } elseif ($_GET['action'] == 'tunnel') {
                    $this->ctrlTunnel->getHTML();
                } elseif ($_GET['action'] == 'inscription') {
                    $this->ctrlInscription->registerUser();
                } elseif ($_GET['action'] == 'adminProduit') {
                    $this->ctrlAdminProduit->addProduit();
                } elseif ($_GET['action'] == 'AdminUser') {
                    $this->ctrlAdminUser->getHTML();
                } elseif ($_GET['action'] == 'adminPaiementLivraison') {
                    $this->ctrlAdminPaiementLivraison->getHTML();
                } else {
                    throw new Exception("Action non valide");
                }
            } else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->getHTML();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}

