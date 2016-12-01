<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Nicolas Sobczak & Vincent Reynaert & everyone add its part
 * Date: 21/10/2016
 */
//________________________________________________________________________________________
// Require once
require_once('Vue/Vue.php');
require_once('Controleur/Controleur.php');
require_once('Controleur/ControleurAccueil.php');
require_once('Controleur/ControleurUserProfile.php');
require_once('Controleur/ControleurInscription.php');
require_once('Controleur/ControleurAdministrationUser.php');
require_once('Controleur/ControleurAdministrationHistoriqueCommande.php');
require_once('Controleur/ControleurAdministrationProduit.php');
require_once('Controleur/ControleurAdministrationPaiementLivraison.php');
require_once('Controleur/ControleurProductCategorie.php');
require_once('Controleur/ControleurProduitList.php');
require_once('Controleur/ControleurTunnel.php');
require_once('Controleur/ControleurLogin.php');
require_once('Controleur/ControleurRecherche.php');
require_once('Controleur/ControleurChiffreAffaire.php');
require_once('Controleur/ControleurFAQ.php');

//________________________________________________________________________________________
// Class
class Routeur
{
    // Attributs
    private $ctrlAccueil;
    private $ctrlUserProfile;
    private $ctrlAdminProduit;
    private $ctrlAdminHistoriqueCommande;
    private $ctrlAdminUser;
    private $ctrlProductCategorie;
    private $ctrlProduitList;
    private $ctrlTunnel;
    private $ctrlRecherche;
    private $ctrlChiffreAffaire;
    private $ctrlFAQ;


    //______________________________________________________________________________________
    /**
     * Routeur constructor.
     */
    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlUserProfile = new ControleurUserProfile();
        $this->ctrlProductCategorie = new ControleurProductCategorie();
        $this->ctrlProduitList = new ControleurProduitList();
        $this->ctrlInscription = new ControleurInscription();
        $this->ctrlAdminProduit = new ControleurAdministrationProduit();
        $this->ctrlAdminUser = new ControleurAdministrationUser();
        $this->ctrlAdminPaiementLivraison = new ControleurAdministrationPaiementLivraison();
        $this->ctrlAdminHistoriqueCommande = new ControleurAdministrationHistoriqueCommande();
        $this->ctrlTunnel = new ControleurTunnel();
        $this->ctrlLogin = new ControleurLogin();
        $this->ctrlRecherche = new ControleurRecherche();
        $this->ctrlChiffreAffaire = new ControleurChiffreAffaire();
        $this->ctrlFAQ = new ControleurFAQ();
    }


    /**
     * Fonction qui traite une requête entrante en fonction de l'action
     */
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'accueil') {
                    $this->ctrlAccueil->getHTML();
                } elseif ($_GET['action'] == 'userProfile') {
                    $this->ctrlUserProfile->handlerUserProfile();
                } elseif ($_GET['action'] == 'productCategorie') {
                    $this->ctrlProductCategorie->getHTML();
                } elseif ($_GET['action'] == 'produitList') {
                    $this->ctrlProduitList->getHTML();
                } elseif ($_GET['action'] == 'tunnel') {
                    $this->ctrlTunnel->getHTML();
                } elseif ($_GET['action'] == 'inscription') {
                    $this->ctrlInscription->registerUser();
                } elseif ($_GET['action'] == 'adminProduit') {
                    $this->ctrlAdminProduit->getHTML();
                } elseif ($_GET['action'] == 'adminUser') {
                    $this->ctrlAdminUser->handlerAdministrationUser();
                } elseif ($_GET['action'] == 'adminPaiementLivraison') {
                    $this->ctrlAdminPaiementLivraison->handlerPaiementLivraison();
                } elseif ($_GET['action'] == 'login') {
                    $this->ctrlLogin->getHTML();
                } elseif ($_GET['action'] == 'deconnexion') {
                    $this->ctrlLogin->logOut();
                } elseif ($_GET['action'] == 'logguer') {
                    $this->ctrlLogin->logguerUser();
                } elseif ($_GET['action'] == 'recherche') {
                    $this->ctrlRecherche->getHTML();
                } elseif ($_GET['action'] == 'adminChiffreAffaire'){
                    $this->ctrlChiffreAffaire->getHTML();
                } elseif ($_GET['action']=='adminHistoriqueCommande') {
                    $this->ctrlAdminHistoriqueCommande->handlerHistoriqueCommande();
                } elseif ($_GET['action']=='faq') {
                    $this->ctrlFAQ->handlerFAQ();
                }

                else {
                    throw new Exception("Action non valide");
                }
            } else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->getHTML();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }


    /**
     * Fonction qui affiche une erreur
     *
     * @param $msgErreur
     */
    private function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}