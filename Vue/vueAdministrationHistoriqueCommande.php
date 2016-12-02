<?php /**
 * Created by PhpStorm.
 * User: Timothée Percq & Sylvain Pryfer
 * Date: 04/11/2016
 */
?>
<body>


<div id="Historique">

    <h1> HISTORIQUE DE COMMANDE </h1>


    <form action="?action=adminHistoriqueCommande" method="post">
        Nom utilisateur : <input type="text" name="Name"></input>
        <br/>
        ID de la commande : <input type="text" name="PanierID"></input>
        <br>

        <button type="submit"> Rechercher</button>
    </form>
    <div class="encadrement">

        <table id="tableauTotal">


            <thead>
            <td> panierID</td>
            <td> userID</td>
            <td> etatPanier</td>
            <td> Changement d'état</td>

            </thead>

            <?php
            foreach ($listPanier as $panier) { ?>


                <tr>


                    <table class="tablePanier">
                        <p>

                            <tr>

                                <td> <?php echo($panier["panierID"]); ?></td>
                                <td><?php echo($panier["nom"]); ?></td>
                                <td><?php echo($panier["etatPanier"]); ?> </td>
                                <td>
                                    <?php if ($panier["etatPanier"] == 1) { ?>
                                        <a href="?action=adminHistoriqueCommande&do=notPaid&panierID=<?php echo $panier['panierID']; ?>"
                                           title="Descendre">[↓]</a>
                                    <?php } else { ?>
                                        <a href="?action=adminHistoriqueCommande&do=paid&panierID=<?php echo $panier['panierID']; ?>"
                                           title="Monter">[↑]</a>
                                    <?php } ?>
                                </td>

                            </tr>
                            <tr>
                        <p>
                        <table class="tableCommande">

                            <tr>

                                <td> ID ligne dans la commande</td>
                                <td> ID du Produit</td>
                                <td> quantité de produit</td>

                            </tr>
                            <?php
                            foreach ($lstCommande[$panier["panierID"]] as $element) {
                                ?>
                                <tr>

                                    <td><?php echo($element[1]) ?></td>
                                    <td><?php echo($element[2]) ?></td>
                                    <td><?php echo($element[0]) ?></td>

                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        </p>
                        </tr>
                        </p>
                    </table>


                </tr>


                <?php
            } ?>
        </table>

        etatPanier : <br>
        <ul>
            <li>1 pour un panier validé, payé</li>
            <li>0 pour un panier non validé</li>
        </ul>

    </div>
</div>
</body>