Application Web Docker PHP/MySQL
Ce projet consiste en la création d’un portail RH de gestion de congés permettant aux employés de soumettre des demandes de congés et aux responsables de les valider ou les refuser. L’objectif principal est d’automatiser et de simplifier le processus de gestion des absences dans une entreprise.

Ce système permet :

-aux utilisateurs de faire une demande de congé via une interface simple,

-aux administrateurs/RH de consulter les demandes et de les traiter (accepter/refuser),

-de garder un historique complet des congés et du statut de chaque demande.

Cette application démontre l'utilisation de Docker pour déployer une architecture web complète avec PHP et MySQL.

Structure du projet
docker-compose.yml: Configuration des services Docker
docker/: Fichiers de configuration Docker
php/: Configuration du conteneur PHP/Apache
mysql/: Configuration et initialisation MySQL
src/: Code source de l'application PHP (architecture MVC)
config/: Configuration de l'application
controllers/: Contrôleurs MVC
models/: Modèles de données
views/: Templates d'affichage
/gestion_conges/ │ ├── config/ # Fichiers de configuration (connexion BDD, constantes) ├── public/ # Fichiers accessibles publiquement (index.php, assets) │ ├── css/ │ ├── js/ ├── src/ # Code source principal │ ├── controllers/ # Traitement des actions (demande, validation...) │ ├── models/ # Accès aux données (classes PHP liées aux tables) │ ├── views/ # Fichiers HTML/PHP affichés à l'utilisateur ├── sql/ # Scripts SQL de création de base de données ├── .env # Informations de configuration (BD, etc.) ├── README.md # Description et instructions du projet └── index.php # Page d’accueil du site

Prérequis
Docker
Docker Compose
Installation
Clonez ce dépôt
Lancez les conteneurs avec docker-compose up -d
Accédez à l'application via http://localhost:8081
Fonctionnalités
Création de comptes employés et administrateurs (optionnel)

Formulaire de demande de congé

Visualisation de ses propres demandes

Interface d’administration pour :

consulter toutes les demandes

accepter ou refuser une demande

Système de notifications basique (statut visible par l’employé)

Technologies utilisées
Docker & Docker Compose
PHP 8.1
Apache
MySQL 8.0
Bootstrap 5
Guide d'utilisation succinct
Employé :

Se connecter

Accéder au formulaire de demande

Remplir les informations nécessaires

Soumettre la demande

Suivre l’état de la demande dans son espace personnel

Administrateur :

Se connecter avec un compte RH

Accéder à la liste des demandes

Accepter ou refuser les demandes via l’interface

L’état est mis à jour automatiquement pour l’employé concerné
