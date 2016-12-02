<section>
    <div>
        <?php
        if ($produit_code == AdministrationProduit::ADD_OK) {
            echo '<h3>Nouveau produit ajouté !</h3>';
        } elseif ($produit_code == AdministrationProduit::PRODUCT_ALREADY_EXIST) {
            echo "<h3>Ce produit existe déjà !</h3>";
        } elseif ($produit_code == AdministrationProduit::DOES_NOT_EXIST) {
            echo "<h3>Ce nom de produit n'existe pas !</h3>";
        } elseif ($produit_code == AdministrationProduit::DEL_OK) {
            echo "<h3>Produit supprimé !</h3>";
        } elseif ($produit_code == AdministrationProduit::ERROR_FORM) {
            echo "<h3>Veuillez vérifier votre saisi !</h3>";
        } elseif ($produit_code == AdministrationProduit::MODIFY_OK) {
            echo "<h3>Les modifications de ce produit ont été prit en compte !</h3>";
        }

        ?>
        <form class="admin_form" action="" method="POST">
            <table>
                <tr>
                    <td><label for="text">Voulez-vous ajouter ou modifier un produit existant ?</label></td>
                    <td><input type="radio" name="product_choice" value="add" checked>Ajouter</input>
                        <input type="radio" name="product_choice" value="modify">Modifier</input>
                        <input type="radio" name="product_choice" value="delete">Supprimer</input></td>
                </tr>
                <tr>
                    <td>
                        <label for="text">Entrez les détails en fonction de votre choix :</label>
                    </td>
                    <td>
                        <ul>
                            <li>Pour ajouter un produit, il faut entrer toutes les informations.</li>
                            <li>Pour modifier un produit, il faut entrer le nom du produit et renseigner le champ à
                                modifier.
                            </li>
                            <li>Pour supprimer un produit, il faut entrer le nom du produit.</li>
                        </ul>
                        Il faut ensuite cliquer sur le bouton "Appliquer les modifications".
                    </td>
                </tr>
                <tr>
                    <td><label for="nomProduit">Nom du produit :</label></td>
                    <td><input id="nomProduit" placeholder="produit" type="text" name="nomProduit"></td>
                </tr>
                <tr>
                    <td><label for="nomProduit">Nouveau produit (si vous voulez le modifier) :</label></td>
                    <td><input id="nomProduit" placeholder="nouveau nom" type="text" name="newNomProduit"></td>
                </tr>
                <tr>
                    <td><label for="prix">Prix :</label></td>
                    <td><input id="prix_produit" placeholder="prix" type="text" name="prix"></td>
                </tr>
                <tr>
                    <td><label for="description_produit">Description du produit :</label></td>
                    <td><textarea id="description_produit" placeholder="description" type="text"
                                  name="description_produit" rows="4" cols="50"></textarea></td>
                </tr>
                <tr>
                    <td><label for="cheminimage">Image :</label></td>
                    <td><input id="cheminimage" placeholder="image.jpeg" type="text" name="cheminimage"></td>
                </tr>
                <tr>
                    <td><label for="SousCategorie">Dans quelle sous-catégorie se trouve votre produit ? : </label></td>
                    <td><select id="sous_categorie" name="idSousCategorie"><?php echo $sous_categorie ?></select></td>
                </tr>
                <tr>
                    <td><label for="newSousCategorie">Sinon, saisir un nouveau nom de sous-catégorie :</label></td>
                    <td><input id="newSousCategorie" placeholder="sous-catégorie" type="text" name="newSousCategorie">
                    </td>
                </tr>
                <tr>
                    <td><label for="descriptionSousCategorie">Et sa description :</label></td>
                    <td><textarea id="descriptionSousCategorie" placeholder="description" type="text"
                                  name="descriptionSousCategorie" rows="4" cols="50"></textarea></td>
                </tr>
                <tr>
                    <td><label for="categorie">Dans quelle catégorie se trouve votre sous-catégorie ? :</label></td>
                    <td><select id="categorie" name="idCategorie"><?php echo $categorie ?></select></td>
                </tr>
                <tr>
                    <td><label for="newCategorie">Sinon, saisir un nouveau nom de catégorie :</label></td>
                    <td><input id="newCategorie" placeholder="catégorie" type="text" name="newCategorie"></td>
                </tr>
                <tr>
                    <td><label for="descriptionCategorie">Et sa description :</label></td>
                    <td><textarea id="descriptionCategorie" placeholder="description" type="text"
                                  name="descriptionCategorie" rows="4" cols="50"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="reset" value="Réinitialiser">&nbsp;
                        <input type="submit" value="Appliquer les modifications"></td>
                </tr>
            </table>
        </form>
    </div>
</section>