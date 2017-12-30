# Projet 7 - Créez un site e-commerce exposant une API

Cette API a été réalisé pour le projet 7 du parcours Développeur d'application - PHP / Symfony d'OpenClassrooms.
J'ai utilisé comme base Symfony Standard Edition.

Les diagrammes de ce projet sont dans le dossier UML.

This API has been made for the seventh project of OpenClassrooms path Application Developer - PHP / Symfony.
I used Symfony Standard Edition as a starter.

In the UML folder, you can find the diagrams of this project.

## Installation

Clonez le repository GitHub et tapez les commandes suivantes :
- Entrez vos identifiants de connexion à la base de données dans app/config/parameters.yml
- composer install
- php bin/console doctrine:database:create
- php bin/console doctrine:schema:create
- php bin/console doctrine:fixtures:load (si vous voulez utiliser les fixtures)

Pour créer un Client :
- php bin/console CreateClient --redirect_url=WEBSITE_URL

Vos identifiants d'API (client_id et client_secret) seront écrits en réponse.

Comment créer un utilisateur :
- Voir BileMo_doc : /register

Les méthodes d'autorisation de cette API sont : Implicit, Password et Authorization Code.

Comment avoir un Token :
Faites une requête POST sur /oauth/v2/token avec les paramètres suivants :
- client_id = CLIENT_ID
- client_secret = CLIENT_SECRET
- redirect_uri = REDIRECT_URI (Optionnel)
- grant_type = password
- username = USERNAME
- password = PASSWORD

Pour accèder à l'API, il faut ensuite envoyer une requête avec un en-tête de type Autorisation = 'Bearer ' + le token de l'utilisateur.

La documentation de l'API se trouve dans le fichier BileMo_doc.md et vous pouvez également la consulter en ligne à l'adresse /api/doc.

Vous pouvez également tester l'API avec [BileMo_App](https://github.com/Maxxxiimus92/p7_bilemo_app).

Clone the GitHub repository and execute the following commands :
- Enter your database settings in app/config/parameters.yml
- composer install
- php bin/console doctrine:database:create
- php bin/console doctrine:schema:create
- php bin/console doctrine:fixtures:load (if you want to use fixtures)

To create a Client:
- php bin/console CreateClient --redirect_url=WEBSITE_URL

Your API credentials (client_id and client_secret) will be written in response.

How to create a user:
- See BileMo_doc : /register

The Authorizations type for this API are : Implicit, Password and Authorization Code.

How to get a Token:
Make a POST request on /oauth/v2/token with the following parameters:
- client_id = CLIENT_ID
- client_secret = CLIENT_SECRET
- redirect_uri = REDIRECT_URI (Optional)
- grant_type = password
- username = USERNAME
- password = PASSWORD

To access the API, you have to send a request with a header Authorization = 'Bearer ' + the user's token.

The API documentation is located in the BileMo_doc.md file and you can see it online at /api/doc.

You can also test this API with [BileMo_App](https://github.com/Maxxxiimus92/p7_bilemo_app).

## Symfony Standard Edition

Welcome to the Symfony Standard Edition - a fully-functional Symfony
application that you can use as the skeleton for your new applications.

For details on how to download and get started with Symfony, see the
[Installation](https://symfony.com/doc/3.3/setup.html) chapter of the Symfony Documentation.

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.
