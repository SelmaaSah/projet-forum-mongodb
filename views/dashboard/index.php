<?php require 'views/partials/header.php'; ?>

<section class="section" style="padding: 20px;">
    <h2>Tableau de Bord de <?= htmlspecialchars($_SESSION['pseudo']) ?></h2>
    <br>
    <h3>Statistiques de mes sujets</h3>
    
    <table style="width:100%; border-collapse: collapse; margin-top: 1rem; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background: #6c63ff; color: white; text-align: left;">
                <th style="padding: 15px; border: 1px solid #ddd;">Titre du Sujet</th>
                <th style="padding: 15px; border: 1px solid #ddd;">Nombre de réponses</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($userTopics)): ?>
                <tr>
                    <td colspan="2" style="padding: 20px; text-align: center;">Vous n'avez pas encore créé de sujet.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($userTopics as $stat): ?>
                    <tr>
                        <td style="padding: 12px; border: 1px solid #ddd;">
                            <strong><?= htmlspecialchars($stat->title) ?></strong>
                        </td>
                        <td style="padding: 12px; border: 1px solid #ddd; font-weight: bold; color: #6c63ff;">
                            <?= $stat->count ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</section>

<?php require 'views/partials/footer.php'; ?>