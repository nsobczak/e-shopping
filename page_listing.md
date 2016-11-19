# page listing

|Controleur|Modele|Vue|Description|Niveau d'autorisation|Attribué à|Priorité|
|---|---|---|---|---|---|---|
|ControleurInscription|Register|vueInscription|Inscription/ creation compte|tous|Baudouin & Quentin|1|
|ControleurAccueil||vueAccueil|page d'accueil + identification|tous|Nicolas & Vincent|1|
|ControleurUserProfile|UserProfile|vueUserProfile|page de profil utilisateur|tous|Nicolas & Vincent|1|
|ControleurProductsList|Produit|vueProductsList|page liste produits|tous|Guillaume & Qi|1|
|ControleurProduct|Produit|vueProduct|page produit (gestion du panier)|tous|Magaly & Cuize|2|
|ControleurTunnel|Tunnel|vueTunnel|tunnel de commande (recap panier + selection livraison + choix paiement) en une ou plusieurs page|tous|Francis & Kevin|3|
|ControleurConfirmation||vueConfirmation|page de confirmation (pour les architectes)|tous|Nicolas & Vincent|3|
|ControleurCompteClient||vueCompteClient|recapitulatif compte client (moteur de recherche par date de commande)|admin|Sylvain & Timothée|4|
|ControleurAdministrationProduit|AdministrationProduit|vueAdministrationProduit|administration produit (ajout prd + modif prix + gestion des categories)|admin|Pierre & Julien|4|
|ControleurAdministrationUser|AdministrationUser|vueAdministrationUser|administration user limiter a role admin (validation compte/ gestion autorisation/suppression de compte)|admin|Romain & Vivien|4|
|ControleurChiffreDAffaire||vueChiffreDAffaire|visu chiffre d'affaire (formulaire de recherche mois/année)|admin|Quentin|4|
|ControleurAdministrationPaiement|AdministrationPaiementLivraison|vueAdministrationPaiement|administration des moyens de paiement|admin|Baudouin|4|
|ControleurFaq||vueFaq|faq|tous|?|5|
|ControleurRecherche|Recherche|vueRecherche|recherche produit|tous|Baudouin & Quentin|5|
