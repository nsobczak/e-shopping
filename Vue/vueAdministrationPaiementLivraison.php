<?php
/**
 * User: Baudouin LANDAIS
 * Date: 06/11/2016
 */
?>

<?php if (count($listMoyensPaiement) >= 1) { ?>
    <h3>Gestion des moyens de paiement</h3>
    <ul>
        <?php foreach ($listMoyensPaiement as $moyenPaiement) { ?>
            <li>
                <a href="?action=adminPaiementLivraison&do=delete&paiementID=<?php echo $moyenPaiement['moyenDePaiementID']; ?>"
                   title="Supprimer">[✖]</a>
                <a href="?action=adminPaiementLivraison&paiementID=<?php echo $moyenPaiement['moyenDePaiementID']; ?>"><?php echo $moyenPaiement['nomMoyenDePaiement']; ?></a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>

<!-- Partie ajout d'un moyen de paiement !-->
<hr>
<?php if ($code == AdministrationPaiementLivraison::INVALID_PARAMETER) {
    echo '<h3 class="error">Paramètres invalides</h3>';
} elseif ($code == AdministrationPaiementLivraison::MISSING_PARAMETERS) {
    echo '<h3 class="error">Paramètres manquants</h3>';
} ?>
<h3>Ajouter un nouveau moyen de paiement</h3>
<form action="?action=adminPaiementLivraison" method="post">
    <label for="nomPaiementLivraison">Name :</label>
    <input type="text" name="nomPaiementLivraison" placeholder="Nom du moyen de paiement"/><br>
    <label for="descriptionPaiementLivraison">Description :</label><br>
    <textarea name="descriptionPaiementLivraison" rows="10" cols="75"></textarea><br>
    <input type="submit" value="Envoyer"/>
</form>