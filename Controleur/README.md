# Controleur
Ce dossier est destiné à accueillir les controleurs du site.

## Rôle du controleur
- gestion des événements et synchronisation

## Routeur.php
Le routeur est le chef qui contrôle tout. Il redirige vers le controleur correspondant à l'action qui a été passée en paramètre.

## Controleur.php
Interface contenant la fonction getHHTML(). Chaque controleur doit implémenter cette interface pour être sûr de pouvoir appeler une vue.

## Controleur\<Nom_du_controleur\>.php
Il s'agit d'un controleur de base. Son rôle est de faire le lien entre le modèle et la vue. Il va par exemple récupérer les informations contenue dans la base de données et appeller la vue avec pour afficher ces données.
