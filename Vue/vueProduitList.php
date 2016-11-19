<?php
//create by : Guillaume vandierdonck & Qi You

?>

<body>


<?php foreach ($ProduitList as $Produit) { ?>
    <table width="95%" style="line-height: 24px;" border="10">
        <tr>
            <td style="width: 200px;"> Produit ID :</td>
            <td><?= $Produit['produitID'] ?></td>
        </tr>
        <tr>
            <td> NomProduit :</td>
            <td><?= $Produit['nomProduit']; ?></td>
        </tr>
        <tr>
            <td> prix :</td>
            <td><?= $Produit['prix'] ?></td>
        </tr>
        <tr>
            <td> Description :</td>
            <td><?= $Produit['description']; ?></td>
        </tr>
        <tr>
            <td> Picture :</td>
            <td colspan="2"><img class="display" width=30%
                                 src=<?= $Produit['cheminimage']; ?> alt="reaper.jpg" title="repaer"/>
            </td>
        </tr>

    </table>
<?php } ?>


</body>