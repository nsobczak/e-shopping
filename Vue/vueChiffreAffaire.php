<?php
/**
 * Created by PhpStorm.
 * User: Quentin Levert
 * Date: 18/11/2016
 * Time: 14:37
 */
?>

    Pour avoir le chiffre d'affaire de l'année, veuillez entrer l'année. ex: 2016<br/>
    Pour avoir le chiffre d'affaire d'un mois, veuillez entrer l'année et le mois. ex: 03 et 2016<br/>
    <br/>
    <form action="?action=adminChiffreAffaire" method="POST">
        Mois : <input type="text" name="month" placeholder="Numéro du mois"/><br/>
        Année : <input type="text" name="year" placeholder="Numéro de l'année"/><br/>
        <input type="submit" value="Rechercher"><br/>
<?php
if (isset($_POST['month']) && isset($_POST['year'])) {


    echo "Le chiffre d'affaires du " . $_POST['month'] . '/' . $_POST['year'] . " est de:";
    echo $CAFinal . "€";
}

?>