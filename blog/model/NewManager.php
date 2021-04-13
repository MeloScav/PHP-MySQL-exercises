<?php
    namespace MeloScav\blog\model;

    require_once('model/Manager.php');

    class NewManager extends Manager {
        public function nbOfNews() {
            $db = $this->dbConnect();
            $nb_of_news = $db->query('SELECT COUNT(*) AS nb_news FROM news');
            return $nb_of_news;
        }
    
        public function getNewsPerPage($first_news, $per_page) {
            $db = $this->dbConnect();
            $request = $db->prepare('SELECT ID, title, content, DATE_FORMAT(creation_date, "le %d/%m/%Y à %H:%i") AS date_news FROM news ORDER BY ID DESC LIMIT :first,:perpage');
            $request->bindValue(':first', $first_news, \PDO::PARAM_INT);
            $request->bindValue(':perpage', $per_page, \PDO::PARAM_INT);
            $request->execute();
            return $request;
        }
    
        public function getNewById($id_news) {
            $db = $this->dbConnect();
            $request_news = $db->prepare('SELECT ID, title, content, DATE_FORMAT(creation_date, "le %d/%m/%Y à %H:%i") AS date_news FROM news WHERE ID = :id_url');
            $request_news->execute(array(':id_url' => $id_news));
            return $request_news;
        }
    
    }