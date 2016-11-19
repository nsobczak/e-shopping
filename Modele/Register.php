<?php

/**
 * Auteurs : Baudouin LANDAIS et Quentin LEVERT
 * Date : 04/11/2016
 */
class Register extends Modele
{

    //Constantes
    const FORM_INPUTS_ERROR = 1;
    const INVALID_MAIL_FORMAT = 2;
    const ALREADY_EXIST = 3;
    const REGISTER_OK = 4;
    const DATABASE_ERROR = 5;

    const SALT_REGISTER = "sel_php";


    //______________________________________________________________________________________
    /**
     * Fonction qui crée un nouvel utilisateur
     *
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $password
     * @return int
     */
    public function createNewUser($nom, $prenom, $mail, $password)
    {
        if ($this->userExist($mail))
            return Register::ALREADY_EXIST;
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
            return Register::INVALID_MAIL_FORMAT;

        $password_hash = sha1(Register::SALT_REGISTER . $password);
        try {
            $requete = "INSERT INTO `user` (`userID`, `nom`, `prenom`, `chemin`, `niveau_accreditation`, `mail`, `mot_de_passe`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
            $this->executerRequete($requete, array($nom, $prenom, 'Images/Profil/profil_utilisateur.jpg', '2', $mail, $password_hash));
            return Register::REGISTER_OK;
        } catch (PDOException $e) {
            return Register::DATABASE_ERROR;
        }
    }


    /**
     * Fonction qui regarde si l'utilisateur existe ou pas
     *
     * @param $mailUser
     * @return bool
     */
    public function userExist($mailUser)
    {
        $req = "SELECT * FROM user WHERE mail = ?";
        $user = $this->executerRequete($req, array($mailUser));
        if ($user->rowCount() >= 1) {
            return true;
        } else
            return false;
    }

}

?>