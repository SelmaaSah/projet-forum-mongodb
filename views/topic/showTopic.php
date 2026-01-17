<?php require 'views/partials/header.php'; ?>

<section>
    <a href="index.php" style="font-size: 0.8rem;">← Retour aux sujets</a>
    <hr>
    <h2><?= htmlspecialchars($topic->title) ?></h2>
    <p style="background: #f9f9f9; padding: 1rem; border-radius: 8px; border: 1px solid #eee;">
        <?= nl2br(htmlspecialchars($topic->content)) ?>
    </p>
    <small>
        Posté par <strong><?= htmlspecialchars($topic->pseudo) ?></strong>
        <span style="color: #888;">
            le <?= $topic->created_at->toDateTime()->format('d/m/Y à H:i') ?>
        </span>
    </small>
</section>

<section>
    <h3>Discussions</h3>
    <?php foreach ($messages as $msg): ?>
        <div style="margin-left: <?= $msg->parent_id ? '40px' : '0' ?>; 
                    border-left: 3px solid <?= $msg->parent_id ? '#ccc' : '#6c63ff' ?>; 
                    padding: 10px; margin-bottom: 15px; background: #fff;">
            
            <p style="margin: 0;"><?= nl2br(htmlspecialchars($msg->content)) ?></p>
            
            <small style="color: #666;">
                Par <?= htmlspecialchars($msg->pseudo) ?> 
                
                le <?= $msg->created_at->toDateTime()->format('d/m/Y à H:i') ?> 
                | 
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="#form-reply" style="color: #6c63ff;" 
                       onclick="document.getElementById('p_id').value='<?= $msg->_id ?>'; 
                                document.getElementById('reply_title').innerText='Répondre à <?= htmlspecialchars($msg->pseudo) ?>';">
                        Répondre
                    </a>
                <?php endif; ?>
            </small>
        </div>
    <?php endforeach; ?>

    <hr id="form-reply">
    <?php if (isset($_SESSION['user_id'])): ?>
        <h4 id="reply_title">Ajouter une réponse au sujet</h4>
        <form action="" method="POST">
            <input type="hidden" name="parent_id" id="p_id" value="">
            
            <textarea name="content" rows="3" style="width:100%; border-radius:4px; padding:10px;" placeholder="Votre message..." required></textarea>
            
            <div style="margin-top: 10px;">
                <button type="submit" class="btn-primary" style="background:#6c63ff;">Envoyer</button>
            </div>
        </form>
    <?php else: ?>
        <p class="msg-default">Veuillez vous <a href="index.php?action=login">connecter</a> pour participer.</p>
    <?php endif; ?>
</section>

<?php require 'views/partials/footer.php'; ?>
