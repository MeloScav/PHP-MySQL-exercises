<?php
    function dbConnect() {
        require('./../config.php');
        $db = new PDO($DB_CONNECTION,  $DB_USERNAME, $DB_PASSWORD,
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }

    function nbOfNews() {
        $db = dbConnect();
        $nb_of_news = $db->query('SELECT COUNT(*) AS nb_news FROM news');
        return $nb_of_news;
    }

    function getNewsPerPage($first_news, $per_page) {
        $db = dbConnect();
        $request = $db->prepare('SELECT ID, title, content, DATE_FORMAT(creation_date, "le %d/%m/%Y à %H:%i") AS date_news FROM news ORDER BY ID DESC LIMIT :first,:perpage');
        $request->bindValue(':first', $first_news, PDO::PARAM_INT);
        $request->bindValue(':perpage', $per_page, PDO::PARAM_INT);
        $request->execute();
        return $request;
    }

    function getNewById($id_news) {
        $db = dbConnect();
        $request_news = $db->prepare('SELECT ID, title, content, DATE_FORMAT(creation_date, "le %d/%m/%Y à %H:%i") AS date_news FROM news WHERE ID = :id_url');
        $request_news->execute(array(':id_url' => $id_news));
        return $request_news;
    }

    function getComments($id_news) {
        $db = dbConnect();
        $request_comments = $db->prepare('SELECT new_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y %H:%i") AS comment_date_new FROM comments WHERE new_id = :url_id ORDER BY comment_date');
        $request_comments->execute(array(':url_id' => $id_news));
        return $request_comments;
    }

    function postMessage($id, $name, $message) {
        $db = dbConnect();
        $comment = $db->prepare('INSERT INTO comments(new_id, author, comment, comment_date) VALUES(:new_id, :name_author, :comment, NOW())');
        $affectedLines = $comment->execute(array(
                                            ':new_id' => $id,
                                            ':name_author' => $name,
                                            ':comment' => $message
                                        ));
        return $affectedLines;                               
    }