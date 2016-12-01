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
     * @var historiqueCommande
     */
    private $historiqueCommande;


    //______________________________________________________________________________________
    /**
     * ControleurAdminisatrationHistoriqueCommande constructor.
     */
    public function __construct()
    {
        $this->historiqueCommande = new AdministrationHistoriqueCommande();
    }

    /**
     * Getter de $historiqueCommande
     *
     * @return AdministrationHistoriqueCommande|UserProfile
     */
    public function getHistoriqueCommande()
    {
        return $this->historiqueCommande;
    }

    /**
     * Setter de $historiqueCommande
     *
     * @param $newHistoriqueCommande
     */
    public function setHistoriqueCommande($newHistoriqueCommande)
    {
        $this->historiqueCommande = $newHistoriqueCommande;
    }


    //______________________________________________________________________________________
    /**
     * Fonction handler
     */
    public function handlerHistoriqueCommande()
    {
        $this->checkEditCommande();

        $this->getHTML();

    }


    /**
     * Procedure regardant si il y a une modification à faire sur les paniers.
     */
    public function checkEditCommande()
    {
        if ((!empty($_GET['do'])) && (!empty($_GET['panierID']))) {
            if ($_GET['do'] == 'paid') {
                $this->historiqueCommande->turnPaid($_GET['panierID']);
            } else {
                if ($_GET['do'] == 'notPaid') {
                    $this->historiqueCommande->turnNotPaid($_GET['panierID']);
                }
            }
        }
    }


    /**
     * Fonction qui affiche la page d'accueil
     */
    public function getHTML()
    {
        $vue = new Vue("AdministrationHistoriqueCommande");
        if (!empty($_POST['Name'])) {
            $allPanier = $this->historiqueCommande->getPanierUser($_POST['Name']);

        } else {
            if (!empty($_POST['PanierID'])) {
                $allPanier = $this->historiqueCommande->getPanier($_POST['PanierID']);
            } else {
                $allPanier = $this->historiqueCommande->getAllPanier();
            }
        }

        $lstCommande = [];

        foreach ($allPanier as $element) {
            $lstCommande[$element['panierID']] = $this->historiqueCommande->getCommande($element['panierID']);

        }
        if (!empty($_POST['Name'])) {
            $allPanier = $this->historiqueCommande->getPanierUser($_POST['Name']);

        } else {
            if (!empty($_POST['PanierID'])) {

                $allPanier = $this->historiqueCommande->getPanier($_POST['PanierID']);
            } else {
                $allPanier = $this->historiqueCommande->getAllPanier();
            }
        }


        $vue->generer(array('listPanier' => $allPanier, 'lstCommande' => $lstCommande));


    }

}
