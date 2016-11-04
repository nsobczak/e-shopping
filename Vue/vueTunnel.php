 <?php
 /*
 * User: Francis Polaert & Kévin Noet
 * Date: 21/10/2016
 */
 ?>
<table>
	<tr>
		<td>nom du produit</td>
		<td>image</td>
		<td>quantité</td>
		<td>prix</td>
	</tr>
</table>

<form method="POST" action="index.php?action=vueTunnel">
	<table>
		<tr>
			<td>Street number</td>
			<td><input type="text" name="number"/></td>
		</tr>
		<tr>
			<td>Adress</td>
			<td><input type="text" name="adress"/></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="city"/></td>
		</tr>
		<tr>
			<td>Postcode</td>
			<td><input type="text" name="code"/></td>
		</tr>
	</table>
</form>
<div>
	Moyen de livraison
<div>
<ul>
    <li>A pied</li>
    <li>En vélo</li>
	<li>En Scooter</li>
	<li>En voiture</li>
</ul>
<div>
	Moyen de paiemment
</div>
<ul>
	<li>Carte bancaire</li>
	<li>Espèce</li>
</ul>