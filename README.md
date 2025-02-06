# Projet Symfony - Page de Login et Inscription Sécurisée avec 2FA par Mail

Ce projet consiste à créer une page de connexion et d'inscription sécurisée avec une fonctionnalité d'authentification à deux facteurs (2FA) via email. 

L'objectif est d'offrir une sécurité renforcée pour les utilisateurs en leur permettant de recevoir un code à usage unique par email pour valider leur authentification.

## Prérequis

Avant de démarrer l'installation du projet, assurez-vous que les éléments suivants sont correctement installés sur votre machine :

### 1. **Symfony**
   - La version utilisée dans ce projet est **Symfony 7.2.3**.
   - Vous pouvez télécharger et installer Symfony à partir de [Symfony](https://symfony.com/download).

### 2. **Composer**
   - **Composer 2.8.3** est utilisé pour gérer les dépendances du projet.
   - Si Composer n'est pas encore installé sur votre machine, vous pouvez l'installer en suivant les instructions disponibles sur [getcomposer.org](https://getcomposer.org).

### 3. **PHP**
   - Ce projet nécessite **PHP 8.2.20**. Assurez-vous que cette version ou une version supérieure est installée sur votre machine.
   - Si ce n'est pas déjà fait, vous pouvez installer PHP via [PHP.net](https://www.php.net).

### 4. **Mailhog**
   - **Mailhog** est utilisé pour capturer les emails envoyés par votre application (en particulier pour la 2FA par email).
   - Téléchargez Mailhog depuis [ici](https://github.com/mailhog/MailHog) et assurez-vous qu'il fonctionne sur le port **1025**.
   - Vous pouvez démarrer Mailhog avec la commande suivante :
     ```bash
     mailhog
     ```

### 5. **MySQL**
   - Vous devez avoir une instance de **MySQL** en cours d'exécution avec les informations suivantes :
     - **Utilisateur** : `loginuser`
     - **Mot de passe** : `PasswordWebSite3`
     - Cet utilisateur doit avoir tous les droits nécessaires pour créer et gérer des bases de données.
   - Vous pouvez utiliser **phpMyAdmin** ou un autre outil de gestion pour configurer votre base de données et votre utilisateur MySQL.
```bash
CREATE USER 'loginuser'@'localhost' IDENTIFIED BY 'PasswordWebSite3';

GRANT ALL PRIVILEGES ON *.* TO 'loginuser'@'localhost' WITH GRANT OPTION;

FLUSH PRIVILEGES;
```
## Installation du Projet

### 1. **Clonez le Répertoire du Projet**

Clonez le dépôt GitHub de votre projet sur votre machine locale :
```bash
git clone https://github.com/AdrienRov/loginsecure.git

cd loginsecure
```
### 2. **Installez les Dépendances**

Utilisez **Composer** pour installer toutes les dépendances du projet :
```bash
composer install
```
### 3. **Configurez la Base de Données**

Modifiez le fichier `.env` à la racine du projet pour configurer les paramètres de la base de données MySQL. La ligne suivante doit être modifiée avec les informations de votre base de données :
```env
DATABASE_URL="mysql://loginuser:PasswordWebSite3@127.0.0.1:3306/loginuser"
```
### 4. **Créez la Base de Données**

Créez la base de données en utilisant la commande Symfony suivante :
```bash
php bin/console doctrine:database:create
```

### 5. **Exécutez les Migrations**

Exécutez les migrations pour créer les tables de la base de données :
```bash
php bin/console doctrine:migrations:migrate
```

### 6. **Lancez le Serveur Symfony**

Lancez le serveur Symfony pour exécuter l'application :
```bash
symfony server:start
```

### 7. **Accédez à l'Application**

Ouvrez votre navigateur Web et accédez à l'URL suivante pour accéder à l'application :
```
https://127.0.O.1:8000
```

### 8. **Afficher les Emails avec Mailhog**

Ouvrez votre navigateur Web et accédez à l'URL suivante pour afficher les emails envoyés par l'application :
```
https://127.0.O.1:8585
```
