<?php

    class Database{
        private $host = 'localhost';
        private $dbname = 'iek';
        private $pwd ='';
        private $dbuser ='root';

        private $conn;

        public function __construct($db){
            $this->dbname = $db;
        }

        public function connection(){
            $this->conn = new mysqli($this->host, $this->dbuser, $this->pwd, $this->dbname);

            if ($this->conn->connect_error) {
                die('Connection problem: ' . $this->conn->connect_error);
            }

            return $this->conn;
        }
    }