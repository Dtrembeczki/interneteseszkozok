<?php

    class Cookie{

        protected $name;
        protected $value;
        protected $salt = "1HlV&8W8Gr2gzFgxI5RPxjRDxl*9hcLASKDJLvajsdlk";


        public static function create(string $name, string $value, int $day)
        {
            $exptime = time() + (86400 * $day);
            setcookie($name, $value, $exptime, "/");
        }
    }