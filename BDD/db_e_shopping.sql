-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- User: Nicolas Sobczak & Vincent Reynaert
-- Généré le :  Ven 04 Novembre 2016 à 23:10
-- Version du serveur :  5.7.10-log
-- Version de PHP :  7.0.10


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_e_shopping`
--


-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `adresseID` int(11) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `numeroVoie` int(11) NOT NULL,
  `nomRue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`adresseID`, `codePostal`, `ville`, `numeroVoie`, `nomRue`) VALUES
(1, 59000, 'Lille', 42, 'Bd Vauban'),
(2, 59000, 'Lille', 42, 'Bd Vauban'),
(3, 59120, 'Loos', 69, 'Rue de Londres'),
(4, 59120, 'Jadielle', 69, 'Rue de du centre');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `categorieID` int(11) NOT NULL,
  `nomCategorie` varchar(255) NOT NULL,
  `descriptionCategorie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`categorieID`, `nomCategorie`, `descriptionCategorie`) VALUES
(1, 'Vêtements', 'Tout ce qui sert à couvrir le corps humain pour le protéger ; pièce de l\'habillement. Littéraire. Ce qui habille, recouvre quelque chose ; parure, manteau.'),
(2, 'Décorations', 'Action de décorer, manière dont quelque chose est décoré ; ensemble de ce qui sert à décorer : La décoration d\'une salle pour une fête. Chacun des éléments qui décore quelque chose, un lieu ; ornements (surtout pluriel).');

-- --------------------------------------------------------

--
-- Structure de la table `lignepanier`
--

CREATE TABLE `lignepanier` (
  `lignePanierID` int(11) NOT NULL,
  `panierID` int(11) NOT NULL,
  `numeroLignePanier` int(11) NOT NULL,
  `produitID` int(11) NOT NULL,
  `quantité` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `lignepanier`
--

INSERT INTO `lignepanier` (`lignePanierID`, `panierID`, `numeroLignePanier`, `produitID`, `quantité`) VALUES
(1, 1, 1, 1, 4),
(2, 1, 1, 2, 1),
(3, 2, 1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `moyendepaiement`
--

CREATE TABLE `moyendepaiement` (
  `moyenDePaiementID` int(11) NOT NULL,
  `nomMoyenDePaiement` varchar(255) NOT NULL,
  `descriptionMoyenDePaiement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `moyendepaiement`
--

INSERT INTO `moyendepaiement` (`moyenDePaiementID`, `nomMoyenDePaiement`, `descriptionMoyenDePaiement`) VALUES
(1, 'Espèces', 'Les espèces (du vieux Français "payer en espices/épices") numéraires (billets et pièces), utilisables essentiellement dans la zone monétaire de la devise où ils sont libellés, par exemple l\'euro dans la zone euro.'),
(2, 'Effets de commerce', 'Les effets de commerce tels que la traite (ou lettre de change) et le billet à ordre, instruments tant de crédit que de paiement.'),
(3, 'Chèque ', 'Le chèque est un moyen de paiement scriptural utilisant le circuit bancaire. Il est généralement utilisé pour faire transiter de la monnaie d\'un compte bancaire à un autre. Tombé en désuétude dans la plupart des pays industrialisés, il reste encore souvent utilisé en France, au Royaume-Uni et aux États-Unis.'),
(4, 'Coupon de paiement', 'Le coupon de paiement, ticket d\'achat vendu notamment par les buralistes, permettant de recharger des cartes bancaires prépayées ; utilisé notamment pour des créditer une compte de jeux en ligne. Parce qu\'il est également objet de nombreuses fraudes du fait de son caractère anonyme, la directive sur le service des paiements vise a réduire le montant maximum journalier.'),
(5, 'Porte-monnaie électronique', 'Le porte-monnaie électronique est un dispositif qui peut stocker de la monnaie sans avoir besoin d\'un compte bancaire et d\'effectuer directement des paiements sur des terminaux de paiement.'),
(6, 'Crypto-monnaie', 'Une crypto-monnaie ou monnaie cryptographique est une monnaie électronique sur un réseau informatique pair à pair ou décentralisée basé sur les principes de la cryptographie pour valider les transactions et émettre la monnaie elle-même1,2. Aujourd\'hui, toutes les crypto-monnaies sont des monnaies alternatives, car elles n\'ont de cours légal dans aucun pays. Les crypto-monnaies utilisent un système de preuve de travail pour les protéger des contrefaçons électroniques. De nombreuses crypto-monnaies ont été développées mais la plupart sont similaires et dérivent de la première implémentation complète : le Bitcoin.'),
(7, 'Carte de paiement', 'Une carte de paiement est un moyen de paiement se présentant sous la forme d\'une carte plastique mesurant 85,60 × 53,98 mm, équipée d\'une bande magnétique et/ou puce électronique (c\'est alors une carte à puce), et qui permet :\r\n\r\nle paiement, auprès de commerces physiques possédant un terminal de paiement électronique ou auprès de commerces virtuels via Internet ;\r\nles retraits d\'espèces aux distributeurs de billets.\r\nLa carte de paiement est associée à un réseau de paiement, tel que VISA, MasterCard, American Express, JCB, le Groupe Carte Bleue. Une carte de paiement peut être à « débit immédiat », à débit différé ou une carte de crédit.\r\n\r\nLe réseau interbancaire français possède une particularité : toute carte disposant de la marque « CB - Carte bancaire » permet de payer par le biais du réseau interbancaire français, le Groupement des Cartes Bancaires CB.');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `panierID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `etatPanier` int(11) NOT NULL,
  `adresseID` int(11) NOT NULL,
  `moyenDePaiementID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`panierID`, `userID`, `etatPanier`, `adresseID`, `moyenDePaiementID`) VALUES
(1, 3, 0, 1, 3),
(2, 5, 0, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `poduitID` int(11) NOT NULL,
  `nomProduit` varchar(255) COLLATE utf8_bin NOT NULL,
  `prix` int(11) NOT NULL,
  `desciption` text CHARACTER SET utf8 NOT NULL,
  `cheminimage` varchar(500) COLLATE utf8_bin NOT NULL,
  `sousCategorieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`poduitID`, `nomProduit`, `prix`, `desciption`, `cheminimage`, `sousCategorieID`) VALUES
(1, 't-shirt star wars keep caml', 20, 'Magnifique t-shirt de la licence star wars. Imprimé Dark Vador avec "Keep Kalm and use the force"', 'http://i2.cdscdn.com/pdt2/5/0/3/1/300x300/mp03014503/rw/t-shirt-star-wars-keep-calm-and-the-use-force-xxla.jpg', 1),
(2, 'Lampe Tetris', 30, 'La lampe qu\'il faut pour ton appart !', 'https://images-na.ssl-images-amazon.com/images/I/41rIE-JM3KL._SY355_.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

CREATE TABLE `souscategorie` (
  `sousCategorieID` int(11) NOT NULL,
  `nomSousCategorie` varchar(255) NOT NULL,
  `descriptionSousCategorie` text NOT NULL,
  `categorieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `souscategorie`
--

INSERT INTO `souscategorie` (`sousCategorieID`, `nomSousCategorie`, `descriptionSousCategorie`, `categorieID`) VALUES
(1, 't-shirt', 'Maillot en coton à ras de cou et à manches courtes que l\'on porte directement sur la peau.', 1),
(2, 'chaussures', 'Les chaussures constituent un élément d\'habillement dont le rôle est de protéger les pieds. Le terme chaussure dérive du verbe chausser, issu du latin calceare « mettre des souliers ». La plus vieille chaussure du monde a 5 500 ans et a été découverte dans une grotte en Arménie. La forme des chaussures peut varier à l\'infini, notamment en fonction de la mode et du statut social. La matière la plus couramment utilisée pour fabriquer les chaussures est le cuir. L\'artisan spécialiste de la réparation des chaussures est le cordonnier, métier qui a fortement décliné dans les pays occidentaux.', 1),
(3, 'Lampes', 'Source de rayonnement construite en vue de produire de la lumière visible ou des rayonnements infrarouges ou ultraviolets. Appareil d\'éclairage constitué par l\'ampoule et l\'appareillage ; luminaire. Partie du luminaire qui produit la lumière : Griller une lampe. Dispositif produisant une flamme : Lampe à alcool.', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `chemin` varchar(500) COLLATE utf8_bin NOT NULL,
  `niveau_accreditation` int(11) NOT NULL,
  `mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`userID`, `nom`, `prenom`, `chemin`, `niveau_accreditation`, `mail`, `mot_de_passe`) VALUES
(1, 'Reynaert', 'Vincent', NULL, 1, 'vincent.reynaert@isen-lille.fr', '1234'),
(2, 'Sobczak', 'Nicolas', NULL, 1, 'nicolas.sobczak@isen-lille.fr', '1234'),
(3, 'Pryfer', 'Sylvain', NULL, 2, 'feitte@gmail.com', '6b65fc634ff39db427281e38ff08747249466ff8'),
(5, 'Pika', 'Chu', 'Images/Profil/Pikachu.png', 2, 'pikachu@nintendo.com', '19be062d13637aaabb2790490fc173dd849aff47');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`adresseID`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`categorieID`);

--
-- Index pour la table `lignepanier`
--
ALTER TABLE `lignepanier`
  ADD PRIMARY KEY (`lignePanierID`),
  ADD KEY `panierID` (`panierID`),
  ADD KEY `produitID` (`produitID`);

--
-- Index pour la table `moyendepaiement`
--
ALTER TABLE `moyendepaiement`
  ADD PRIMARY KEY (`moyenDePaiementID`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`panierID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `adresseID` (`adresseID`),
  ADD KEY `moyenDePaiementID` (`moyenDePaiementID`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`poduitID`),
  ADD KEY `sousCategorieID` (`sousCategorieID`);

--
-- Index pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD PRIMARY KEY (`sousCategorieID`),
  ADD KEY `categorieID` (`categorieID`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `adresseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `categorieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `lignepanier`
--
ALTER TABLE `lignepanier`
  MODIFY `lignePanierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `moyendepaiement`
--
ALTER TABLE `moyendepaiement`
  MODIFY `moyenDePaiementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `panierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `poduitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  MODIFY `sousCategorieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `lignepanier`
--
ALTER TABLE `lignepanier`
  ADD CONSTRAINT `lignepanier_ibfk_1` FOREIGN KEY (`panierID`) REFERENCES `panier` (`panierID`),
  ADD CONSTRAINT `lignepanier_ibfk_2` FOREIGN KEY (`produitID`) REFERENCES `produit` (`poduitID`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`adresseID`) REFERENCES `adresse` (`adresseID`),
  ADD CONSTRAINT `panier_ibfk_3` FOREIGN KEY (`moyenDePaiementID`) REFERENCES `moyendepaiement` (`moyenDePaiementID`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`sousCategorieID`) REFERENCES `souscategorie` (`sousCategorieID`);

--
-- Contraintes pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD CONSTRAINT `souscategorie_ibfk_1` FOREIGN KEY (`categorieID`) REFERENCES `categorie` (`categorieID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
