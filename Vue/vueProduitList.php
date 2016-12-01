<?php
//create by : Guillaume vandierdonck & Qi You

?>

<body>
<?php
if (empty($ProduitList)) {
    echo "<strong>Aucun produit dans cette sous catégorie</strong>";
} else {
    foreach ($ProduitList as $Produit) { ?>
        <div class="produit_list">
            <div class="image_produit">
                <a href="?action=productCategorie&id=<?php echo $Produit['produitID']; ?>"><img class="display"
                                                                                                src="<?= $Produit['cheminimage']; ?>"
                                                                                                alt="image produit"/></a>
            </div>
            <div class="content_produit">
                <a href="?action=productCategorie&id=<?php echo $Produit['produitID']; ?>"><span><strong><?= $Produit['nomProduit']; ?></strong></span></a>
                <hr>
                <span class="description">
                <?= $Produit['description']; ?>
            </span>
            </div>
        </div>
    <?php }
}
?>


</body>