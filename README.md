# Application Web Docker PHP/MySQL

Cette application démontre l'utilisation de Docker pour déployer une architecture web complète avec PHP et MySQL.

## Structure du projet

- `docker-compose.yml`: Configuration des services Docker
- `docker/`: Fichiers de configuration Docker
  - `php/`: Configuration du conteneur PHP/Apache
  - `mysql/`: Configuration et initialisation MySQL
- `src/`: Code source de l'application PHP (architecture MVC)
  - `config/`: Configuration de l'application
  - `controllers/`: Contrôleurs MVC
  - `models/`: Modèles de données
  - `views/`: Templates d'affichage

## Prérequis

- Docker
- Docker Compose

## Installation

1. Clonez ce dépôt
2. Lancez les conteneurs avec `docker-compose up -d`
3. Accédez à l'application via `http://localhost:8080`

## Fonctionnalités

- Gestion des clients (liste, ajout, modification, suppression)
- Gestion des commandes (liste, ajout, modification, suppression)
- Relation entre clients et commandes

## Technologies utilisées

- Docker & Docker Compose
- PHP 8.1
- Apache
- MySQL 8.0
- Bootstrap 5

