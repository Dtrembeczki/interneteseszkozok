<?php

    
    class App{

        protected $page = 'home';

        public function __construct(){
            $this->getUrl();
        }

        protected function getUrl(){

            if(isset($_GET['page'])){
                if(file_exists(VIEW . '/' . $_GET['page'] . '.php')){
                    $this->page = $_GET['page'];
                }
            }

            require_once VIEW . '/' . $this->page . '.php';

        }

    }