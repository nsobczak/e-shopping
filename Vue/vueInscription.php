<?php
/*
 * Auteurs : B. LANDAIS et Q. LEVERT
 * Date : 04 / 11 / 2016
 */
?>

    <div id="registerForm">
<?php if($register_ok) { ?>
    <h2><strong>Inscription reussie !</strong></h2>
<?php } else {
    if(!empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['mail']) || !empty($_POST['password'])) {
        ?> <h2><strong>Erreur lors de la saisie du formulaire ou utilisateur déjà existant !</strong></h2><?php
    }
    ?>
    <form action="?action=inscription" method="POST">
        Nom : <input type="text" name="nom" placeholder="Nom" /><br />
        Prénom : <input type="text" name="prenom" placeholder="Prénom" /><br />
        Adresse e-mail : <input type="text" name="mail" placeholder="example@mail.com" /><br />
        Mot de passe : <input type="password" name="password" placeholder="Mot de passe" /><br />
        <input type="submit" value="Envoyer" />
    </form>
    </div>
<?php } ?>