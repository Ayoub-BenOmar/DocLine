# DocLine 🏥

![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-6.0-646CFF?style=for-the-badge&logo=vite&logoColor=white)

**DocLine** est une plateforme web sécurisée dédiée à la gestion des rendez-vous médicaux, au suivi des dossiers patients et à la génération de prescriptions. Elle facilite l'interaction entre les médecins et les patients tout en offrant aux administrateurs des outils puissants de supervision.

---

## 🚀 Fonctionnalités Principales

- **Pour les Patients** :
  - Recherche de médecins par spécialité et localisation.
  - Prise de rendez-vous en ligne 24/7.
  - Accès à l'historique des consultations et prescriptions.

- **Pour les Médecins** :
  - Gestion de l'agenda et des disponibilités.
  - Accès rapide aux dossiers médicaux des patients.
  - Outil de génération de prescriptions numériques.

- **Pour les Administrateurs** :
  - Gestion des utilisateurs (Validation des comptes médecins).
  - Supervision du contenu et des signalements.

---

## 🏗️ Architecture Technique

Le projet est construit sur une stack moderne et robuste :

- **Backend** : [Laravel 12](https://laravel.com) - Framework PHP élégant et performant.
- **Frontend** : [Blade](https://laravel.com/docs/blade) (Moteur de template) + [Tailwind CSS 4](https://tailwindcss.com) (Styling utility-first).
- **Base de Données** : MySQL / SQLite.
- **Build Tool** : [Vite](https://vitejs.dev) - Compilation rapide des assets.

---

## 🛠️ Installation

Suivez ces étapes pour configurer le projet en local.

### Prérequis

Assurez-vous d'avoir installé :
- [PHP](https://www.php.net/) (version 8.2 ou supérieure)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) & NPM

### Étapes d'installation

1.  **Naviguer vers le dossier du code source** :
    Le code source de l'application se trouve dans `Dossier Principal/Implimentation/Code source`.
    ```bash
    cd "Dossier Principal/Implimentation/Code source"
    ```

2.  **Installer les dépendances PHP** :
    ```bash
    composer install
    ```

3.  **Installer les dépendances JavaScript** :
    ```bash
    npm install
    ```

4.  **Configurer l'environnement** :
    Copiez le fichier d'exemple `.env` et générez la clé d'application.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5.  **Configurer la Base de Données** :
    - Ouvrez le fichier `.env` et configurez vos accès à la base de données (DB_DATABASE, DB_USERNAME, etc.).
    - Pour utiliser SQLite (par défaut pour le dev rapide), assurez-vous que le fichier `database/database.sqlite` existe (il est souvent créé automatiquement ou via la commande suivante).

    Lancez les migrations pour créer les tables :
    ```bash
    php artisan migrate
    ```

---

## 💻 Lancer l'Application

Vous pouvez lancer l'ensemble de l'environnement de développement avec une seule commande (grâce au script configuré dans `composer.json`) :

```bash
composer dev
```
*Cette commande lance simultanément le serveur Laravel, le worker de queue, les logs Pail et le serveur de développement Vite.*

### Lancement Manuel (Alternative)

Si vous préférez lancer les services séparément dans des terminaux distincts :

**Terminal 1 (Serveur PHP)** :
```bash
php artisan serve
```

**Terminal 2 (Compilation Assets)** :
```bash
npm run dev
```

---

## 📂 Structure du Répertoire

- **`app/`** : Cœur de la logique applicative (Models, Controllers, Services).
- **`resources/views/`** : Templates Blade pour l'interface utilisateur.
- **`routes/`** : Définitions des URLs (web.php, api.php).
- **`database/`** : Migrations et Seeders pour la structure de la base de données.
- **`public/`** : Point d'entrée web (index.php) et assets compilés.

---

<p align="center">
  <i>Réalisé dans le cadre du Projet de Fin d'Études - Année 2025/2026</i>
</p>
