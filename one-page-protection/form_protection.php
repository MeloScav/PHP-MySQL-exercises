<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page protégée</title>
</head>
<body>
   <?php
        // If the password is null or false
        if(!isset($_POST['password']) OR $_POST['password'] != 'kangourou'){
   ?> 

    <h1>Entrez le mot de passe pour vous connectez et accéder aux codes secrets</h1>

    <form action="form_protection.php" method="post">
        <div>
            <label for="password">Entrez le mot de passe</label>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" value="Valider">
    </form>

   <?php
        } else {
    ?>

    <h1>Voici les codes secret</h1>
    <p><strong>H5TM-TW35-Y5E6-W58P-53FG-I8O5</strong></p>

    <?php
        }
   ?>
</body>
</html>