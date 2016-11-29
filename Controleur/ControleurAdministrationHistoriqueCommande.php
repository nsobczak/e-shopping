<?php

/**
 * Created by PhpStorm.
 * User: Timothée Percq & Sylvain Pryfer
 * Date: 04/11/2016
 */
//________________________________________________________________________________________
// Require once
require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';
require_once 'Modele/AdministrationHistoriqueCommande.php';

class ControleurAdministrationHistoriqueCommande implements Controleur
{
    /**
     * @var UserProfile
     */
    private $historiqueCommande;


    //______________________________________________________________________________________
    /**
     * ControleurUserProfile constructor.
     */
    public function __construct()
    {
        $this->historiqueCommande = new AdministrationHistoriqueCommande();
    }


    public function handlerHistoriqueCommande() {
        $this->checkEditCommande();
        $this->getHTML();
    }

    public function checkEditCommande(){
        if ((!empty($_GET['do']))&&(!empty($_GET['panierID']))) {
            if ($_GET['do']=='paid'){
                $this->historiqueCommande->turnPaid($_GET['panierID']);
            }
            else
            {
                if ($_GET['do']=='notPaid'){
                    $this->historiqueCommande->turnNotPaid($_GET['panierID']);
                }
            }
            

        }
    }



    /** Selectionne la page a afficher
     *
     * @return int L'id de l'utilisateur s'il est connecte, -1 sinon    */
    public function selectHTML()
    {
//        if ("utilisateur loggé")
//        {
        $userID = 3;
//        }
//        else // Pour aller a la page de login
//        {
//          $userID = -1;
//        }
        return $userID;
    }


    /**
     * Fonction qui affiche la page d'accueil
     */
    public function getHTML()
    {
        $vue = new Vue("AdministrationHistoriqueCommande");
                //$userID = $this->selectHTML();
        $panier= $this->historiqueCommande->getPanier();    
        
        
        //var_dump($res);
        $vue->generer(array('listPanier' => $panier));
        // si l'uilisateur est connecte
        // sinon redirection vers la page de login
        

    }

}
