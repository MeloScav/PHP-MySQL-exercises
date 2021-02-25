<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Les news</title>
</head>
<body>

    <h1>Bienvenue sur mon blog !</h1>
    <h2>Voici les derniers nouvelles du blog :</h2>

    <div class="container">
        <?php
        
        // Connection to the database
        require("./database.php");

         // Which page
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $current_page = strip_tags($_GET['page']);
        } else {
            $current_page = 1;
        }

        // Count the number of News
        $nb_of_news = $db->query('SELECT COUNT(*) AS nb_news FROM news');
        // Get the number
        $total_news = $nb_of_news->fetch();
        $total_nb_news = $total_news['nb_news'];

        // 5 news per pages
        $per_page = 5;
        // Number of page
        $pages = ceil($total_nb_news / $per_page);

        // Calculation of the first message of the page
        $first_news = ($current_page * $per_page) - $per_page;

        $request = $db->prepare('SELECT ID, title, content, DATE_FORMAT(creation_date, "le %d/%m/%Y à %H:%i") AS date_news FROM news ORDER BY ID DESC LIMIT :first,:perpage');

        $request->bindValue(':first', $first_news, PDO::PARAM_INT);
        $request->bindValue(':perpage', $per_page, PDO::PARAM_INT);

        $request->execute();

        while ($data = $request->fetch()) {
        ?>

            <div class="container-news">
                <div class="header-news">
                    <h3><?php echo $data['title'] ?></h3>
                    <p><?php echo $data['date_news'] ?></p>
                </div>
                <div class="content-news">
                    <p><?php echo $data['content'] ?></p>
                </div>
                <a class="btn" href="comments.php?news=<?php echo $data['ID']?>">
                    Commentaires
                </a>
            </div>

        <?php
        }
        ?>

        <!-- Paging -->
        <nav>
            <ul class="paging">
                <!-- Deactivate the previous page if you are on the 1st page -->
                <li class="page-item <?php echo ($current_page == 1) ? "disabled" : ""; ?>">
                    <a href="?page=<?php echo $current_page-1; ?>" class="link">
                        Page précédente
                    </a>
                </li>
                <!-- Links to pages -->
                <?php for($page = 1; $page <= $pages; $page++) : ?>
                    <li class="page-item <?php echo ($current_page == $page) ? "active" : ""; ?>">
                        <a href="?page=<?php echo $page ?>" class="page-link">
                            <?php echo $page ?>
                        </a>
                    </li>
                <?php endfor ?>
                <!-- Link to the next page disabled if you are on the last page  -->
                <li class="page-item <?php echo ($current_page == $pages) ? "disabled" : "" ?>">
                    <a href="?page=<?php echo $current_page+1 ?>" class="page-link">
                        Page suivante
                    </a>
                </li>
            </ul>
        </nav>


        <?php
        $request->closeCursor();
        $db = null;
        ?>
    </div>
    
</body>
</html>