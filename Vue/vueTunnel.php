<?php
/*
* User: Francis Polaert & Kévin Noet
* Date: 04/11/2016
*/
$bdd = new PDO('mysql:host=localhost; dbname=db_e_shopping; charset=utf8', 'root', '');
$paiemment = $bdd->query("SELECT * FROM moyendepaiement");
/*$lignepanier = $bdd->query("SELECT *
                            FROM lignepanier, panier, produit
                            WHERE panier.userID = ".$_SESSION['userID']."
                            AND panier.panierID = lignepanier.panierID
                            AND lignepanier.produitID = produit.produitID");*/
$lignepanier = $bdd->query("SELECT * 
							FROM lignepanier, panier, produit 
							WHERE panier.userID = 3
							AND panier.panierID = lignepanier.panierID
							AND lignepanier.produitID = produit.produitID
							AND panier.etatPanier = 0");
?>

<table>
    <?php
    while ($lignepanier_line = $lignepanier->fetch()) {
        ?>
        <tr>
            <td>
                Produit: <?php echo $lignepanier_line["nomProduit"] ?>
            </td>
            <td> |
            </td>
            <td>
                <img height="100px" src="<?php echo $lignepanier_line["cheminimage"] ?>"/>
            </td>
            <td> |
            </td>
            <td>
                Quantité: <?php echo $lignepanier_line["quantité"] ?>
            </td>
            <td> |
            </td>
            <td>
                Prix unitaire: <?php echo $lignepanier_line["prix"] ?>€
            </td>
            <td> |
            </td>
            <td>
                Prix total: <?php echo $lignepanier_line["prix"] * $lignepanier_line["quantité"] ?>€
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<form method="POST" action="index.php?action=vueTunnel">
    <table>

        <tr>
            <td>Numéro de rue</td>
            <td><input type="text" name="number"/></td>
        </tr>
        <tr>
            <td>Adresse</td>
            <td><input type="text" name="adress"/></td>
        </tr>
        <tr>
            <td>Ville</td>
            <td><input type="text" name="city"/></td>
        </tr>
        <tr>
            <td>Code postal</td>
            <td><input type="text" name="code"/></td>
        </tr>
    </table>

    <br/>

    <label>
        Moyen de paiemment:
        <span class="custom-dropdown custom-dropdown--white">
			<select name="paiemment" class="custom-dropdown__select custom-dropdown__select--white">
				<?php
                while ($paiemment_line = $paiemment->fetch()) {
                    ?>
                    <option><?php echo $paiemment_line["nomMoyenDePaiement"] ?></option>
                    <?php
                }
                ?>
			</select>
		</span>
    </label>
    <?php
    if (isset($_POST['paiemment'])) {
        echo $moyenPaiemment = $_POST['paiemment'];
    }
    ?>
    <br/>
    <br/>

    <input value="Valider" href="index.php?action=tunnel" type="submit">
</form>