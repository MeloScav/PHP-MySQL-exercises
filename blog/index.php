<?php
    require("controller/controller.php");

    try {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'news') {
                listOfNews();
            }
            elseif ($_GET['action'] == 'comments') {
                if (isset($_GET['id-news']) && $_GET['id-news'] > 0) {
                    listOfComments();
                }
                else {
                    throw new Exception('Aucun identifiant de news envoyé');
                }
            } elseif ($_GET['action'] == 'addMessage') {
                if (isset($_GET['id-news']) && $_GET['id-news'] > 0) {
                    if (!empty($_POST['name']) && !empty($_POST['message'])) {
                        addMessage($_GET['id-news'], $_POST['name'], $_POST['message']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
                else {
                    throw new Exception('Aucun identifiant de news envoyé');
                }
            }
        }
        else {
            listOfNews();
        }
    }
    catch(Exception $e) {
        $errorMessage = $e->getMessage();
        require('view/errorView.php');
    }