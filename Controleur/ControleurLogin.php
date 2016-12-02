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
    //Attributs
    /**
     * @var int
     */
    private $login_code;
    /**
     * @var UserLogin
     */
    private $userLogin;


    //______________________________________________________________________________________
    /**
     * ControleurLogin constructor.
     */
    public function __construct()
    {
        $this->login_code = 0;
        $this->userLogin = new UserLogin();
    }

    /**
     * Getter de login_code
     *
     * @return int login_code
     */
    public function getLogin_code()
    {
        return $this->login_code;
    }

    /**
     * Getter de userLogin
     *
     * @return UserLogin
     */
    public function getUserLogin()
    {
        return $this->userLogin;
    }

    /**
     * Setter de login_code
     *
     * @param $newLogin_code
     */
    public function setLogin_code($newLogin_code)
    {
        $this->login_code = $newLogin_code;
    }

    /**
     * Setter de userLogin
     *
     * @param $newUserLogin
     */
    public function setUserLogin($newUserLogin)
    {
        $this->userLogin = $newUserLogin;
    }


    //______________________________________________________________________________________
    /**
     * Fonction qui deconnecte l'utilisateur et le redirige vers la page d'accueil
     */
    public function logOut()
    {
        if (isset($_SESSION['userID'])) {
            session_destroy();
            header('Location: index.php');
            die();
        }
    }


    /**
     * Fonction qui logue un utilisateur
     */
    public function logguerUser()
    {
        // Aucun champ n'est rempli => Le client vient de cliquer sur "Login ou Profil et il n'est pas connecté"
        // donc on affiche le formulaire
        $vue = new Vue("Login");
        if (isset($_POST)) {
            if (empty($_POST['mail']) && empty($_POST['password'])) {
                $this->login_code = 0;
            } elseif (empty($_POST['mail']) || empty($_POST['password'])) {
                $this->login_code = UserLogin::FORM_INPUTS_ERROR;
            } elseif (!empty($_POST['mail']) && !empty($_POST['password'])) {
                $this->login_code = $this->userLogin->connectUser($_POST['mail'], $_POST['password']);
                if ($this->login_code == UserLogin::LOGIN_OK) {
                    header('Location: index.php?action=userProfile');
                    die();
                }
            }
        }
        $vue->generer(array('login_code' => $this->login_code));
    }


    /**
     * Affiche la vue
     */
    public function getHTML()
    {
        // si l'utilisateur est connecte
        if (isset($_SESSION['userID'])) {
            header('Location: index.php?action=userProfile');
            die();
        } // sinon redirection vers la page de login
        else {
            $this->logguerUser();
        }

    }


    /**
     * Fonction qui renvoie les informations sur un utilisateur
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

}





