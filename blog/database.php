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

?>