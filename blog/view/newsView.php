<?php $title = 'Les news'; ?>
<?php ob_start(); ?>

    <h1>Bienvenue sur mon blog !</h1>
    <h2>Voici les derniers nouvelles du blog :</h2>

    <div class="container">
        <?php
        while ($data = $request->fetch()) {
        ?>

            <div class="container-news">
                <div class="header-news">
                    <h3><?= htmlspecialchars($data['title']); ?></h3>
                    <p><?= htmlspecialchars($data['date_news']); ?></p>
                </div>
                <div class="content-news">
                    <p><?= nl2br(htmlspecialchars($data['content'])); ?></p>
                </div>
                <a class="btn" href="index.php?action=comments&id-news=<?= $data['ID'];?>">
                    Commentaires
                </a>
            </div>

        <?php
        }
        $request->closeCursor();
        $db = null;
        ?>
    </div>
    <?php include('paging.php'); ?>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
    
