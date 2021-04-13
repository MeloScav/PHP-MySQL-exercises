<?php $title = 'Erreur'; ?>
<?php ob_start(); ?>

    <h1>Il y a une erreur !</h1>
    <p><?= $errorMessage ?></p>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>