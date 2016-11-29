<?php
/**
 * Created by PhpStorm.
 * User: Quentin Levert
 * Date: 18/11/2016
 * Time: 14:56
 */
require_once('Modele/ChiffreAffaire.php');
require_once('Modele/UserLogin.php');
require_once('Vue/Vue.php');

class ControleurChiffreAffaire implements Controleur
{

    /**
     * @var ChiffreAffaire
     *
     */
    private $ChiffreAffaire;


    //______________________________________________________________________________________
    /**
     * ControleurChiffreAffaire constructor.
     */
    public function __construct()
    {
        $this->ChiffreAffaire = new ChiffreAffaire();
    }

    //TODO: getters et setters


    //______________________________________________________________________________________
    /**
     *  Fonction qui affiche la vue
     */
    public function getHTML()
    {
        $vue = new Vue("ChiffreAffaire");
        $vue->generer(array("CAFinal" => $this->ChiffreAffaire->getChiffreAffaire()));


    }

}