<?php

require_once('Modele.php');

/**
 * Created by PhpStorm.
 * User: Romain Vanmarcke & Vivien Valencourt
 * Date: 04/11/2016
 */
class AdministrationUser extends Modele
{

    /**
     * Renvoie les informations sur un utillisateur
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


    /**
     * Fonction qui renvoie la liste des utilisateurs.
     *
     * @return PDOStatement
     */
    public function getUserList()
    {
        $sql = "SELECT * FROM user";
        $user = $this->executerRequete($sql);
        return $user;
    }


    /**
     * Fonction qui met à jour le niveau d'accréditation d'un utilisateur
     *
     * @param $userID : l'id du user que l'ont veut modifier
     * @param $level : le nouveau niveau d'accréditation
     */
    public function updateUserStatus($userID, $level)
    {
        $sql = "UPDATE user SET niveau_accreditation = ? WHERE userID = ?";
        $this->executerRequete($sql, array($level, $userID));
    }


    /**
     * Fonction qui supprime un utilisateur de la base de données
     *
     * @param $userID :l'id du user que l'ont veut supprimer
     */
    public function deleteUser($userID)
    {
        $sql = "DELETE FROM user WHERE userID = ?";
        $this->executerRequete($sql, array($userID));
    }
}

?>