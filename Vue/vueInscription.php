<?php
/*
 * Auteurs : Baudouin LANDAIS et Quentin LEVERT
 * Date : 04 / 11 / 2016
 */
?>

    <div id="registerForm">
<?php if ($register_code == Register::REGISTER_OK) { ?>
    <h2><strong>Inscription reussie !</strong></h2>
<?php } else {
    if ($register_code == Register::FORM_INPUTS_ERROR) {
        ?> <h2><strong>Erreur lors de la saisie du formulaire (champ(s) manquant(s))!</strong></h2><?php
    } else if ($register_code == Register::INVALID_MAIL_FORMAT) {
        ?> <h2><strong>Format de l'adresse mail incorrect!</strong></h2><?php
    } else if ($register_code == Register::ALREADY_EXIST) {
        ?> <h2><strong>Adresse mail déjà utilisée!</strong></h2><?php
    } else if ($register_code == Register::DATABASE_ERROR) {
        ?> <h2><strong>Base de données indisponible actuellement!</strong></h2><?php
    }
    ?>
    <form action="?action=inscription" method="POST">
        Nom : <input type="text" name="nom" placeholder="Nom"/><br/>
        Prénom : <input type="text" name="prenom" placeholder="Prénom"/><br/>
        Adresse e-mail : <input type="text" name="mail" placeholder="example@mail.com"/><br/>
        Mot de passe : <input type="password" name="password" placeholder="Mot de passe"/><br/>
        <input type="submit" value="Envoyer"/>
    </form>
    </div>
<?php } ?>