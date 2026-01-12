<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum MongoDB</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="/views/assets/style.css">
</head>
<body>
    <header>
        <h1><a href="index.php">Forum CFA des Sciences</a></h1>
        <nav class="main-nav">
    <div class="nav-links">
        <a href="index.php">Accueil</a>
    </div>

    <div class="user-status">
        <?php if (isset($_SESSION['pseudo'])): ?>
            <div class="user-logged">
                <div class="user-info">
                    <p>connecté en tant que <strong><?= htmlspecialchars($_SESSION['pseudo']) ?></strong><br/>
                    <a href="index.php?action=logout" class="logout-link">Déconnexion</a>
                </div>
            </div>
        <?php else: ?>
            <a href="index.php?action=login">Connexion</a>
        <?php endif; ?>
    </div>
</nav>
        <hr>
    </header>
    <main>
