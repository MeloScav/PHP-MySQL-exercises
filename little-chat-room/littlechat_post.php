<?php

    // BDD connexion
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
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

    // Redirection to littlechat.php
    header('Location: littlechat.php');

?>