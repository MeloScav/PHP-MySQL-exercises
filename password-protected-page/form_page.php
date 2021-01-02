<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <h1>Entrez le mot de passe pour vous connectez et accéder aux codes secrets</h1>

    <form action="confidential_page.php" method="post">
        <div>
            <label for="password">Entrez le mot de passe</label>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" value="Valider">
    </form>
    
</body>
</html>