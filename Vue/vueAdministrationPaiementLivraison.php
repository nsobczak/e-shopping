<?php
/**
 * User: Baudouin LANDAIS
 * Date: 06/11/2016
 */
?>

<?php if(count($listMoyensPaiement) >= 1) { ?>
<h3>Gestion des moyens de paiement</h3>
<ul>
<?php foreach ($listMoyensPaiement as $moyenPaiement) { ?>
    <li><a href="?action=adminPaiementLivraison&paiementID=<?php echo $moyenPaiement['moyenDePaiementID']; ?>"><?php echo $moyenPaiement['nomMoyenDePaiement']; ?></a></li>
<?php } ?>
</ul>
<?php } ?>

<?php if(count($listModesLivraison) >= 1) { ?>
<h3>Gestion des modes de livraison</h3>
<ul>
    <?php foreach ($listModesLivraison as $modeLivraison) { //TODO ?>
        <li><a href="?action=adminPaiementLivraison&livraisonID=<?php echo $modeLivraison['']; ?>"><?php echo $modeLivraison['']; ?></a></li>
    <?php } ?>
</ul>
<?php } ?>

<!-- Partie ajout d'un mode de livraison ou d'un moyen de paiement !-->
<hr>
<h3>Ajouter un nouveau moyen de paiement ou de mode de livraison</h3>
<form action="?action=adminPaiementLivraison" method="post">
    <label for="type_mode">Type de l'ajout: </label>
    <input type="radio" name="type_mode" value="paiement"> Moyen de paiement
    <input type="radio" name="type_mode" value="livraison"> Mode de livraison<br>
    <label for="nomPaiementLivraison">Name :</label>
    <input type="text" name="nomPaiementLivraison" placeholder="Nom du moyen de paiement/livraison" /><br>
    <label for="descriptionPaiementLivraison">Description :</label><br>
    <textarea name="descriptionPaiementLivraison" rows="10" cols="75"></textarea><br>
    <input type="submit" value="Envoyer" />
</form>