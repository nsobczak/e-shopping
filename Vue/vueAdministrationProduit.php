<section>
    <div>    <?php
        if($add_produit_code == AdministrationProduit::ADD_OK) {
            echo '<h3>New product added !</h3>';
        }
        elseif($add_produit_code == AdministrationProduit::ALREADY_EXIST) {
            echo "<h3>This product name already exist !</h3>";
        }
        ?>
        <form action="" method="POST">
            <label for="text">Please enter the detail of the product :</label></br></br>
            <label for="nomProduit">Name :</label>
            <input id="nomProduit" placeholder="name" type="text" name="nomProduit"></br></br>
            <label for="prix">Prix :</label>
            <input id="prix" placeholder="prix" type="text" name="prix"></br></br>
            <label for="baking_time">Description :</label>
            <input id="description" placeholder="description"  type="text" name="description"></br></br>
            <label for="cheminimage">Image :</label>
            <input id="cheminimage" placeholder="image.jpeg" type="text" name="cheminimage"></br></br>
            <input type="reset" value="Reset">&nbsp;
            <input type="submit" value="Ajouter produit">
        </form>
    </div>
    <div>
        </br>
    </div>
</section>