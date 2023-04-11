<?php

    
    class App{

        protected $page = 'home';

        public function __construct(){
            $this->getUrl();
        }

        protected function getUrl(){
                if(isset($_GET['page'])){
                    
                    if(file_exists(VIEW . '/' . $_GET['page'] . '.php')){
                        //echo $_GET['page'];
                        $this->page = $_GET['page'];
                    }else{
                        $this->page = 'home';
                    }
                }else{
                    $this->page = 'home';
                }

            require_once VIEW . '/' . $this->page . '.php';
            
        }

    }