<?php
    // A cookie to remember the nickname
    setcookie('nickname', $_POST['nickname'], time() + 365*24*3600, null, null, false, true); 

    // Database connection
    require("./database.php");
    // If all is right, we continue

    // SQL request
    $request = $bdd->prepare('INSERT INTO minichat(pseudo, message, creation_date) 
                              VALUES (:pseudo, :message, NOW()) ');
    $request->execute(array(
        ':pseudo' => $_POST['nickname'],
        ':message' => $_POST['message']
    ));

    $request->closeCursor();
    // Closure of the database
    $bdd = null;
    // Redirection to littlechat.php
    header('Location: littlechat.php');
?>
