<?php
/*
* User: Francis Polaert & Kévin Noet
* Date: 04/11/2016
*/

if (empty($_SESSION['userID'])) {
    header('Location: index.php?action=login');
} else {
    $bdd = new PDO('mysql:host=localhost; dbname=db_e_shopping; charset=utf8', 'root', 'ISEN');
    $paiemment = $bdd->query("SELECT * FROM moyendepaiement");
    $lignepanier = $bdd->query("SELECT *
                            FROM lignepanier, panier, produit
                            WHERE panier.userID = " . $_SESSION['userID'] . "
                            AND panier.panierID = lignepanier.panierID
                            AND lignepanier.produitID = produit.produitID
							AND panier.etatPanier = 0");
    ?>

    <table>
    <?php
    if (empty($lignepanier_line = $lignepanier->fetch())) {
        echo "Votre panier est vide";
    } else {
        while ($lignepanier_line) {
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
            $lignepanier_line = $lignepanier->fetch();
        }
        ?>
        </table>

        <form method="POST" action="?action=tunnel">
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
                $moyenPaiemment = $_POST['paiemment'];
            }
            ?>
            <br/>
            <br/>
            <input value="Valider" href="index.php?action=tunnel" type="submit">
        </form>

        <?php
        if (empty($_POST['number'])) {
            echo "Vous n'avez pas entré un numéro de rue";
        } elseif (empty($_POST['adress'])) {
            echo "Vous n'avez pas entré une adresse";
        } elseif (empty($_POST['city'])) {
            echo "Vous n'avez pas entré votre ville";
        } elseif (empty($_POST['code'])) {
            echo "Vous n'avez pas entré un code postal";
        } else {
            $bdd->exec('INSERT INTO adresse(adresseID,codePostal,ville,numeroVoie,nomRue) VALUES ( , ' . $_POST['code'] . ' , ' . $_POST['city'] . ' , ' . $_POST['number'] . ' , ' . $_POST['adress'] . ')');
            $bdd->exec('UPDATE panier SET etatPanier =1 WHERE userID=' . $_SESSION['userID'] . '');
            $MoyenPaiement = $bdd->query('SELECT * 
									FROM moyendepaiement 
									WHERE nomMoyenDePaiement="' . $moyenPaiemment . '";');
            $MoyenPaiement = $MoyenPaiement->fetch();
            echo $MoyenPaiement['moyenDePaiementID'];
            $bdd->exec('UPDATE panier SET moyenDePaiementID =' . $MoyenPaiement['moyenDePaiementID'] . ' WHERE userID=' . $_SESSION['userID'] . '');
            echo "Votre panier à bien été accepté";
        }
    }
}
?>