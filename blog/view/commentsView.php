<?php $title = 'Les commentaires'; ?>
<?php ob_start(); ?>

    
    <h1>Bienvenue sur mon blog !</h1>
    <a class="btn" href="index.php?action=news">Retour</a>

    <?php

        if(!empty($data_news)) {
    ?>
        <div class="container">
            <div class="container-news">
                <div class="header-news">
                    <h3><?= htmlspecialchars($data_news['title']); ?></h3>
                    <p><?= htmlspecialchars($data_news['date_news']); ?></p>
                </div>
                <div class="content-news">
                    <p><?= nl2br(htmlspecialchars($data_news['content'])); ?></p>
                </div>
            </div>
    <?php
        $request_news->closeCursor();
    ?>

            <div class="container-comments">
                <h2>Commentaires</h2>
        
    <?php

        if(!empty($data)) {
            while($data = $request_comments->fetch()) {
    ?>
                <div class="container-comments">
                    <div class="header-comments">
                        <h3><?= htmlspecialchars($data['author']); ?></h3>
                        <p><?= htmlspecialchars($data['comment_date_new']); ?></p>
                    </div>
                    <div class="content-comment">
                        <p><?= nl2br(htmlspecialchars($data['comment'])); ?></p>
                    </div>
                </div>
    <?php
            }
        }else {
            echo '<p class="no-messages">Il n\'y a pas encore de message pour cet article.</p>';
        }
        $request_comments->closeCursor();
        $db = null;
    ?>
            </div>
    </div>
   
    <?php require('form.php'); ?>
    <?php
        } else {
            echo '<p class="error">Cet article n\'existe pas.</p>';
        }
    ?>
    <script src="public/js/script.js"></script>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>