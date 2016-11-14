<?php

/**
 * Created by PhpStorm.
 * User: Nicolas Sobczak & Vincent Reynaert
 * Date: 02/11/2016
 */
//________________________________________________________________________________________
// Require once
require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';
require_once 'Modele/UserLogin.php';

class ControleurLogin implements Controleur
{
    private $login_code;
    private $userLogin;


    public function __construct()
    {
        $this->login_code = 0;
        $this->userLogin = new UserLogin();
    }

    /** Selectionne la page a afficher
     *
     * @return int L'id de l'utilisateur s'il est connecte, -1 sinon
     */
    public function selectHTML()
    {
        if (isset($_SESSION))
        {
        $userID = $_SESSION['userID'];
        }
        else // Pour aller a la page de login
        {
          $userID = -1;
        }
        return $userID;
    }

    public function registerUser() {
        // Aucun champ n'est rempli => Le client vient de cliquer sur "Login ou Profil et il n'est pas connecté"
        // donc on affiche le formulaire
        if(empty($_POST['mail']) && empty($_POST['password']))
            $this->register_code = 0;
        elseif(empty($_POST['mail']) || empty($_POST['password']))
            $this->register_code = UserLogin::FORM_INPUTS_ERROR;
        elseif(!empty($_POST['mail']) && !empty($_POST['password']))
            $this->register_code = $this->register->createNewUser($_POST['mail'], $_POST['password']);
        $this->getHTML();
    }
    // Affiche la page d'accueil
    public function getHTML()
    {
        $userID = $this->selectHTML();

        // si l'utilisateur est connecte
        if ($userID >= 0) {
            header('Location: index.php?action=userProfile');
            die();
        } // sinon redirection vers la page de login
        else {
            $vue = new Vue("UserLogin");

            $vue->generer();
        }

    }

    /** Renvoie les informations sur un utilisateur
     *
     * @param int $userID L'identifiant de l'utilisateur
     * @return array L'utilisateur
     */
    public function displayUserLogin($userID)
    {
        $user = new UserLogin();
        $result = $user->getUser($userID);
        return $result;
    }

    /**
     *
     */
    public function login(){
        // Definition des constantes et variables
        define('LOGIN','toto');
        define('PASSWORD','tata');
        $errorMessage = '';

        // Test de l'envoi du formulaire
        if(!empty($_POST))
        {
            // Les identifiants sont transmis ?
            if(!empty($_POST['login']) && !empty($_POST['password']))
            {
                // Sont-ils les mêmes que les constantes ?
                if($_POST['login'] !== LOGIN)
                {
                    $errorMessage = 'Mauvais login !';
                }
                elseif($_POST['password'] !== PASSWORD)
                {
                    $errorMessage = 'Mauvais password !';
                }
                else
                {
                    // On ouvre la session
                    session_start();
                    // On enregistre le login en session
                    $_SESSION['login'] = LOGIN;
                    // On redirige vers le fichier admin.php
                    header('Location: index.php?action=userProfile');
                    exit();
                }
            }
            else
            {
                $errorMessage = 'Veuillez inscrire vos identifiants svp !';
            }
        }
    }

}





