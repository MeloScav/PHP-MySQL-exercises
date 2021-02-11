<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Little chat</title>
</head>
<body>

    <h1>Bienvenue sur le chat !</h1>

    <!-- FORM -->
    <form action="littlechat_post.php" method="post">
        <div>
            <label for="nickname">Entrez votre pseudo : </label>
            <input type="text" name="nickname" id="nickname">
        </div>
        <div>
            <label for="message">Entrez votre message : </label>
            <input type="text" name="message" id="message">
        </div>
        <input type="submit" value="Envoyer">
    </form>

    <!-- MESSAGES -->
    <?php
          try {
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
                            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

         // If all is right, we continue

        // SQL request and retrieving the last 10 messages
        $response= $bdd->query('SELECT * FROM minichat ORDER BY ID DESC LIMIT 0,10');
        
        // DISPLAY and data protection
        while ($data = $response->fetch()){
    ?>

        <div>
            <p> <?php echo htmlspecialchars($data['pseudo']); ?> </p>
            <p> <?php echo htmlspecialchars($data['message']); ?> </p>
        </div>

    <?php
        }

        $response->closeCursor();

    ?>
    
</body>
</html>