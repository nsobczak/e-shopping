<?php

/**
 * Auteurs : Baudouin LANDAIS et Quentin LEVERT
 * Date : 04 / 11 / 2016
 */

require_once('Modele/Register.php');

class ControleurInscription implements Controleur
{
    //Attributs
    /**
     * @var int
     */
    private $register_code;
    /**
     * @var Register
     */
    private $register;


    //______________________________________________________________________________________
    /**
     * ControleurInscription constructor.
     */
    public function __construct()
    {
        $this->register_code = 0; // default value
        $this->register = new Register();
    }

    //TODO: getters et setters


    //______________________________________________________________________________________
    /**
     *  Fonction qui...
     */
    public function registerUser()
    {
        // Aucun champ n'est rempli => Le client vient de cliquer sur "Inscription" donc on affiche le formulaire
        if (empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['mail']) && empty($_POST['password']))
            $this->register_code = 0;
        elseif (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail']) || empty($_POST['password']))
            $this->register_code = Register::FORM_INPUTS_ERROR;
        elseif (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['password']))
            $this->register_code = $this->register->createNewUser($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['password']);
        $this->getHTML();
    }


    /**
     * Affiche la page d'inscription
     */
    public function getHTML()
    {
        $vue = new Vue("Inscription");
        $vue->generer(array('register_code' => $this->register_code));
    }

}

?>