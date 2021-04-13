<?php
    require("model/model.php");

    function listOfNews() {
        // Which page
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $current_page = strip_tags($_GET['page']);
        } else {
            $current_page = 1;
        }

        // Count the number of News
        $nb_of_news = nbOfNews();
        // Get the number
        $total_news = $nb_of_news->fetch();
        $total_nb_news = $total_news['nb_news'];

        // 5 news per pages
        $per_page = 5;
        // Number of page
        $pages = ceil($total_nb_news / $per_page);

        // Calculation of the first message of the page
        $first_news = ($current_page * $per_page) - $per_page;

        $request = getNewsPerPage($first_news, $per_page);

        // affichage
        require("view/indexView.php");
    }

    function listOfComments() {
        
        $id_news= $_GET['id-news'];

        $request_news = getNewById($id_news);
        $data_news = $request_news->fetch();

        $request_comments = getComments($id_news);
        $data = $request_comments->fetch();

        require('view/commentsView.php');
    }

    function addMessage($id, $name, $message) {
        $affectedLines = postMessage($id, $name, $message);  
        if($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            $redirection = 'Location: index.php?action=comments&id-news=' . $id;
            header($redirection);
        }
    }