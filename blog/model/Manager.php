<?php
    namespace MeloScav\blog\model;

    class Manager {
        protected function dbConnect() {
            require('./../config.php');
            $db = new \PDO($DB_CONNECTION, $DB_USERNAME, $DB_PASSWORD,
                            array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
            return $db;
        }
    }