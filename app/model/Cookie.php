<?php

    class Cookie{

        protected $name;
        protected $value;
        protected $salt = "aj*.iyscvlkaJasdfIOAgfdFIvd&OAJ";


        public static function create(string $name, string $value, int $day)
        {
            $exptime = time() + (86400 * $day);
            setcookie($name, $value, $exptime, "/");
        }
    }