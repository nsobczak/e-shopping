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
    private $user;

    public function __construct()
    {
        $this->user = new UserProfile();
    }

    // Affiche la page d'accueil
    public function getHTML()
    {
        $vue = new Vue("UserProfile");
        $base = $this->displayUserProfile(5);

        // selection de l'image
        if (!is_null($base[3])) {
            $cheminImage = $base[3];
        } else {
            $cheminImage = 'Images/Profil/profil_utilisateur.jpg';
        }
        $replacements = array(3 => $cheminImage);
        $userProfile = array_replace($base, $replacements);

        $vue->generer($userProfile);
    }

    /** Renvoie les informations sur un utilisateurs
     *
     * @param int $userID L'identifiant de l'utilisateur
     * @return array L'utilisateur
     */
    public function displayUserProfile($userID)
    {
        $user = new UserProfile();
        $result = $user->getUser($userID);
        return $result;
    }
}