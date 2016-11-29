-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 19 Novembre 2016 à 13:52
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

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
(4, 59120, 'Jadielle', 69, 'Rue de du centre'),
(5, 27080, 'Arendelle', 301, 'Place du marché');

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
(2, 'Décorations', 'Action de décorer, manière dont quelque chose est décoré ; ensemble de ce qui sert à décorer : La décoration d\'une salle pour une fête. Chacun des éléments qui décore quelque chose, un lieu ; ornements (surtout pluriel).'),
(3, 'Vaisselle', 'Ensemble des pièces et accessoires destinés au service de la table'),
(4, 'Jeu vidéo', 'Un jeu vidéo est une activité de loisir basée sur des périphériques informatiques (écran LCD, manette/joystick, hauts parleurs, ...) permettant d\'interagir dans un environnement virtuel conformément à un ensemble de règles prédéfinies');

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
(1, 'Effets de commerce', 'Les effets de commerce tels que la traite (ou lettre de change) et le billet à ordre, instruments tant de crédit que de paiement.'),
(2, 'Chèque ', 'Le chèque est un moyen de paiement scriptural utilisant le circuit bancaire. Il est généralement utilisé pour faire transiter de la monnaie d\'un compte bancaire à un autre. Tombé en désuétude dans la plupart des pays industrialisés, il reste encore souvent utilisé en France, au Royaume-Uni et aux États-Unis.'),
(3, 'Coupon de paiement', 'Le coupon de paiement, ticket d\'achat vendu notamment par les buralistes, permettant de recharger des cartes bancaires prépayées ; utilisé notamment pour des créditer une compte de jeux en ligne. Parce qu\'il est également objet de nombreuses fraudes du fait de son caractère anonyme, la directive sur le service des paiements vise a réduire le montant maximum journalier.'),
(4, 'Porte-monnaie électronique', 'Le porte-monnaie électronique est un dispositif qui peut stocker de la monnaie sans avoir besoin d\'un compte bancaire et d\'effectuer directement des paiements sur des terminaux de paiement.'),
(5, 'Crypto-monnaie', 'Une crypto-monnaie ou monnaie cryptographique est une monnaie électronique sur un réseau informatique pair à pair ou décentralisée basé sur les principes de la cryptographie pour valider les transactions et émettre la monnaie elle-même1,2. Aujourd\'hui, toutes les crypto-monnaies sont des monnaies alternatives, car elles n\'ont de cours légal dans aucun pays. Les crypto-monnaies utilisent un système de preuve de travail pour les protéger des contrefaçons électroniques. De nombreuses crypto-monnaies ont été développées mais la plupart sont similaires et dérivent de la première implémentation complète : le Bitcoin.'),
(6, 'Carte de paiement', 'Une carte de paiement est un moyen de paiement se présentant sous la forme d\'une carte plastique mesurant 85,60 × 53,98 mm, équipée d\'une bande magnétique et/ou puce électronique (c\'est alors une carte à puce), et qui permet :\r\n\r\nle paiement, auprès de commerces physiques possédant un terminal de paiement électronique ou auprès de commerces virtuels via Internet ;\r\nles retraits d\'espèces aux distributeurs de billets.\r\nLa carte de paiement est associée à un réseau de paiement, tel que VISA, MasterCard, American Express, JCB, le Groupe Carte Bleue. Une carte de paiement peut être à « débit immédiat », à débit différé ou une carte de crédit.\r\n\r\nLe réseau interbancaire français possède une particularité : toute carte disposant de la marque « CB - Carte bancaire » permet de payer par le biais du réseau interbancaire français, le Groupement des Cartes Bancaires CB.');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `panierID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `etatPanier` int(11) NOT NULL,
  `adresseID` int(11) NOT NULL,
  `moyenDePaiementID` int(11) NOT NULL,
  `HeureAchat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IDProduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`panierID`, `userID`, `etatPanier`, `adresseID`, `moyenDePaiementID`, `HeureAchat`, `IDProduit`) VALUES
(1, 3, 1, 1, 3, '2016-11-18 13:28:18', 0),
(2, 5, 0, 3, 4, '2016-11-18 13:28:18', 0),
(4, 3, 1, 1, 3, '2016-05-03 12:28:18', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `produitID` int(11) NOT NULL,
  `nomProduit` varchar(255) COLLATE utf8_bin NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `cheminimage` varchar(500) COLLATE utf8_bin NOT NULL,
  `sousCategorieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`produitID`, `nomProduit`, `prix`, `description`, `cheminimage`, `sousCategorieID`) VALUES
(1, 't-shirt star wars keep caml', 20, 'Magnifique t-shirt de la licence star wars. Imprimé Dark Vador avec "Keep Kalm and use the force"', 'Images/Produit/1.jpg', 1),
(2, 'Lampe Tetris', 30, 'La lampe qu\'il faut pour ton appart !', 'Images/Produit/2.jpg', 3),
(3, 'Tasse Winston', 15, 'Tasse à l\'effigie du personnage de Winston du jeu Overwatch', 'Images/Produit/3.jpg', 6),
(4, 'Tasse Reaper', 15, 'Tasse à l\'effigie du personnage de Reaper du jeu Overwatch', 'Images/Produit/4.jpg', 6),
(5, 'Tasse Tracer', 15, 'Tasse à l\'effigie du personnage de Tracer du jeu Overwatch', 'Images/Produit/5.jpg', 6),
(6, 'Starcraft 2 Legacy of the void - PC', 35, 'StarCraft II poursuit la saga épique de Protoss, des Terrans et des Zergs ! Ces trois puissantes races s\'affrontent une nouvelle fois dans ce jeu de stratégie en temps réel au rythme rapide, suite du légendaire StarCraft. Des légions d\'unités expérimentées, modernisées, et entièrement nouvelles combattront dans toute la galaxie, alors que chaque faction lutte pour sa survie !', 'Images/Produit/6.jpg', 4),
(7, 'Bravely Default - Nintendo 3DS', 41, 'La lueur du cristal s\'évanouit progressivement. Sa lumière faiblissante laisse présager un grand malheur. Il faut agir…
Dans Bravely Default, la quête à travers Luxendarc pour réveiller les cristaux est un RPG unique et innovant, en exclusivité sur les consoles de la famille Nintendo 3DS. ', 'Images/Produit/7.jpg', 4),
(8, 'Souris Pro Gamer', 110, 'Logitech G900 Chaos Spectrum Souris Pro Gamer sans-fil ambidextre Noir', 'Images/Produit/8.jpg', 5),
(9, 'Volant de course', 110, 'Volant de course pour PC, PS3 et PS4, en cuir et métal - noir', 'Images/Produit/9.jpg', 5);

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
(3, 'Lampes', 'Source de rayonnement construite en vue de produire de la lumière visible ou des rayonnements infrarouges ou ultraviolets. Appareil d\'éclairage constitué par l\'ampoule et l\'appareillage ; luminaire. Partie du luminaire qui produit la lumière : Griller une lampe. Dispositif produisant une flamme : Lampe à alcool.', 2),
(4, 'Jeux', 'Jeux vidéos', 4),
(5, 'Accessoies', 'Manettes, batteries, multiprises, connectique, tout ce qu\'il faut pour faire fonctionner consoles et ordinateurs', 4),
(6, 'Tasses', 'Tasses, mugs, bols et autre récipients', 3);

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
(1, 'Reynaert', 'Vincent', 'Images/Profil/profil_utilisateur.jpg', 1, 'vincent.reynaert@isen-lille.fr', '1234'),
(2, 'Sobczak', 'Nicolas', 'Images/Profil/2.jpg', 1, 'nicolas.sobczak@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(3, 'Pryfer', 'Sylvain', 'Images/Profil/profil_utilisateur.jpg', 2, 'feitte@gmail.com', '6b65fc634ff39db427281e38ff08747249466ff8'),
(4, 'Elsa', 'Queen of Arendelle', 'Images/Profil/4.jpg', 2, 'anna.elsa@gmail.com', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(5, 'Pika', 'Chu', 'Images/Profil/5.png', 2, 'pikachu@nintendo.com', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(6, 'Landais', 'Baudouin', 'Images/Profil/profil_utilisateur.jpg', 2, 'baudouin.landais@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(7, 'Levert', 'Quentin', 'Images/Profil/profil_utilisateur.jpg', 2, 'quentin.levert@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(8, 'Noet', 'Kevin', 'Images/Profil/profil_utilisateur.jpg', 2, 'kevin.noet@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(9, 'Percq', 'Timothée', 'Images/Profil/profil_utilisateur.jpg', 2, 'timothee.percq@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(10, 'Polaert', 'Francis', 'Images/Profil/profil_utilisateur.jpg', 2, 'francis.polaert@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(11, 'Valencourt', 'Vivien', 'Images/Profil/profil_utilisateur.jpg', 2, 'vivien.valencourt@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(12, 'Vandierdonck', 'Guillaume', 'Images/Profil/profil_utilisateur.jpg', 2, 'guillaume.vandierdonck@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(13, 'Vanmarcke', 'Romain', 'Images/Profil/profil_utilisateur.jpg', 2, 'romain.vanmarcke@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(14, 'Vermeil', 'Julien', 'Images/Profil/profil_utilisateur.jpg', 2, 'julien.vermeil@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(15, 'You', 'Qi', 'Images/Profil/profil_utilisateur.jpg', 2, 'qi.you@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(16, 'Yue', 'Cuize', 'Images/Profil/profil_utilisateur.jpg', 2, 'cuize.yue@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab');

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
  ADD PRIMARY KEY (`produitID`),
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
  MODIFY `adresseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `produitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  ADD CONSTRAINT `lignepanier_ibfk_2` FOREIGN KEY (`produitID`) REFERENCES `produit` (`produitID`);

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
