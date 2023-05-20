
# ECF - restaurant - Le Quai Antique

Création d'un site pour le restaurant "Le Quai Antique" dans le carde d'une évaluation.



## Prérequis

- PHP 8 ou supérieur
- Symfony 5.4 (LTS)
- XAMMP, MAMP ou autre pour la database
- Composer
- Node.js
- npm ( ou yarn)
- utilisation d'un mail catcher ( mailtrap / mailhog)

## Déploiement en local

Cloner le projet
```bash
  git clone https://github.com/R-Thibault/le_quai_antique.git
```

Aller dans le dossier du projet
```bash
  cd my-project
```

Installer les dépendances :

- PHP avec Composer :
```bash
  composer install
```

- JavaScript avec NPM ou YARN :
```bash
  npm install
  
  yarn install
```

Copier le fichier .env en .env.local et modifiez les variables d'environnement:

- DATABASE_URL selon la base de donnée que vous utilisez
- MAILER_DSN, MailTrap conseillé et facile a utiliser (validation de la création de comptes avec envoie de mail, envoie de mail pour le formulaire de reservation)

Initialisation de la base de donnée:

- création de la base de donnée :
```bash
  php bin/console doctrine:database:create
```
- éxécution les migrations d'entité :
```bash
  php bin/console doctrine:migrations:migrate
```

Utilisation :

- compilation des fichier Javascript et CSS :
```bash
  npm run watch

  yarn run dev
```

- démarrage du serveur web:
```bash
  php bin/console server:run
```

- Ouvrez un navigateur et accédez à l'URL http://localhost:8000 pour accéder au site web