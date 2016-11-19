<?php
/**
 * Auteur: Baudouin Landais
 */

require_once('Modele/Register.php');
require_once('Modele/Recherche.php');

class ControleurRecherche implements Controleur
{

    private $recherche;

    public function __construct()
    {
        $this->recherche = new Recherche();
    }

    public function getSearchModule() {
        if(empty($_POST['produitName'])) {
        }
    }

    /**
     * Fonction qui affiche la vue
     */
    public function getHTML()
    {
        $vue = new Vue("Recherche");
        if (!empty($_POST['searchName'])) {
            $produitsList = $this->recherche->getProduitByName($_POST['searchName']);
            if (count($produitsList) == 1) { // Il n'a trouvé qu'un seul produit
                header('Location: index.php?action=productCategorie&id=' . $produitsList[0]['produitID']); // TODO
                die();
            } else {
                $vue->generer(array("produitsSearch" => $produitsList));
            }
        }
        else
            $vue->generer(array("produitsSearch" => ""));
    }
}

?>
