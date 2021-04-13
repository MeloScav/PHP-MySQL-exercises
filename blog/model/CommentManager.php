<?php
    namespace MeloScav\blog\model;

    require_once('model/Manager.php');

    class CommentManager extends Manager {
        public function getComments($id_news) {
            $db = $this->dbConnect();
            $request_comments = $db->prepare('SELECT new_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y %H:%i") AS comment_date_new FROM comments WHERE new_id = :url_id ORDER BY comment_date');
            $request_comments->execute(array(':url_id' => $id_news));
            return $request_comments;
        }
    
        public function postMessage($id_news, $name, $message) {
            $db = $this->dbConnect();
            $comment = $db->prepare('INSERT INTO comments(new_id, author, comment, comment_date) VALUES(:new_id, :name_author, :comment, NOW())');
            $affectedLines = $comment->execute(array(
                                                ':new_id' => $id_news,
                                                ':name_author' => $name,
                                                ':comment' => $message
                                            ));
            return $affectedLines;                               
        }
    }