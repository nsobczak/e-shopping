<header>
    <a href="index.php?action=accueil"><h1 id="titreSite">GeekProducts.com</h1></a>

    <ul>
        <li class="home"><a href="index.php?action=accueil"><img src="Images/Home_Icon.png" title="home"/></a></li>
        <li><a href="index.php?action=recherche">Recherche</a></li>
        <li class="dropdown">
            <a href="index.php?action=produitList" class="dropbtn">Produits</a>
            <?php if (!empty($categories)) { ?>
                <div class="dropdown-content">
                    <?php foreach ($categories as $category) { ?>
                        <a href="index.php?action=productCategorie&idCategorie=<?php echo $category['categorieID']; ?>"><?php echo $category['nomCategorie']; ?></a>
                    <?php } ?>
                </div>
            <?php } ?>
        </li>
        <li><a href="index.php?action=tunnel">Panier</a></li>
        <li><a href="index.php?action=faq">FAQ</a></li>
        <li><a href="index.php?action=userProfile">Profil</a></li>
        <?php if (!isset($_SESSION['userID'])) { ?>
            <li><a href="index.php?action=login">Login</a></li>
            <li><a href="index.php?action=inscription">Inscription</a></li>
        <?php } else { ?>
            <li><a href="index.php?action=deconnexion">Deconnexion</a></li>
        <?php } ?>
        <li>--</li>
        <?php if (isset($_SESSION['userID']) && $_SESSION['niveau_accreditation'] == 1) { ?>
            <li class="dropdown">
                <a href="#" class="dropbtn">Administration</a>
                <div class="dropdown-content">
                    <a href="index.php?action=adminProduit">Gérer les produits</a>
                    <a href="index.php?action=adminUser">User: gérer les comptes</a>
                    <a href="index.php?action=adminHistoriqueCommande">Compte Client: historique des commandes</a>
                    <a href="index.php?action=adminPaiementLivraison">Gérer moyens de paiement</a>
                    <a href="index.php?action=adminChiffreAffaire">Chiffre d'affaires</a>
                </div>
            </li>
        <?php } ?>
    </ul>

</header>
