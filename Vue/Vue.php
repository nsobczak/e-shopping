<?php

/**
 * Created by PhpStorm.
 * User: Nicolas Sobczak & Vincent Reynaert
 * Date: 21/10/2016
 */
class Vue
{

    /**
     * @var string : Nom du fichier associé à la vue
     */
    private $fichier;
    /**
     * @var : Titre de la vue (défini dans le fichier vue)
     */
    private $titre;

    private $categories;


    //______________________________________________________________________________________
    /**
     * Constructeur
     *
     * @param $action
     */
    public function __construct($action)
    {
        // Détermination du nom du fichier vue à partir de l'action
        $this->fichier = "Vue/vue" . $action . ".php";
        $this->categories = new Produit();
    }


    /**
     * Fonction qui génère et affiche la vue
     *
     * @param $donnees
     */
    public function generer($donnees)
    {
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererFichier('Vue/gabarit.php',
            array('titre' => $this->titre, 'contenu' => $contenu, 'categories' => $this->categories->getCategories())
        );
        // Renvoi de la vue au navigateur
        echo $vue;
    }


    /**
     * Fonction qui génère un fichier vue et renvoie le résultat produit
     *
     * @param $fichier
     * @param $donnees
     */
    private function genererFichier($fichier, $donnees)
    {
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $fichier;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        } else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }

}