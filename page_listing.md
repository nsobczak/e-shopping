# page listing

|Controleur|Modele|Vue|Description|Niveau d'autorisation|Attribué à|Priorité|
|---|---|---|---|---|---|---|
||||Inscription/ creation compte|tous|Baudouin & Quentin|1|
|ControleurAccueil||vueAccueil|page d'accueil + identification|tous|Nicolas & Vincent|1|
|ControleurUserProfile|UserProfile|vueUserProfile|page de profil utilisateur|tous|Nicolas & Vincent|1|
|ControleurProductsList||vueProductsList|page liste produits|tous|Guillaume & Qi|1|
|ControleurProduct|Product|vueProduct|page produit 1 (gestion du panier/ formulaire de recherche)|tous||2|
|ControleurProduct|Product|vueProduct|page produit 2 (gestion du panier/ formulaire de recherche)|tous|Magaly & Cuize|2|
|ControleurProduct|Product|vueProduct|page produit 3 (gestion du panier/ formulaire de recherche)|tous||2|
|ControleurTunnel||vueTunnel|tunnel de commande (recap panier + selection livraison + choix paiement) en une ou plusieurs page|tous|Francis & Kevin|3|
|ControleurConfirmation||vueConfirmation|page de confirmation (pour les architectes)|tous|Nicolas & Vincent|3|
|ControleurCompteClient||vueCompteClient|recapitulatif compte client (moteur de recherche par date de commande)|admin|Sylvain & Timothée|4|
|ControleurAdministrationProduit||vueAdministrationProduit|administration produit (ajout prd + modif prix + gestion des categories)|admin|Pierre & Julien|4|
|ControleurAdministrationUser||vueAdministrationUser|administration user limiter a role admin (validation compte/ gestion autorisation/suppression de compte)|admin|Romain & Vivien|4|
|ControleurChiffreDAffaire||vueChiffreDAffaire|visu chiffre d'affaire (formulaire de recherche mois/année)|admin||4|
|ControleurAdministrationPaiementLivraison||vueAdministrationPaiementLivraison|administration des moyens de paiement et mode de livraison|admin||4|
|ControleurFaq||vueFaq|faq|tous||5|