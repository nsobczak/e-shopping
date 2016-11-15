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

    public function logguerUser() {
        // Aucun champ n'est rempli => Le client vient de cliquer sur "Login ou Profil et il n'est pas connecté"
        // donc on affiche le formulaire
        if(empty($_POST['mail']) && empty($_POST['password']))
            $this->login_code = 0;
        elseif(empty($_POST['mail']) || empty($_POST['password']))
            $this->login_code = UserLogin::FORM_INPUTS_ERROR;
        elseif(!empty($_POST['mail']) && !empty($_POST['password']))
            $this->login_code = $this->userLogin->connectUser($_POST['mail'], $_POST['password']);

        $vue = new Vue("UserLogin");
        $vue->generer(array('login_code' => $this->login_code));
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
            this.$this->logguerUser();
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
    public function logguer(){
        this.$this->logguerUser();
    }

}





