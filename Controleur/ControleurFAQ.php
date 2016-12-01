<?php

/**
 * Created by PhpStorm.
 * User: Romain Vanmarcke & Vivien Valencourt
 * Date: 04/11/2016
 */
//________________________________________________________________________________________
// Require once
require_once 'Controleur/Controleur.php';
require_once 'Vue/Vue.php';
require_once 'Modele/ModeleFAQ.php';

class ControleurFAQ implements Controleur
{

    /**
     * @var
     */
    private $question;

    //______________________________________________________________________________________
    /**
     * ControleurFAQ constructor.
     */
    public function __construct()
    {
        $this->question = new ModeleFAQ();
    }

    /**
     * Getter de $question
     *
     * @return ModeleFAQ
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Setter de $question
     *
     * @param $newQuestion
     */
    public function setQuestion($newQuestion)
    {
        $this->question = $newQuestion;
    }

    //______________________________________________________________________________________
    /**
     * Fonction qui appelle toutes les autres fonctions
     *
     * @param $userID
     */
    public function handlerFAQ()
    {
        $this->insertQuestion();
        $this->insertReponse();
        $this->getHTML();       // fonction appelée pour générer le code HTML de la page 
    }

    /**
     * Fonction qui récupère la liste des questions et réponses
     *
     * @return array|null|PDOStatement
     */
    public function getResearch()
    {
        if (isset($_POST['research'])) {
            $research = $_POST['research'];
            $listQuestions = $this->question->getQuestions($research);
        } else {
            $listQuestions = $this->question->getAllQuestions();
        }
        return $listQuestions;
    }

    /**
     * Affiche la page de FAQ
     */
    public function getHTML()
    {
        $vue = new Vue("FAQ");
        if (isset($_GET['question'])) {
            $listQuestions = $this->question->getQuestion($_GET['question']);
            $listReponses = $this->question->getReponses($_GET['question']);
            $vue->generer(array('listQuestions' => $listQuestions, 'listReponses' => $listReponses));
        } else {
            $listQuestions = $this->getResearch();
            $vue->generer(array('listQuestions' => $listQuestions));
        }
    }

    /**
     * Fonction qui ajoute une nouvelle question
     */
    public function insertQuestion()
    {
        if (isset($_POST['sbButton2'])) {
            if (isset($_SESSION['userID'])) {
                $id = $_SESSION['userID'];
                $this->question->insertQuest($_POST['question'], $_POST['commentaires'], $id);
            } else {
                header("location: http://localhost/e-shopping/index.php?action=login");
            }
        }
    }

    /**
     * Fonction qui ajoute une nouvelle reponse
     */
    public function insertReponse()
    {
        if (isset($_POST['sbButton3'])) {
            if (isset($_SESSION['userID'])) {
                $id = $_SESSION['userID'];
                $this->question->insertRep($_POST['reponse'], $id, $_GET['question']);
            } else {
                header("location: http://localhost/e-shopping/index.php?action=login");
            }
        }
    }
}
