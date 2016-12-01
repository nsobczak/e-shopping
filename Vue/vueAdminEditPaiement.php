<?php
/**
 * User: Baudouin LANDAIS
 * Date: 08/11/2016
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

<hr>
<h3>Edition de <?php echo $paiement['nomMoyenDePaiement']; ?> :</h3>
<form action="?action=adminPaiementLivraison&do=editPaiement&paiementID=<?php echo $paiement['moyenDePaiementID']; ?>"
      method="post">
    <label for="nomPaiementLivraison">Name :</label>
    <input type="text" name="nomPaiementLivraison" placeholder="Nom du moyen de paiement/livraison"
           value="<?php echo $paiement['nomMoyenDePaiement']; ?>"/><br>
    <label for="descriptionPaiementLivraison">Description :</label><br>
    <textarea name="descriptionPaiementLivraison" rows="15"
              cols="100"><?php echo $paiement['descriptionMoyenDePaiement']; ?></textarea><br>
    <input type="submit" value="Editer"/>
</form>