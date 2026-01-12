<?php require 'views/partials/header.php'; ?>

<?php if (isset($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<form action="index.php?action=login" method="POST" class="section">
    <h2>Veuillez vous connecter</h2>
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
    <button type="submit" class="btn-primary ">Se connecter</button>
    <p>Pas encore de compte ? <a href="index.php?action=register">S'inscrire</a></p>
</form>

<?php require 'views/partials/footer.php'; ?>
