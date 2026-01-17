<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum MongoDB</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    
    <link rel="stylesheet" href="views/assets/style.css">
</head>
<body>
    
    <header class="main-header">
        <div class="header-container">
            <a href="index.php" class="brand-logo">
                <div class="logo-icon">
                    <span class="material-symbols-outlined">forum</span>
                </div>
                <span>Forum CFA des Sciences</span>
            </a>

            <nav class="header-nav">
                <a href="index.php" class="nav-item">
                    <span class="material-symbols-outlined">home</span>
                    <span class="link-text">Accueil</span>
                </a>

                <div class="divider-vertical"></div>

                <?php if (isset($_SESSION['pseudo'])): ?>
                    <div class="user-widget">
                        <div class="user-avatar">
                            <?= strtoupper(substr($_SESSION['pseudo'], 0, 1)) ?>
                        </div>
                        <div class="user-details">
                            <span class="pseudo"><?= htmlspecialchars($_SESSION['pseudo']) ?></span>
                            <a href="index.php?action=logout" class="logout-btn">
                                <span class="material-symbols-outlined" style="font-size: 1.2rem;">logout</span> Déconnexion
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="auth-buttons">
                        <a href="index.php?action=login" class="btn-outline">Connexion</a>
                        <a href="index.php?action=register" class="btn-filled">Inscription</a>
                    </div>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main>
