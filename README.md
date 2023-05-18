Déploiement en local d'un site Symfony avec Composer et NPM
Prérequis
PHP 7.2 ou supérieur
Composer
Node.js et NPM
Installation
Clonez le dépôt Git sur votre machine locale :
git clone https://github.com/mon-projet.git

Installez les dépendances PHP avec Composer :
composer install

Installez les dépendances JavaScript avec NPM :
npm install

Créez la base de données :
php bin/console doctrine:database:create

Mettez à jour le schéma de la base de données :
php bin/console doctrine:schema:update --force

Ajouter les données dans la base de données :
php bin/console doctrine:fixtures:load

Lancez le serveur de développement :
php bin/console server:run

