<!-- /**
 * Created by PhpStorm.
 * User: Romain Vanmarcke & Vivien Valencourt
 * Date: 04/11/2016
 */
//________________________________________________________________________________________ -->
<?php if (isset($_GET['question'])) { ?>
    <div class="FAQ">
        <h1>Question : <?php echo $listQuestions['question'] ?></h1>
        <h5>par : <?php echo $listQuestions['prenom'] . ' ' . $listQuestions['nom'] ?></h5>
        <p><h4>Commentaires :</h4><?php echo $listQuestions['commentaires'] ?></p>
        <?php foreach ($listReponses as $rep) { ?>
            <h4>Réponse de : <?php echo $rep['prenom'] . ' ' . $rep['nom'] ?></h4>
            <p><?php echo $rep['reponse'] ?></p>
        <?php } ?>
        </br>
        <h4>Répondez à <?php echo $listQuestions['prenom'] . ' ' . $listQuestions['nom'] ?></h4>
        <form action="index.php?action=faq&question=<?php echo $listQuestions['questionID'] ?>" method="post">
            <textarea name="reponse" required="required"></textarea>
            <input type="submit" name="sbButton3">
        </form>
    </div>
<?php } else { ?>
    <div class="subfaq">
        <div class="FAQ">
            <h1>Bienvenue sur la page FAQ</h1>
            <form action="index.php?action=faq" method="post">
                <input type="text" name="research" placeholder="Rechercher" required="required">
                <input type="submit" name="sbButton">
            </form>
            <ul>
                <?php if (!empty($listQuestions)) {
                    foreach ($listQuestions as $question) { ?>
                        <li>
                            <a href="index.php?action=faq&question=<?php echo $question['questionID'] ?>"><?php echo $question['question'] ?></a>
                        </li>
                    <?php }
                } else { ?>
                    <h4>Aucune question ne correspond à cette recherche</h4>
                <?php } ?>
            </ul>
        </div>
        <div class="FAQ">
            <form action="index.php?action=faq" method="post">
                <h3>Posez votre question :</h3>
                <div class="faq">
                    Question :
                    <input type="text" name="question" required="required">
                </div>
                <div class="faq">
                    Commentaires :
                    <textarea name="commentaires" required="required"></textarea>
                </div>
                <input type="submit" name="sbButton2">
            </form>
        </div>
    </div>
<?php } ?>