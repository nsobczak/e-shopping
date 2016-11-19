<?php

/**
 * Created by PhpStorm.
 * User:
 * Date: 05/11/2016
 */

require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';
require_once 'Modele/AdministrationProduit.php';

class ControleurAdministrationProduit implements Controleur
{
    //Attributs
    /**
     * @var
     */
    private $add_produit_ok;
    /**
     * @var int
     */
    private $add_produit_code;


    //______________________________________________________________________________________
    /**
     * ControleurAdministrationProduit constructor.
     */
    public function __construct()
    {
        $this->add_produit_code = 0;
        $this->add_produit = new AdministrationProduit();
    }


    /**
     * Fonction qui...
     */
    public function addProduit()
    {
        if (!empty($_POST['nomProduit']) AND !empty($_POST['prix']) AND !empty($_POST['description']) AND !empty($_POST['cheminimage'])) {
            $this->add_produit_code = $this->add_produit->insertProduit($_POST['nomProduit'], $_POST['prix'], $_POST['description'], $_POST['cheminimage']);
        }

        $this->getHTML();
    }


    /**
     * Fonction qui...
     */
    public function getHTML()
    {
        $vue = new Vue("AdministrationProduit");
        $vue->generer(array('add_produit_code' => $this->add_produit_code));
    }

}