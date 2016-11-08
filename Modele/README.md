# Modele
Ce dossier est destiné à accueillir les modeles du site.

## Rôle du modèle 
- données (accès et mise à jour)

## Modele.php
Classe abstraite, mère des sous-classes de modèle. Elle permet de se connecter à la base de données et d'exécuter des requêtes.

## \<Nom_du_modele\>.php
Classe correspondant à un modèle. Elle hérite de la classe abstraite Modele.php.
