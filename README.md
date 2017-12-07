# Projet 7 - Créez un site e-commerce exposant une API

Ce site a été réalisé pour le projet 7 du parcours Développeur d'application - PHP / Symfony d'OpenClassrooms.
J'ai utilisé comme base Symfony Standard Edition.

Les diagrammes de ce projet sont dans le dossier UML.

This website has been made for the seventh project of OpenClassrooms path Application Developer - PHP / Symfony.
I used for starter Symfony Standard Edition.

In the UML folder, you can find the diagrams of this project.

## Installation

Clonez le repository GitHub et tapez les commandes suivantes :
1. Entrez vos identifiants de connexion à la base de données dans app/config/parameters.yml
1. composer install
1. php bin/console doctrine:database:create
1. php bin/console doctrine:schema:create
1. php bin/console doctrine:fixtures:load (si vous voulez utiliser les fixtures)

La documentation de l'API est le fichier P7_doc et vous pouvez également le consulter en ligne à l'adresse /api/doc.

Clone the GitHub repository and execute the following commands :
1. Enter your database settings in app/config/parameters.yml
1. composer install
1. php bin/console doctrine:database:create
1. php bin/console doctrine:schema:create
1. php bin/console doctrine:fixtures:load (if you want to use fixtures)

The API documentation is the file P7_doc and you can see it online /api/doc.

## Symfony Standard Edition

Welcome to the Symfony Standard Edition - a fully-functional Symfony
application that you can use as the skeleton for your new applications.

For details on how to download and get started with Symfony, see the
[Installation](https://symfony.com/doc/3.3/setup.html) chapter of the Symfony Documentation.

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.
