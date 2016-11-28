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
require_once 'Modele/UserProfile.php';

class ControleurUserProfile implements Controleur
{
    /**
     * @var UserProfile
     */
    private $user;


    //______________________________________________________________________________________
    /**
     * ControleurUserProfile constructor.
     */
    public function __construct()
    {
        $this->user = new UserProfile();
    }


    /**
     * Gestionnaire principal de la page d'administration pour la livraison
     * ainsi que pour les modes de livraison, les vérifications des variables
     * se feront ici + appel de la page HTML
     */
    public function handlerUserProfile()
    {
        $this->changeProfilePicture(); // vérification si changement de l'image
        $this->getHTML();
    }


    /**
     * Fonction qui affiche la page d'accueil
     */
    public function getHTML()
    {
        $vue = new Vue("UserProfile");

        // si l'uilisateur est connecte
        if (isset($_SESSION['userID'])) {
            $userID = $_SESSION['userID'];
            $vue->generer(array(
                'listUserProfile' => $this->user->getUser($userID),
            ));

        } // sinon redirection vers la page de login
        else {
            header('Location: index.php?action=login');
            die();
        }

    }


    /**
     * Fonction qui met à jour l'image de profil de l'utilisateur
     */
    public function changeProfilePicture()
    {
        // Faut pouvoir upload une image puis changer son chemin
        if (!empty($_POST['submit'])) {
            var_dump("uploadPicture");
            $this->user->uploadPicture($_POST['submit'], $_SESSION['userID']);
        }

    }

    /**
     * Fonction qui met à jour le mot de passe d'un utilisateur
     */
    public function changeUserPassword()
    {
        var_dump("password");


    }
}


/* brouillon
            // selection de l'image
        if (!is_null($base[3])) {
            $cheminImage = $base[3];
        } else {
            $cheminImage = 'Images/Profil/profil_utilisateur.jpg';
        }
        $replacements = array(3 => $cheminImage);
        $userProfile = array_replace($base, $replacements);
*/