<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Little chat</title>
</head>
<body>

    <div class="container">
        <h1>Bienvenue sur le chat !</h1>

        <!-- FORM -->
        <form action="littlechat_post.php" method="post" class="form">
            <div class="form-input">
                <label for="nickname">Entrez votre pseudo : </label>
                <input class="validation-field" type="text" name="nickname" id="nickname" 
                    value="<?php if(isset($_COOKIE['nickname'])) echo htmlspecialchars($_COOKIE['nickname']); ?>" required>
            </div>
            <div class="form-input">
                <label for="message">Entrez votre message : </label>
                <textarea class="validation-field" name="message" id="message" cols="30" rows="5" required></textarea>
            </div>
            <div class="buttons">
                <input class="btn" type="submit" value="Envoyer">
                <button class="btn reload-button" type="button">Actualiser</button>
            </div>
        </form>

        <!-- MESSAGES -->
        <?php
            // Database connection
            require("./database.php");
            // If all is right, we continue

            // Which page
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $current_page = strip_tags($_GET['page']);
            } else {
                $current_page = 1;
            }

            // Count the number of message
            $number_of_message = $bdd->query('SELECT COUNT(*) AS nb_messages FROM minichat');
            // Get the number of messages
            $total_messages = $number_of_message->fetch();
            $total_number_messages = $total_messages['nb_messages'];

            // Number of posts per page
            $per_page = 10;
            // Total number of pages
            $pages = ceil($total_number_messages / $per_page);

            // Calculation of the first message of the page
            $first_message = ($current_page * $per_page) - $per_page;

            // SQL request and displays 10 messages per page
            $request= $bdd->prepare('SELECT * FROM minichat ORDER BY ID DESC LIMIT :first,:perpage');

            $request->bindValue(':first', $first_message, PDO::PARAM_INT);
            $request->bindValue(':perpage', $per_page, PDO::PARAM_INT);

            $request->execute();

        ?>
        
        <div class="messages-container">
        <?php
            // DISPLAY and data protection
            while ($data = $request->fetch()){
        ?>
                <div class="messages-content">
                    <p class="pseudo"> <?php echo htmlspecialchars($data['pseudo']); ?> </p>
                    <p class="message"> <?php echo nl2br(htmlspecialchars($data['message'])); ?> </p>
                </div>
        <?php
            }

        ?>
        </div>

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
            // Closure of the database
            $bdd = null; 
        ?>

    </div>
    
    <script src="./script.js"></script>
</body>
</html>