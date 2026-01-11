# 📌 Projet Forum MongoDB — PHP (Architecture MVC)

## 🧾 Description du projet

**projet-forum-mongodb** est une application web de forum développée en **PHP** avec une base de données **MongoDB**, respectant l’**architecture MVC (Modèle – Vue – Contrôleur)**.

L’application permet aux utilisateurs de :
- créer un compte et se connecter,
- créer des sujets de discussion,
- répondre à des sujets ou à des réponses (fils de discussion),
- consulter les sujets récents,
- afficher des statistiques sur les discussions.

L’interface de l’application est entièrement **en français**.

---

## 🛠️ Technologies utilisées

- **PHP**
- **MongoDB**
- **HTML / CSS**
- **Architecture MVC**
- **html-parser-php**

---

## 📁 Architecture du projet

```text
projet-forum-mongodb
│
├── config/
│   └── Manager.php
│
├── controllers/
│   ├── Auth.php
│   ├── Topic.php
│   ├── Message.php
│   └── Users.php
│
├── models/
│   ├── MessageManager.php
│   ├── TopicManager.php
│   └── UserManager.php
│
├── views/
│   ├── auth/
│   │   ├── connexion.php
│   │   └── inscription.php
│   ├── topic/
│   │   ├── commentTopic.php
│   │   ├── createTopic.php
│   │   └── showTopic.php
│   └── partials/
│       ├── header.php
│       └── footer.php
│
└── index.php
