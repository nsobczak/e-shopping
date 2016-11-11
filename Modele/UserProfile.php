<?php

require_once('Modele.php');

/**
 * Created by PhpStorm.
 * User: Nicolas Sobczak & Vincent Reynaert
 * Date: 02/11/2016
 */
class UserProfile extends Modele
{
    /** Renvoie les informations sur un utillisateurs
     *
     * @param int $id L'identifiant de l'utilisateur
     * @return array L'utilisateur
     * @throws Exception Si l'identifiant de l'utilisateur est inconnu
     */
    public function getUser($userID)
    {
        $sql = 'select userID, nom, prenom, chemin, niveau_accreditation, mail, mot_de_passe from user where userID=?';
        $user = $this->executerRequete($sql, array($userID));
        if ($user->rowCount() == 1)
            return $user->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond à l'identifiant '$userID'");
    }


    /** Enregistre une image sur le serveur et change le chemin de l'image de l'utilisateur
     *
     * @param file $fichier L'image à télécharger
     * @param int $userID L'identifiant correspondant à l'utilisateur
     */
    public function uploadPicture($fichier, $userID)
    {
        // Constantes
        define('TARGET', 'Images/Profil)');    // Repertoire cible
        define('MAX_SIZE', 100000000);    // Taille max en octets du fichier
        define('WIDTH_MAX', 8000);    // Largeur max de l'image en pixels
        define('HEIGHT_MAX', 8000);    // Hauteur max de l'image en pixels

        // Tableaux de donnees
        $tabExt = array('jpg', 'gif', 'png', 'jpeg');    // Extensions autorisees
        $infosImg = array();

        // Variables
        $extension = '';
        $message = '';
        $nomImage = '';
        var_dump("enter l'echo !!!");
        // Script d'upload
        // On verifie si le champ est rempli
        if (!empty($_FILES['fichier']['name'])) {
            // Recuperation de l'extension du fichier
            $extension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);

            // On verifie l'extension du fichier
            if (in_array(strtolower($extension), $tabExt)) {
                // On recupere les dimensions du fichier
                $infosImg = getimagesize($_FILES['fichier']['tmp_name']);

                // On verifie le type de l'image
                if ($infosImg[2] >= 1 && $infosImg[2] <= 14) {
                    // On verifie les dimensions et taille de l'image
                    if (($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE)) {
                        // Parcours du tableau d'erreurs
                        if (isset($_FILES['fichier']['error'])
                            && UPLOAD_ERR_OK === $_FILES['fichier']['error']
                        ) {
                            // On renomme le fichier
                            $nomImage = $userID . '.' . $extension;

                            // Si c'est OK, on teste l'upload
                            if (move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET . $nomImage)) {
                                $message = 'Upload réussi !';
                                //On met à jour le chemin dans la table
                                //updateChemin('TARGET' + $nomImage, $userID);
                            } else {
                                // Sinon on affiche une erreur systeme
                                $message = 'Problème lors de l\'upload !';
                            }
                        } else {
                            $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                        }
                    } else {
                        // Sinon erreur sur les dimensions et taille de l'image
                        $message = 'Erreur dans les dimensions de l\'image !';
                    }
                } else {
                    // Sinon erreur sur le type de l'image
                    $message = 'Le fichier à uploader n\'est pas une image !';
                }
            } else {
                // Sinon on affiche une erreur pour l'extension
                $message = 'L\'extension du fichier est incorrecte !';
            }
        } else {
            // Sinon on affiche une erreur pour le champ vide
            $message = 'Veuillez remplir le formulaire svp !';
        }
    }

    public function updateChemin($newPath, $userID) {
        $sql = "UPDATE chemin SET chemin = ? WHERE $userID = ?";
        $this->executerRequete($sql, array($newPath, $userID));
    }

}