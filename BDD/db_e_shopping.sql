-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 29 Novembre 2016 à 20:19
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
(2, 'Accessoires', 'Des élèments indispensables pour ton bon geek'),
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
  `adresseID` int(11) DEFAULT NULL,
  `moyenDePaiementID` int(11) DEFAULT NULL,
  `HeureAchat` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`panierID`, `userID`, `etatPanier`, `adresseID`, `moyenDePaiementID`, `HeureAchat`) VALUES
(1, 3, 1, 1, 3, '2016-11-18 13:28:18'),
(2, 5, 0, 3, 4, '2016-11-18 13:28:18'),
(4, 3, 1, 1, 3, '2016-05-03 12:28:18');

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
(9, 'Volant de course', 110, 'Volant de course pour PC, PS3 et PS4, en cuir et métal - noir', 'Images/Produit/9.jpg', 5),
(10, 'T-Shirt - Geek en Charge', 19, 'Les t-shirts Geek s\'adresse aux accros à Internet, jeux video, mangas et geekerie en tout genre! Une idée cadeau pour vos amis geeks et qui n\'a pas d\'amis geek de nos jours..? Pour chaque geekerie il y a le tee shirt Geek qui convient.', 'Images/Produit/10.jpg', 1),
(11, 'T-Shirt - Geek Level Up', 19, 'Les t-shirts Geek s\'adresse aux accros à Internet, jeux video, mangas et geekerie en tout genre! Une idée cadeau pour vos amis geeks et qui n\'a pas d\'amis geek de nos jours..? Pour chaque geekerie il y a le tee shirt Geek qui convient.', 'Images/Produit/11.jpg', 1),
(12, 'T-Shirt Homme STAR WARS - Yoda Cool Stereo', 20, '- T-Shirt Star Wars Pour Homme - Motif à l\'Avant de DJ Yoda Avec des Lunettes Brillantes et un Casque Autour du Cou - Les Éléments Bleus Sont Sérigraphiés Avec une Matière Brillante - Modèle 100% Officiel de la Licence Star Wars', 'Images/Produit/12.jpg', 1),
(13, 'Porte tablette retro', 99, 'iCADE Arcade Cabinet', 'Images/Produit/13.jpg', 7),
(14, 'Chaussures zelda', 52, 'Vivre sa passion c\'est bien. La porter c\'est encore mieux.', 'Images/Produit/14.jpg', 2),
(15, 'Baskettes tetris', 49, 'Nous les Geek on a les armoires remplies de fringues complètement Geek. Ce qu’il nous manque bien souvent par contre, ce sont des chaussures ou des basquettes Geek.', 'Images/Produit/15.jpg', 2),
(16, 'Baskettes Angry Birds', 109, 'Chaussures-Collector', 'Images/Produit/16.jpg', 2),
(17, 'Baskettes Star wars', 109, 'Chaussures-Collector', 'Images/Produit/17.jpg', 2),
(18, 'Tasse "gamer fuel"', 12, 'Un geek a besoin de recharger ses batteries', 'Images/Produit/18.jpg', 6),
(19, 'Bébé Groot Dansant', 35, 'Comme nous, vous avez aimé The Guardiens Of The Galaxy (alias les Gardiens de la Galaxie) ? Vous allez adorer le bébé groot dansant ! Oui le Baby Groot Dancing, reprend l’une des dernières scène du film où on retrouve Groot, un extraterrestre végétal à mi-chemin entre la racine et l’arbre, qui, alors qu’il avait brûlé, repousse en dansant sur I Want You Back des Jackson Five dans un pot de fleur. Le bébé groot dansant sur ton bureau !', 'Images/Produit/19.png', 3),
(20, 'Poubelle Domestique R2-D2', 105, 'On ne peut pas dire que la vie est belle pour l’ex-robot R2D2 qui depuis sa retraite, ne cesse d’endosser des sous rôles. J’entends sur le registre du marketing, évidemment. Aujourd’hui il joue les poubelles hi-tech pour Geek. Un accessoire indispensable pour maintenir de l’ordre dans sa chambre.', 'Images/Produit/20.jpg', 3),
(21, 'Tasse game boy', 52, 'Mug game boy', 'Images/Produit/21.jpg', 6),
(22, 'Boite à gateaux sonore tardis docteur who', 29, 'On ne s\'arrête pas de baver d\'envie devant cette boîte à cookies sonore Doctor Who en forme de Tardis... Conçue en plastique alimentaire pour une meilleure hygiène et équipée d\'un couvercle amovible, elle sait comment s\'y prendre pour garder nos gâteaux à l\'abri. Mais ce qui nous fait véritablement craquer, ce sont ses effets sonores et lumineux qui émettent des sons du Tardis et font s\'illuminer la lanterne lorsque l’on referme le couvercle ou lorsque l’on appuie dessus !', 'Images/Produit/22.jpg', 7),
(23, 'Haut-Parleurs Panda', 24, 'On aime son petit look animal vraiment adorable et son côté pratique pour écouter de la musique façon insolite : oreille gauche (noire), vous pourrez régler le son de votre playlist, oreille droite, c’est les tonalités de la chanson que vous réglez, histoire de vous faire un joli son. Alimenté par un port USB, comme maintenant tous les gadgets geek et high-tech, ce petit panda haut-parleur pourrait bien devenir votre meilleur ami.', 'Images/Produit/23.png', 3),
(24, 'Sac à Dos BB-8', 55, 'Arrêtez tout, on a LE cadeau de Noël : le sac à dos Buddies BB-8 ! Oui le petit droïde vedette de Star Wars 7 débarque en mode sac pour transporter tout votre petit matos geek sur le dos. Un sac à dos Star Wars très réussi où vous pourrez ranger votre anti-stress étoile noire ou votre portefeuille R2-D2.', 'Images/Produit/24.png', 7),
(25, 'Lampe Torche Sabre Laser', 29, 'Tout le monde devrait avoir son sabre laser de Jedi dans cette jungle qu’est devenu le monde ! Et bien cette réplique de sabre laser Star Wars vous aidera dans votre combat quotidien contre le mal, en tout cas contre le côté obscur de la Force puisque c’est une lampe torche !', 'Images/Produit/25.png', 3),
(26, 'Peluche Faucon Millenium', 9, 'Le Faucon Millenium, le célèbre vaisseau Star Wars de Han Solo atterrit dans le berceau de bébé ! Une bien jolie peluche reprenant donc le design du Faucon Millenium, pour rappel le vaisseau le plus rapide de la galaxie. Rien que ça. Et puis inutile de la gagner en jouant aux cartes contre Lando Calrissian pour obtenir le Faucon Millenium peluche : il suffit de l’ajouter à votre panier ! Une peluche Star Wars qui fera rêver les petits et plaisir aux papas !', 'Images/Produit/26.png', 3);

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
(3, 'Décorations', 'Action de décorer, manière dont quelque chose est décoré ; ensemble de ce qui sert à décorer : La décoration d\'une salle pour une fête. Chacun des éléments qui décore quelque chose, un lieu ; ornements (surtout pluriel).', 2),
(4, 'Jeux', 'Jeux vidéos', 4),
(5, 'Accessoies', 'Manettes, batteries, multiprises, connectique, tout ce qu\'il faut pour faire fonctionner consoles et ordinateurs', 4),
(6, 'Tasses', 'Tasses, mugs, bols et autre récipients', 3),
(7, 'Accessoires', 'Des élèments ayant une utilité', 2);

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
(1, 'Reynaert', 'Vincent', 'Images/Profil/profil_utilisateur.jpg', 1, 'vincent.reynaert@isen-lille.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(2, 'Sobczak', 'Nicolas', 'Images/Profil/2.jpg', 1, 'nicolas.sobczak@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(3, 'Pryfer', 'Sylvain', 'Images/Profil/profil_utilisateur.jpg', 2, 'feitte@gmail.com', 'ad0557319768587a736ee716b5bc48945c39aaab'),
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
(16, 'Yue', 'Cuize', 'Images/Profil/profil_utilisateur.jpg', 2, 'cuize.yue@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab'),
(17, 'Trouche', 'Pierre', 'Images/Profil/profil_utilisateur.jpg', 2, 'trouchyLeMalade@isen.yncrea.fr', 'ad0557319768587a736ee716b5bc48945c39aaab');
-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `questionID` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `commentaires` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `faq`
--

INSERT INTO `faq` (`questionID`, `question`, `commentaires`, `userID`) VALUES
(1, 'Comment acheter sur notre site ?', 'Bonjour comment acheter sur votre site ?', 11),
(2, 'Peut-on devenir admin ?', 'Bonjour, j\'aime beaucoup votre site. Il est magnifique ! C\'est pourquoi, j\'aimerais beaucoup m\'impliquer davantage. Peut-on devenir admin ?', 13),
(3, 'Comment effectuer une recherche de produit ?', 'Bonjour, je ne comprends pas comment effectuer une recherche de produit. Pouvez-vous m\'aider ?', 4),
(4, 'Où se trouve la FAQ ?', 'Bonjour, je suis un peu perdu. Où se trouve la FAQ ? J\'ai besoin d\'aide ! HELP !!!', 5);

-- --------------------------------------------------------

--
-- Structure de la table `faqreponses`
--

CREATE TABLE `faqreponses` (
  `reponseID` int(11) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `faq`
--

INSERT INTO `faqreponses` (`reponseID`, `reponse`, `userID`, `questionID`) VALUES
(1, 'Bonjour, as-tu essayé d\'appuyer sur le bouton acheter qui est situé en haut à droite d\'une page produit ? Il ressemble à un caddie ;)', 2, 1),
(2, 'Pas pour le moment.', 1, 2),
(3, 'Un jour peut-être ;)', 2, 2),
(4, 'Bonjour, pour effectuer une recherche de produit, il faut aller sur la page recherche et renseigner le champ.', 1, 3),
(5, 'Bonjour, pour compléter ce qui a été dit, il est possible d\'entrer des mots clés pour obtenir une liste de produits correspondants.', 2, 3),
(6, 'Bonjour, la FAQ est la page où vous lisez actuellement ce texte ^^ Bienvenue sur la FAQ', 1, 4),
(7, 'Merciii ! Vous êtes un dieu !!', 5, 4),
(8, 'Monsieur Chu, la FAQ contient plusieurs pages de questions ayant reçue des réponses. Je vous conseille de les lire attentivement.', 2, 4);

-- --------------------------------------------------------
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
-- Index pour la table `user`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`questionID`);

--
-- Index pour la table `faqreponses`
--
ALTER TABLE `faqreponses`
  ADD PRIMARY KEY (`reponseID`);

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
  MODIFY `categorieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `panierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `produitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  MODIFY `sousCategorieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faqreponses`
  MODIFY `reponseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

--
-- Contraintes pour la table `faqreponses`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Contraintes pour la table `faqreponses`
--
ALTER TABLE `faqreponses`
  ADD CONSTRAINT `faqreponses_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `faqreponses_ibfk_2` FOREIGN KEY (`questionID`) REFERENCES `faq` (`questionID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
