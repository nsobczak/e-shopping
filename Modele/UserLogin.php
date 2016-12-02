<?php

require_once('Modele.php');

/**
 * Created by PhpStorm.
 * User: Nicolas Sobczak & Vincent Reynaert
 * Date: 02/11/2016
 */
class UserLogin extends Modele
{
    //Constantes
    const FORM_INPUTS_ERROR = 1;
    const INVALID_MAIL_FORMAT = 2;
    const DOESNOT_EXIST = 3;
    const BAD_PASSWORD = 4;
    const LOGIN_OK = 5;
    const DATABASE_ERROR = 6;

    const SALT_REGISTER = "sel_php";


    //______________________________________________________________________________________
    /**
     * Fonction qui verifie que le user s'est bien enregistré avant d'essayer de le logguer
     *
     * @param $mail
     * @param $password
     * @return array|int
     */
    public function connectUser($mail, $password)
    {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return UserLogin::INVALID_MAIL_FORMAT;
        }

        $password_hash = sha1(UserLogin::SALT_REGISTER . $password);

        try {
            return $this->valid_password($mail, $password_hash);
        } catch (PDOException $e) {
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
        $sql = 'SELECT userID, niveau_accreditation, mail, mot_de_passe ' .
            'from user where mail=?';
        $user = $this->executerRequete($sql, array($mailUser));
        if ($user->rowCount() == 1)
            return $user->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond au mail '$mailUser'");
    }


    /**
     * Fonction qui regarde si l'utilisateur existe ou pas
     *
     * @param $mailUser
     * @return bool
     */
    public function userExist($mailUser)
    {
        $sql = "SELECT * FROM user WHERE mail = ?";
        $user = $this->executerRequete($sql, array($mailUser));
        $user_object = $user->fetchAll()[0];
        $occurrence_mail = $user->rowCount();
        if ($occurrence_mail == 1)
            return true;
        else
            return false;
    }


    /**
     * Fonction qui regarde si un mot de passe est valide ou non
     *
     * @param $mail
     * @param $password_hash
     * @return bool
     */
    public function valid_password($mail, $password_hash)
    {
        try {
            $user_param = $this->getUser($mail);
            if ($user_param['mot_de_passe'] == $password_hash) {
                $_SESSION['userID'] = $user_param['userID'];
                $_SESSION['niveau_accreditation'] = $user_param['niveau_accreditation'];
                return UserLogin::LOGIN_OK;
            } else
                return UserLogin::BAD_PASSWORD;
        } catch (Exception $e) {
            return UserLogin::DOESNOT_EXIST;
        }
    }

}