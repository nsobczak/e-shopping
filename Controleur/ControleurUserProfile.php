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
    private $code_update_password;


    //______________________________________________________________________________________
    /**
     * ControleurUserProfile constructor.
     */
    public function __construct()
    {
        $this->user = new UserProfile();
        $this->code_update_password = 0; // code par défaut : rien n'a été envoyé
    }

    /**
     * Getter du user
     *
     * @return UserProfile
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Setter du user
     *
     * @param $newUser
     */
    public function setUser($newUser)
    {
        $this->user = $newUser;
    }


    //______________________________________________________________________________________
    /**
     * Gestionnaire principal de la page d'administration pour la livraison
     * ainsi que pour les modes de livraison, les vérifications des variables
     * se feront ici + appel de la page HTML
     */
    public function handlerUserProfile()
    {
        $this->changeUserPassword();
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
                'code' => $this->code_update_password,
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
        if(empty($_SESSION['userID'])) // pas connecté
            return;
        if(empty($_POST['old_password']) && empty($_POST['new_password'])) {
            $this->code_update_password = 0; // par défaut
        }
        else if(empty($_POST['old_password']) || empty($_POST['new_password'])) {
            $this->code_update_password = UserProfile::PASSWORD_UPDATE_FORM_INVALID;
        }
        else if(!empty($_POST['old_password']) && !empty($_POST['new_password'])) {
            $user = $this->user->getUser($_SESSION['userID']);
            if ($user != null) {
                if ($user['mot_de_passe'] != sha1(UserLogin::SALT_REGISTER . $_POST['old_password'])) {
                    $this->code_update_password = UserProfile::PASSWORD_UPDATE_BAD_OLD_PASSWORD;
                } else {
                    $this->code_update_password = $this->user->updatePassword(sha1(UserLogin::SALT_REGISTER . $_POST['new_password']), $_SESSION['userID']);
                }
            }
            else
                $this->code_update_password = UserProfile::PASSWORD_UPDATE_USER_ERROR;
        }
    }
}
