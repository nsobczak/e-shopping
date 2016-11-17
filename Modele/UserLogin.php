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
    const BAD_PASSWORD = 4;
    const REGISTER_OK = 5;
    const DATABASE_ERROR = 6;

    const SALT_REGISTER = "sel_php";

    public function connectUser($mail, $password) {
        var_dump("je vais verifier que le user s'est bien enregistre avant dessayer de se logguer");
        if(!($this->userExist($mail))) {
            var_dump("le mail n'est pas enregistre");
            return UserLogin::DOESNOT_EXIST;
        }
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            var_dump("le mail n'est pas valide");
            return UserLogin::INVALID_MAIL_FORMAT;
        }

        var_dump("le mail est OK");
        $password_hash = sha1(UserLogin::SALT_REGISTER . $password);

        var_dump($password_hash);
        if(!$this->valid_password($mail, $password_hash)){
            return UserLogin::BAD_PASSWORD;
        }
        try {
            $user = $this->getUser($mail);
            return $user;
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
        var_dump("le mail existe-t-il ?");
        $sql = "SELECT * FROM user WHERE mail = ?";
        $user = $this->executerRequete($sql, array($mailUser));
        $occurrence_mail = $user->rowCount();
        var_dump("occurrence_mail : ".$occurrence_mail);
        if ($occurrence_mail == 1)
            return true;
        else
            return false;
    }
    public function valid_password($mail, $password_hash){
        var_dump("mdp valide ?");
        $sql = "SELECT * FROM user WHERE mail = ? AND mot_de_passe = ?";
        $user = $this->executerRequete($sql, array($mail, $password_hash));
        $occurrence = $user->rowCount();
        var_dump("nombre de match avec mon adrs et mdp : ".$occurrence);
        if ($occurrence == 1)
            return true;
        else
            return false;

    }

}