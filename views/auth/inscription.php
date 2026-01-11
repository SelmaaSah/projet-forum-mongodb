<?php require 'views/partials/header.php'; ?>

<h2>Créer un compte</h2>

<form action="index.php?action=register" method="POST">
    <div>
        <label>Pseudo :</label>
        <input type="text" name="pseudo" required>
    </div>
    <br>
    <div>
        <label>Mot de passe :</label>
        <input type="password" name="password" required>
    </div>
    <br>
    <button type="submit">S'inscrire</button>
</form>

<p>Déjà un compte ? <a href="index.php?action=login">Se connecter</a></p>

<?php require 'views/partials/footer.php'; ?>
