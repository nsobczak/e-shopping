<?php
/**
 * Auteur: Baudouin Landais
 * Date: 11/2016
 */

require_once('Modele/Register.php');
require_once('Modele/Recherche.php');

class ControleurRecherche implements Controleur
{

    /**
     * @var Recherche
     */
    private $recherche;


    //______________________________________________________________________________________
    /**
     * ControleurRecherche constructor.
     */
    public function __construct()
    {
        $this->recherche = new Recherche();
    }

    /**
     * Getter de $recherche
     *
     * @return Recherche
     */
    public function getRecherche()
    {
        return $this->recherche;
    }

    /**
     * Setter de $recherche
     *
     * @param $newRecherche
     */
    public function setRecherche($newRecherche)
    {
        $this->user = $newRecherche;
    }


    //______________________________________________________________________________________
    /**
     * Fonction qui... ???
     */
    public function getSearchModule()
    {
        if (empty($_POST['produitName'])) {
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
            if (isset($produitsList)) {
                if (count($produitsList) == 1) { // Il n'a trouvé qu'un seul produit
                    header('Location: index.php?action=productCategorie&id=' . $produitsList[0]['produitID']); // TODO
                    die();
                } else { // plusieurs produits
                    $vue->generer(array("produitsSearch" => $produitsList));
                }
            } else
                $vue->generer(array("error" => Recherche::NO_RESULT));
        } else
            $vue->generer(array("produitsSearch" => ""));
    }
}

?>
