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
     * @var int $register_code
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

    /**
     * Getter de $register_code
     *
     * @return int $register_code
     */
    public function getRegister_code()
    {
        return $this->register_code;
    }

    /**
     * Getter de $register
     *
     * @return Register
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * Setter de $register_code
     *
     * @param $newRegister_code
     */
    public function setRegister_code($newRegister_code)
    {
        $this->login_code = $newRegister_code;
    }

    /**
     * Setter de $register
     *
     * @param $newRegister
     */
    public function setRegister($newRegister)
    {
        $this->login_code = $newRegister;
    }


    //______________________________________________________________________________________
    /**
     *  Fonction qui ajoute un utilisateur à la bdd
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