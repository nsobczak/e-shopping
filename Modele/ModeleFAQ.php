<?php

require_once('Modele.php');

/**
 * Created by PhpStorm.
 * User: Romain Vanmarcke & Vivien Valencourt
 * Date: 04/11/2016
 */
class ModeleFAQ extends Modele
{
    /**
     * Fonction qui récupère la liste des questions correspondant à la recherche
     *
     * @param $question
     * @return array|null
     */
    public function getQuestions($question)
    {
        $search = '%' . $question . '%';
        $sql = 'SELECT question, questionID FROM faq WHERE question LIKE ?';
        $quest = $this->executerRequete($sql, array($search));
        if ($quest->rowCount() > 0) {
            return $quest->fetchAll();
        } else {
            return null;
        }
    }


    /**
     * Fonction qui récupère une question
     *
     * @param $questionID
     * @return mixed
     */
    public function getQuestion($questionID)
    {
        $sql = 'SELECT questionID, question, commentaires, nom, prenom FROM faq, user WHERE questionID = ? AND faq.userID = user.userID';
        $quest = $this->executerRequete($sql, array($questionID));
        return $quest->fetch();
    }


    /**
     * Fonction qui récupère la liste des questions
     *
     * @return PDOStatement
     */
    public function getAllQuestions()
    {
        $sql = "SELECT * FROM faq";
        $questions = $this->executerRequete($sql);
        return $questions;
    }


    /**
     * Fonction qui ajoute une nouvelle question
     *
     * @param $question
     * @param $commentaires
     * @param $userID
     */
    public function insertQuest($question, $commentaires, $userID)
    {
        $insSql = 'INSERT INTO `faq` (`questionID`, `question`, `commentaires`, `userID`) VALUES (NULL, ?, ?, ?)';
        $insQuest = $this->executerRequete($insSql, array($question, $commentaires, $userID));
    }


    /**
     * Fonction qui récupère la liste des réponses
     *
     * @param $questionID
     * @return PDOStatement
     */
    public function getReponses($questionID)
    {
        $sql = 'SELECT reponse, nom, prenom FROM faq, faqreponses, user WHERE faq.questionID = faqreponses.questionID AND faq.questionID = ? AND faqreponses.userID = user.userID';
        $quest = $this->executerRequete($sql, array($questionID));
        return $quest;
    }


    /**
     * Fonction qui ajoute une réponse
     *
     * @param $reponse
     * @param $id
     * @param $questionID
     */
    public function insertRep($reponse, $id, $questionID)
    {
        $insSql = 'INSERT INTO `faqreponses` (`reponseID`, `reponse`, `userID`, `questionID`) VALUES (NULL, ?, ?, ?)';
        $insQuest = $this->executerRequete($insSql, array($reponse, $id, $questionID));
    }
}

?>