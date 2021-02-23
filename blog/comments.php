<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires</title>
</head>
<body>
    <h1>Commentaires</h1>
    <a>Retour</a>

    <?php
        // Connection to the database
        require("./database.php");

        $id_news= $_GET['news'];
    
        $request = $db->prepare('SELECT new_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y %H:%i") AS comment_date_new FROM comments GROUP BY new_id HAVING new_id = :url_id');

        $request->execute(array(':url_id' => $id_news));

        while($data = $request->fetch()) {
    ?>
        <div class="container">
            <div class="header-comments">
                <h3><?php echo $data['author'] ?></h3>
                <p><?php echo $data['comment_date_new'] ?></p>
            </div>
            <div class="content-comment">
                <p><?php echo $data['comment'] ?></p>
            </div>
        </div>
    <?php
        }

        $request->closeCursor();
        $db = null;
    ?>
</body>
</html>