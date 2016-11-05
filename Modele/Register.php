<?php
/**
 * Auteurs : B. LANDAIS et Q. LEVERT
 * Date : 04/11/2016
 */

class Register extends Modele {

    public function createNewUser($nom, $prenom, $mail, $password) {
        if($this->userExist($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL))
            return false;
        $password_hash = sha1("sel_php" . $password);
        $requete = "INSERT INTO `user` (`userID`, `nom`, `prenom`, `niveau_accreditation`, `mail`, `mot_de_passe`) VALUES (NULL, ?, ?, ?, ?, ?)";
        $this->executerRequete($requete, array($nom, $prenom, '2', $mail, $password_hash));
        return true;
    }

    public function userExist($mailUser) {
        $req = "SELECT * FROM user WHERE mail = ?";
        $user = $this->executerRequete($req, array($mailUser));
        if ($user->rowCount() >= 1) {
            return true;
        }
        else
            return false;
    }

}

?>