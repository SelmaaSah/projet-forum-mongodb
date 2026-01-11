<?php

class Manager {
    protected $manager;
    protected $dbName = "bdd-forum"; 

    public function __construct() {
        // connexion a la bdd
        $host = getenv('DB_HOST') ?: 'localhost';
        try {
            $this->manager = new MongoDB\Driver\Manager("mongodb://$host:27017");
        } catch (Exception $e) {
            die("Erreur de connexion à MongoDB : " . $e->getMessage());
        }
    }

    protected function executeQuery($collection, $filter = [], $options = []) {
        $query = new MongoDB\Driver\Query($filter, $options);
        $cursor = $this->manager->executeQuery($this->dbName.'.'.$collection, $query);
        return $cursor->toArray();
    }

    protected function insertOne($collection, $document) {
        $bulk = new MongoDB\Driver\BulkWrite;
        $id = $bulk->insert($document);
        $this->manager->executeBulkWrite($this->dbName.'.'.$collection, $bulk);
        return $id;
    }
}
?>
