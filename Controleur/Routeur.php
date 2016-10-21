<?php
/**
 * Created by PhpStorm.
 * User: Nicolas Sobczak & Vincent Reynaert
 * Date: 21/10/2016
 */
//________________________________________________________________________________________
// Require once
require_once 'Controleur/Controleur.php';
require_once 'Controleur/ControleurAccueil.php';
require_once 'Vue/Vue.php';


//________________________________________________________________________________________
// Class
class Routeur
{
    // Attributs
    private $ctrlAccueil;

    // Constructeur
    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
    }

    // Traite une requête entrante
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'accueil') {
                    $this->ctrlAccueil->getHTML();
                } else
                    throw new Exception("Action non valide");
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

