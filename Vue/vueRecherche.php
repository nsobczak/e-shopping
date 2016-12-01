<?php
/**
 * Auteur: Baudouin Landais
 */
?>

<div id="recherche">
    <form action="index.php?action=recherche" method="post">
        Recherchez un produit :
        <input type="text" name="searchName" placeholder="Nom du produit"/>
        <input type="submit" value="Valider"/>
    </form>
    <hr>
    <?php if (!empty($error)) {
        ?> <h5>Aucun produit ne correspond à cette recherche</h5> <?php
    } ?>
    <?php if (!empty($produitsSearch)) {
        foreach ($produitsSearch as $produit) { ?>
            <ul>
                <li>
                    <a href="index.php?action=productCategorie&id=<?php echo $produit['produitID']; ?>"><?php echo $produit['nomProduit']; ?></a>
                </li>
            </ul>
        <?php }
    } ?>
</div>
