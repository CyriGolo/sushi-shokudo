# Projet 3 MVC Lyon Paris A2
## Description
Ce projet est une application MVC développée dans le cadre d'EdenSchool. L'objectif du projet est de créer une application web qui respecte le modèle MVC (Modèle-Vue-Contrôleur).

## Fonctionnalités
- Gestion des utilisateurs
- Authentification et autorisation
- Création et gestion de contenus
- Tests unitaires

## Installation
1. Clonez le dépôt :
bash
```bash
1. git clone https://github.com/EdenSchoolFrance/Projet_3_MVC_Lyon_Paris_A2.git
```
2. Accédez au répertoire du projet :
```bash
cd Projet_3_MVC_Lyon_Paris_A2 && git checkout Darius
```
3. Installez les dépendances :
```bash
composer install
```
## Utilisation
1. Démarrez le serveur de développement :
```bash
php -S localhost:1234
```
2. Ouvrez votre navigateur à l'adresse http://localhost:1234.
## Structure du Projet
`models/` : Contient les fichiers de modèle.

`views/` : Contient les fichiers de vue.

`controllers/` : Contient les fichiers de contrôleur.
## Tests
Pour exécuter les tests unitaires :

```bash
.\vendor\bin\phpunit .\tests\
```
## Progrès et Problèmes Connus
- Page contact


## Les Tâches & Sous-tâches
**Temps global : 30 h 0 m**

1. **Choix des technologies** - 1 h
2. **Création et lancement du projet** - 30 m
3. **Mise en place de la base de données** - 1 h 30 m
   - Mise en oeuvre MCD et MLD - 1 h
   - Mise en oeuvre du fichier SQL sur phpMyAdmin - 30 m
4. **Développement du site** - 22 h 0 m
   - **Frontend** - 11 h 30 m
     - Maquettage & style du layout - 30 m
     - Maquettage & style de la page principale - 30 m
     - Maquettage & style des pages d'authentification - 30 m
     - Maquettage & style de la page de commande - 30 m
     - Maquettage & style des pages admin - 2 h 30 m
       - Maquettage du dashboard - 30 m
   - **Backend** - 10 h 30 m
     - Authentification - 1 h 30 m
       - Création d'un compte utilisateur - 30 m
       - Connexion d'un compte utilisateur - 30 m
       - Déconnexion d'un compte utilisateur - 30 m
     - Commande - 1 h 30 m
       - Choix des voyages - 30 m
       - Validation de la commande - 30 m
       - Historique des commandes - 30 m
     - Côté admin - 3 h
       - Utilisateur (CRUD) - 1 h 30 m
       - Rôle (CRUD) - 1 h 30 m
5. **Tests unitaires** - 2 h
6. **Rédaction du README** - 1 h
7. **Recette** - 1 h