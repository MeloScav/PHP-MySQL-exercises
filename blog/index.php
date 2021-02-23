<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les news</title>
</head>
<body>

    <h1>Bienvenue sur mon blog !</h1>
    <h2>Voici les derniers nouvelles du blog :</h2>

    <?php
    
    // Connection to the database
    require("./database.php");

    $response = $db->query('SELECT ID, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y %H:%i") AS date_news FROM news');

    while ($data = $response->fetch()) {
    ?>

        <div class="container">
            <div class="header-news">
                <h3><?php echo $data['title'] ?></h3>
                <p><?php echo $data['date_news'] ?></p>
            </div>
            <div class="content-news">
                <p><?php echo $data['content'] ?></p>
            </div>
            <a href="comments.php?news=<?php echo $data['ID']?>">
                Commentaires
            </a>
        </div>

    <?php
    }
    $response->closeCursor();
    $db = null;
    ?>
    
</body>
</html>