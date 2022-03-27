<?php

// creating host class to connect to the db
class Dbh {
    private $host = "localhost";
    private $user = "nika";
    private $pwd = "nika-125";
    private $dbName = "project_products";

    //connecting to the db
    protected function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn,$this->user,$this->pwd);

        //set default fetch mode to assoc_array

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo;
    }
}