<?php

    class Database{

        private $host = 'localhost';
        private $user = 'root';
        private $pwd = '';
        private $name = 'mvc_project';

        public function dbconnect(){

            $conn = new mysqli($this->host, $this->user, $this->pwd, $this->name);
            if($conn->connect_errno){
                echo 'Connection error: ' . $conn->connect_error;
            }

            return $conn;

        }

    }