<?php

/*
 * Auteurs : B. LANDAIS et Q. LEVERT
 * Date : 04 / 11 / 2016
 */

require_once('Modele/Register.php');

class ControleurInscription implements Controleur {
    private $register_ok;
    private $register;

    public function __construct() {
        $this->register_ok = false;
        $this->register = new Register();
    }

    public function registerUser() {
        if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['password'])) {
            $this->register_ok = $this->register->createNewUser($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['password']);
        }
        else
            $this->register_ok = false;
        $this->getHTML();
    }

    // Affiche la page d'erreur
    public function getHTML()
    {
        $vue = new Vue("Inscription");
        $vue->generer(array('register_ok' => $this->register_ok));
    }

}

?>