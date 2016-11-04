<section>
<div>
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
<?php
if (!empty($_POST['nomProduit']) AND !empty($_POST['prix']) AND !empty($_POST['description']) AND !empty($_POST['cheminimage']))
{
$bdd = new PDO('mysql:host=localhost:3307;dbname=db_e_shopping', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('SELECT * FROM produit WHERE nomProduit like ?');
$req->execute(array($_POST['nomProduit']));
$nbr = $req->rowCount();
if ($nbr == 0)
{
$req1 = $bdd->prepare('INSERT INTO produit(nomProduit, prix, description, cheminimage) 
VALUES(:nom, :prix, :description, :cheminimage)');
$req1->execute(array(
'nom' => $_POST['nomProduit'],
'prix' => $_POST['prix'],
'description' => $_POST['description'],
'cheminimage' => $_POST['cheminimage']));

echo 'New product added !';
}
else 
{
echo 'This product name already exist !';
}
}

?>
</div>
</section>