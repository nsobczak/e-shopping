<?php

require_once('Modele.php');

/**
 * Created by PhpStorm.
 * User: Romain Vanmarcke & Vivien Valencourt
 * Date: 04/11/2016
 */
class AdministrationUser extends Modele
{

    /** Renvoie les informations sur un utillisateur
     *
     * @param int $id L'identifiant de l'utilisateur
     * @return array L'utilisateur
     * @throws Exception Si l'identifiant de l'utilisateur est inconnu
     */
    public function getUser($userID)
    {
        $sql = 'SELECT userID AS id, nom, prenom, chemin, niveau_accreditation, mail, mot_de_passe FROM user WHERE userID=?';
        $user = $this->executerRequete($sql, array($userID));
        if ($user->rowCount() == 1)
            return $user->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond à l'identifiant '$userID'");
    }

    public function getUserList()
    {
        $sql = "SELECT * FROM user";
        $user = $this->executerRequete($sql);
        return $user;
    }

    public function updateUserStatus($userID, $level)
    {
        $sql = "UPDATE user SET niveau_accreditation = ? WHERE userID = ?";
        $this->executerRequete($sql, array($level, $userID));
    }

    /**
     * Fonction qui...
     *
     * @param $userID
     * @return int
     */
    public function deleteUser($userID)
    {
        // TODO
        $sql = "DELETE FROM user WHERE userID = ?";
        $this->executerRequete($sql, array($userID));
        // return AdministrationPaiementLivraison::ACTION_OK;
    }
}

?>