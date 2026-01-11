<?php require 'views/partials/header.php'; ?>

<h2>Se connecter</h2>

<?php if (isset($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<form action="index.php?action=login" method="POST">
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
    <button type="submit">Se connecter</button>
</form>

<p>Pas encore de compte ? <a href="index.php?action=register">S'inscrire</a></p>

<?php require 'views/partials/footer.php'; ?>
