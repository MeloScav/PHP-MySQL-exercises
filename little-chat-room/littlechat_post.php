<?php

    require('./../config.php');

    // BDD connection
    try {
        $bdd = new PDO($DB_CONNECTION,  $DB_USERNAME, $DB_PASSWORD,
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // If all is right, we continue

    // SQL request
    $request = $bdd->prepare('INSERT INTO minichat(pseudo, message) 
                              VALUES (:pseudo, :message) ');
    $request->execute(array(
        ':pseudo' => $_POST['nickname'],
        ':message' => $_POST['message']
    ));

    // Closure of the database
    $bdd = null;
    // Redirection to littlechat.php
    header('Location: littlechat.php');

?>