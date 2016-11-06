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

    /** Selectionne la page a afficher
     *
     * @return int L'id de l'utilisateur s'il est connecte, -1 sinon
     */
    public function selectHTML()
    {
//        if ("utilisateur loggé")
//        {
            $userID = 5;
//        }
//        else // Pour aller a la page de login
//        {
//          $userID = -1;
//        }
        return $userID;
    }

    // Affiche la page d'accueil
    public function getHTML()
    {
        $vue = new Vue("UserProfile");
        $userID = $this->selectHTML();

        // si l'uilisateur est connecte
        if ($userID >= 0){
            $userProfile = $this->displayUserProfile($userID);
            $vue->generer($userProfile);
        }
        // sinon redirection vers la page de login
        else
        {
            header('Location: index.php?action=login');
        }

    }

    /** Renvoie les informations sur un utilisateur
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