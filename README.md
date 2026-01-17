# 🎯 TalentHub - Plateforme de Recrutement

Système d'authentification multi-rôles développé en PHP OOP pur avec architecture MVC sans framework.

## 📋 Table des matières

- [Fonctionnalités](#fonctionnalités)
- [Technologies utilisées](#technologies-utilisées)
- [Architecture](#architecture)
- [Installation](#installation)
- [Utilisation](#utilisation)
- [Sécurité](#sécurité)
- [Comptes de test](#comptes-de-test)

## ✨ Fonctionnalités

### Authentification
- ✅ Inscription (Candidat et Recruteur uniquement)
- ✅ Connexion (tous les rôles)
- ✅ Déconnexion
- ✅ Hashing sécurisé des mots de passe
- ✅ Validation des données

### Gestion des rôles
- 👤 **Candidate** : Accès au dashboard candidat
- 🏢 **Recruiter** : Accès au dashboard recruteur (+ nom d'entreprise)
- 🛡️ **Admin** : Accès au back-office admin

### Protection des routes
- Routes publiques : `/`, `/register`, `/login`
- Routes protégées par rôle : `/candidate/*`, `/recruiter/*`, `/admin/*`
- Middleware d'authentification et d'autorisation

## 🛠️ Technologies utilisées

- **PHP 8** (Programmation Orientée Objet)
- **MySQL** avec PDO (Singleton Pattern)
- **Apache** avec mod_rewrite
- **Architecture MVC** pure (sans framework)

## 🏗️ Architecture

```
talenthub/
├── config/                 # Configuration
│   └── database.php       # Configuration BDD
├── src/                   # Code source
│   ├── Controllers/       # Contrôleurs
│   ├── Models/           # Modèles
│   ├── Middleware/       # Middlewares
│   ├── Core/             # Classes core (Router, View)
│   └── helpers.php       # Fonctions utilitaires
├── views/                # Vues
│   ├── layouts/          # Layouts
│   ├── auth/             # Vues authentification
│   ├── candidate/        # Vues candidat
│   ├── recruiter/        # Vues recruteur
│   ├── admin/            # Vues admin
│   └── errors/           # Pages d'erreur
├── public/               # Dossier public
│   └── index.php         # Point d'entrée unique
└── database/             # Scripts SQL
    └── schema.sql        # Schéma de la base
```

### Flux de requête

```
Client → .htaccess → index.php → Router → Middleware → Controller → Model → View → Client
```

## 📥 Installation

### Prérequis

- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- Apache avec mod_rewrite activé
- Composer (optionnel)

### Étapes d'installation

1. **Cloner ou télécharger le projet**

```bash
git clone https://github.com/a-oirgari/sprint5brief1.git
cd sprint5brief1
```

2. **Configurer la base de données**

Créez la base de données et importez le schéma :

```bash
mysql -u root -p < database/schema.sql
```

3. **Configurer la connexion à la base de données**

Modifiez `config/database.php` avec vos paramètres :

```php
return [
    'host' => 'localhost',
    'dbname' => 'talenthub',
    'username' => 'root',
    'password' => '',
    // ...
];
```

4. **Configurer Apache**

Assurez-vous que le `DocumentRoot` pointe vers le dossier `public/` :

```apache
<VirtualHost *:80>
    DocumentRoot "/chemin/vers/talenthub/public"
    <Directory "/chemin/vers/talenthub/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

5. **Activer mod_rewrite** (si nécessaire)

```bash
sudo a2enmod rewrite
sudo service apache2 restart
```

6. **Accéder à l'application**

Ouvrez votre navigateur : `http://localhost`

## 🚀 Utilisation

### Inscription

1. Accédez à `/register`
2. Remplissez le formulaire :
   - Nom complet
   - Email
   - Rôle (Candidat ou Recruteur)
   - Nom d'entreprise (si Recruteur)
   - Mot de passe (min 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial)
3. Cliquez sur "S'inscrire"

### Connexion

1. Accédez à `/login`
2. Entrez votre email et mot de passe
3. Vous serez redirigé vers votre dashboard selon votre rôle

### Navigation

- **Candidat** : `/candidate/dashboard`
- **Recruteur** : `/recruiter/dashboard`
- **Admin** : `/admin/dashboard`

## 🔐 Sécurité

### Mesures implémentées

✅ **Hashing des mots de passe** : `password_hash()` avec algorithme bcrypt

✅ **Requêtes préparées PDO** : Protection contre les injections SQL

✅ **Validation des entrées** : Validation côté serveur de tous les inputs

✅ **Sessions sécurisées** : Régénération de l'ID de session à la connexion

✅ **Protection CSRF** : À implémenter dans les prochaines versions

✅ **XSS Prevention** : Échappement des données avec `htmlspecialchars()`

✅ **Contrôle d'accès** : Middleware vérifiant les permissions

✅ **Séparation des responsabilités** : Architecture MVC stricte

### Validation des mots de passe

Le mot de passe doit contenir :
- Au moins 8 caractères
- Au moins 1 majuscule
- Au moins 1 minuscule
- Au moins 1 chiffre
- Au moins 1 caractère spécial (@$!%*?&#)

## 👥 Comptes de test

### Administrateur
- **Email** : `admin@talenthub.com`
- **Mot de passe** : `Admin@123`

### Candidat
- **Email** : `candidate@test.com`
- **Mot de passe** : `Candidate@123`

### Recruteur
- **Email** : `recruiter@test.com`
- **Mot de passe** : `Recruiter@123`
- **Entreprise** : TechCorp SA

## 📝 Patterns utilisés

- **MVC** : Séparation Model-View-Controller
- **Singleton** : Pour la connexion PDO
- **Front Controller** : Point d'entrée unique via index.php
- **Dependency Injection** : Dans les contrôleurs

## 🎓 Objectifs pédagogiques atteints

✅ Architecture MVC pure sans framework

✅ Système de routage centralisé

✅ Séparation claire des responsabilités

✅ Authentification multi-rôles sécurisée

✅ Protection des routes avec middleware

✅ PDO Singleton pour la base de données

✅ Requêtes préparées pour la sécurité

✅ Validation des données utilisateur

## 🚧 Évolutions futures

- [ ] Gestion complète du profil utilisateur
- [ ] Système de récupération de mot de passe
- [ ] Protection CSRF
- [ ] Upload d'avatar
- [ ] Tableau de bord avec statistiques réelles
- [ ] API REST
- [ ] Tests unitaires et fonctionnels

## 📄 Licence

Ce projet est un exercice pédagogique développé dans le cadre d'une formation en PHP OOP.

## 👨‍💻 Auteur

Développé dans le cadre du projet TalentHub 

---

**Note** : Ce projet est un socle technique destiné à être enrichi avec des fonctionnalités métier (offres d'emploi, candidatures, messaging, etc.).