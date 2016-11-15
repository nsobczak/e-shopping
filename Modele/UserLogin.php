<?php

require_once('Modele.php');

/**
 * Created by PhpStorm.
 * User: Nicolas Sobczak & Vincent Reynaert
 * Date: 02/11/2016
 */
class UserLogin extends Modele
{
    const FORM_INPUTS_ERROR = 1;
    const INVALID_MAIL_FORMAT = 2;
    const DOESNOT_EXIST = 3;
    const REGISTER_OK = 4;
    const DATABASE_ERROR = 5;

    const SALT_REGISTER = "sel_php";

    public function connectUser($mail, $password) {
        if(!$this->userExist($mail))
            return UserLogin::DOESNOT_EXIST;
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
            return UserLogin::INVALID_MAIL_FORMAT;

        $password_hash = sha1(UserLogin::SALT_REGISTER . $password);
        try {
            this.$this->getUser($mail);
            return UserLogin::REGISTER_OK;
        }
        catch(PDOException $e) {
            return UserLogin::DATABASE_ERROR;
        }
    }

    /** Renvoie les informations sur un utillisateurs
     *
     * @param int $id L'identifiant de l'utilisateur
     * @return array L'utilisateur
     * @throws Exception Si l'identifiant de l'utilisateur est inconnu
     */
    public function getUser($mailUser)
    {
        $sql = 'SELECT userID, niveau_accreditation, mail, mot_de_passe '.
            'from user where mail=?';
        $user = $this->executerRequete($sql, array($mailUser));
        if ($user->rowCount() == 1)
            return $user->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond au mail '$mailUser'");
    }

    public function userExist($mailUser) {
        $sql = "SELECT * FROM user WHERE mail = ?";
        $user = $this->executerRequete($sql, array($mailUser));
        if ($user->rowCount() >= 1) {
            return true;
        }
        else
            return false;
    }

}