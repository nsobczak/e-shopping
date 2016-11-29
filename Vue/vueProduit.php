<?php
$bdd = new PDO('mysql:host=localhost; dbname=db_e_shopping; charset=utf8', 'root', '');
$query1 = "Select * from produit where produitID=:produitID";
$req1 = $bdd->prepare($query1);
$req1->execute(array('produitID' => $_GET["id"]));

while ($row1 = $req1->fetch()) {
    $a = $row1['produitID'];
    $b = $row1['nomProduit'];
    $c = $row1['prix'];
    $d = $row1['description'];
    $e = $row1['cheminimage'];
    $id = $row1['sousCategorieID'];

    ?>


    <div id="produit">
        <p id="phead">
            <?php echo $b; ?>
        </p>
        <img id="produitImage" src="<?php echo $e; ?>"/>
        <p id="decription1">description:</p>
        <p id="decription2">
            <?php echo $d; ?>
        </p>
        <p id="prix">
            Prix:<?php echo $c; ?>
        </p>
    </div>

    <div>
        <a href="#"><img id="panier" src="Images/panier.png" alt="panier"></a>

    </div>


<?php }
$req1->closeCursor();
?>