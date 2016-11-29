<?php

?>

<body>
    
        
<div  id = "historique">    

    <h1> HISTORIQUE DE COMMANDE </h1>
    <table  width="95%" style="line-height: 24px;" border="10">
          
      
        <tr  >    <!-- table row -->
            <td color= "red" > panierID</td>
            <td > userID</td>    
            <td > etatPanier</td>
            <td > Changement d'état</td>   

        </tr>


        <?php foreach ($listPanier as $panier) { ?> 

            <tr >
                <td > <?php echo( $panier["panierID"]); ?></td>
                <td ><?php echo($panier["nom"]); ?></td>    
                <td ><?php echo($panier["etatPanier"]);  ?> </td> 
                <td >
                <?php if ($panier["etatPanier"]  == 1){?>
                    <a href="?action=adminHistoriqueCommande&do=notPaid&panierID=<?php echo $panier['panierID']; ?>" title="Descendre">[↓]</a></td>
                <?php } else { ?>
                    <a href="?action=adminHistoriqueCommande&do=paid&panierID=<?php echo $panier['panierID']; ?>" title="Monter">[↑]</a></td>
                <?php } ?>
                

                
            </tr>
        <?php }  ?>
    </table>

</div>
</body>