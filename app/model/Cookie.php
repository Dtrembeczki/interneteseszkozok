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

        public static function keyGen()
        {
            $rand = rand();
            self::create("captcha", $rand, 1);

            return $rand;
        }

        public static function read($name = "")
        {
            return $_COOKIE['name'];
        }
    }