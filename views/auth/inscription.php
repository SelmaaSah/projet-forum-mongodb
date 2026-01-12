<?php require 'views/partials/header.php'; ?>



<form action="index.php?action=register" method="POST" class="section">
    <h2>Créer un compte</h2>
    <div class="monForm">
        <label>Pseudo :</label>
        <input type="text" name="pseudo" required>
    </div>
    <br>
    <div class="monForm">
        <label>Mot de passe :</label>
        <input type="password" name="password" required>
    </div>
    <br>
    <button type="submit" class="btn-primary">S'inscrire</button>
    <p>Déjà un compte ? <a href="index.php?action=login">Se connecter</a></p>
</form>

<?php require 'views/partials/footer.php'; ?>
