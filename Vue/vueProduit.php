<?php if (isset($produit)) { ?>
    <div id="produit">
        <p id="phead">
            <?php echo $produit['nomProduit']; ?>
        </p>
        <?php if ($add_panier) { ?><p><strong>Produit ajouté au panier !</strong></p> <?php } ?>
        <img id="produitImage" src="<?php echo $produit['cheminimage']; ?>"/>
        <p id="decription1">description:</p>
        <p id="decription2">
            <?php echo $produit['description']; ?>
        </p>
        <p id="prix">
            Prix: <?php echo $produit['prix']; ?> €
        </p>
    </div>

    <div>
        <a href="?action=productCategorie&do=addPanier&id=<?php echo $produit['produitID']; ?>"><img id="panier"
                                                                                                     src="Images/panier.png"
                                                                                                     alt="panier"></a>
    </div>
<?php } ?>