<?php require 'views/partials/header.php'; ?>

<section>
    <h2><span class="material-symbols-outlined">forum</span> Créer un nouveau sujet</h2>
    
    <form action="index.php?action=createTopic" method="POST">
        <div class="monForm">
            <label>Titre du sujet :</label>
            <input type="text" name="title" placeholder="De quoi voulez-vous parler ?" required>
        </div>
        
        <div class="monForm">
            <label>Message :</label>
            <textarea name="content" rows="5" style="width:100%; border-radius:4px; padding:1rem; border:1px solid #ccc; font-family:inherit;" required></textarea>
        </div>
        <br>
        <button type="submit" class="btn-primary">Publier le sujet</button>
    </form>
</section>

<?php require 'views/partials/footer.php'; ?>