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
    <a href="index.php">Retour</a>

    <?php
        // Connection to the database
        require("./database.php");

        $id_news= $_GET['news'];

        $request_news = $db->prepare('SELECT ID, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y %H:%i") AS date_news FROM news WHERE ID = :id_url');
        $request_news->execute(array(':id_url' => $id_news));

        while($data_news = $request_news->fetch()) {
    ?>
        <div class="container">
            <div class="header-news">
                <h3><?php echo $data_news['title'] ?></h3>
                <p><?php echo $data_news['date_news'] ?></p>
            </div>
            <div class="content-news">
                <p><?php echo $data_news['content'] ?></p>
            </div>
        </div>
    <?php
        }
    
        $request_comments = $db->prepare('SELECT new_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y %H:%i") AS comment_date_new FROM comments GROUP BY new_id HAVING new_id = :url_id');
        $request_comments->execute(array(':url_id' => $id_news));

        while($data = $request_comments->fetch()) {
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
        $request_news->closeCursor();
        $request_comments->closeCursor();
        $db = null;
    ?>
</body>
</html>