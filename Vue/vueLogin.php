<?php
$titre = "Formulaire d'authentification";
?>


<body>
<div id="loginForm">
    <?php if ($login_code == UserLogin::LOGIN_OK) { ?>
        <h2><strong>Vous êtes connecté !</strong></h2>
    <?php } else {
    if ($login_code == UserLogin::FORM_INPUTS_ERROR) {
        ?> <h2><strong>Erreur lors de la saisie du formulaire (champ(s) manquant(s))!</strong></h2><?php
    } else if ($login_code == UserLogin::INVALID_MAIL_FORMAT) {
        ?> <h2><strong>Format de l'adresse mail incorrect!</strong></h2><?php
    } else if ($login_code == UserLogin::DOESNOT_EXIST) {
        ?> <h2><strong>L'utilisateur n'existe pas</strong></h2><?php
    } else if ($login_code == UserLogin::BAD_PASSWORD) {
        ?> <h2><strong>Mot de passe incorrect!</strong></h2><?php
    } else if ($login_code == UserLogin::DATABASE_ERROR) {
        ?> <h2><strong>Base de données indisponible actuellement!</strong></h2><?php
    }
    ?>

    <form action="index.php?action=logguer" method="post">
        <fieldset>
            <legend>Identifiez-vous</legend>
            <?php
            // Rencontre-t-on une erreur ?
            if (!empty($errorMessage)) {
                echo '<p>', htmlspecialchars($errorMessage), '</p>';
            }
            ?>
            <p>
                <label for="mail">E_Mail :</label>
                <input type="text" name="mail" id="mail" value=""/>
            </p>
            <p>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" value=""/>
                <input type="submit" name="submit" value="Se logguer"/>
            </p>
        </fieldset>
    </form>
</div>
<?php } ?>
</body>