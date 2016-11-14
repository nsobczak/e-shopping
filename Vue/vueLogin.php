<?php
$titre = "Formulaire d'authentification";
?>


<body>
    <form action="index.php?action=login" method="post">
        <fieldset>
            <legend>Identifiez-vous</legend>
            <?php
            // Rencontre-t-on une erreur ?
            if(!empty($errorMessage))
            {
                echo '<p>', htmlspecialchars($errorMessage) ,'</p>';
            }
            ?>
            <p>
                <label for="email">E_Mail :</label>
                <input type="text" name="email" id="email" value="" />
            </p>
            <p>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" value="" />
                <input type="submit" name="submit" value="Se logguer" />
            </p>
        </fieldset>
    </form>
</body>