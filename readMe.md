# 📌 Projet Forum MongoDB — PHP (Architecture MVC)

## 🧾 Description du projet

**projet-forum-mongodb** est une application web de forum développée en **PHP** avec une base de données **MongoDB**, respectant l’**architecture MVC (Modèle – Vue – Contrôleur)**.

L’application a été enrichie pour permettre une expérience interactive complète entre les utilisateurs.

### ✅ Fonctionnalités implémentées
- **Gestion des Utilisateurs** : Inscription avec hachage de mot de passe et connexion sécurisée.
- **Création de Sujets** : Les utilisateurs connectés peuvent publier de nouveaux sujets de discussion.
- **Système de Réponses Imbriquées** :
    - Possibilité de répondre directement à un sujet.
    - Possibilité de répondre à une réponse existante pour créer un fil de discussion (système de commentaires en cascade).
- **Interface Dynamique** : Affichage des sujets récents sur l'accueil et consultation détaillée d'un sujet avec ses messages.
- **Design & Ergonomie** : Barre de navigation adaptative montrant le pseudo de l'utilisateur et boutons harmonisés en violet (`#6c63ff`).

---

## 🛠️ Technologies utilisées

- **PHP** (Moteur de l'application)
- **MongoDB** (Base de données NoSQL)
- **HTML5 / CSS3** (Interface responsive et icônes Material Symbols)
- **Architecture MVC** (Séparation des responsabilités)
- **WAMP / Docker**


---

## ⚙️ Configuration et Installation

* **Base de données** : Le projet utilise une base de données MongoDB nommée `bdd-forum`.
* **Collections requises** :
    * `users` : Stocke les informations de compte et les hachages de mots de passe.
    * `topic` : Stocke les titres, les contenus des discussions et les informations de l'auteur.
    * `message` : Stocke les réponses liées par `topic_id` et gère l'imbrication via `parent_id`.
* **Variable d'environnement** : L'hôte MongoDB est configuré de manière dynamique : il récupère la valeur `DB_HOST` (idéal pour Docker) ou utilise `localhost` par défaut.

## 📁 Architecture du projet

```text
projet-forum-mongodb
│
├── config/
│   └── Manager.php            # Connexion au driver MongoDB et méthodes CRUD génériques
│
├── controllers/
│   ├── Auth.php
│   ├── Topic.php              # Logique pour afficher, créer des sujets et gérer les réponses
│   ├── Message.php
│   └── Users.php              # Logique d'authentification (login, register, logout)
│
├── models/
│   ├── MessageManager.php     # Gestion de la collection 'message' (réponses imbriquées)
│   ├── TopicManager.php       # Gestion de la collection 'topic'
│   └── UserManager.php        # Gestion de la collection 'users'
│
├── views/
│   ├──assets/
│   │   ├──style.css           # Charte graphique du forum
│   ├── auth/
│   │   ├── connexion.php      # Formulaire de login
│   │   └── inscription.php    # Formulaire d'enregistrement
│   ├── topic/
│   │   ├── commentTopic.php
│   │   ├── createTopic.php    # Formulaire de nouveau sujet
│   │   └── showTopic.php      # Page de lecture et de réponse (fil de discussion)
│   └── partials/
│       ├── header.php         # En-tête avec navigation et statut utilisateur
│       └── footer.php         # Pied de page
│
└── index.php                  # Routeur principal gérant les actions (switch case)

```

- **Participantes du projet** : Souare Khadidiatou | Sahraoui Selma
- **Formation** : LP PROJET WEB
- **Date** : Janvier 2026
