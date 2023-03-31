<?php

    require_once APP . '/config.php';

    class User{

        private $id;
        private $fname;
        private $lname;
        private $email;
        private $pwd;
        private $gender;
        private $birthyear;
        private $profile_img;
        
        /**
         *              CRUD   METHODS
         *      create($fname, $lname, $email, $pwd, $gender, $birthyear): createing user 
         */

        //create user
        public static function create(mysqli $conn, $fname, $lname, $email, $pwd, $gender, $birthyear){

            $sql = "INSERT INTO users(f_name, l_name, email, pwd, gender, dateofbirth) 
                    VALUES ('".$fname."','". $lname ."','". $email ."','". $pwd ."','". $gender ."','". $birthyear ."')";


            if($conn->query($sql)){
                echo 'Query ok';
            }
        }

        //read all users
        public static function readAll(mysqli $conn){
            $sql = "SELECT * FROM users";

            $res = $conn->query($sql);
            return $res;
        }

        //read one user by id
        public static function readById(mysqli $conn, $id){
            $sql = "SELECT * FROM users WHERE id = ".$id;

            $res = $conn->query($sql);
            return $res;
        }

        /**
         * read user(s) by costum query
         * "SELECT * FROM users WHERE" ... "HERE YOU CAN WRITE YOUR WHERE STATEMENT";
         * @return mysqli_result
         */
        public static function readCostumWhere(mysqli $conn, $where){
            $sql = "SELECT * FROM users WHERE " . $where;

            $res = $conn->query($sql);
            return $res;
        }

        //update user
        public static function updateById(mysqli $conn, $id, $fname, $lname ,$email, $pwd , $gender, $birthyear){

            $sql = "UPDATE users 
                        SET f_name =    '$fname',
                            l_name =    '$lname', 
                            email =     '$email', 
                            pwd =       '$pwd', 
                            gender =    '$gender' , 
                            dateofbirth = '$birthyear' WHERE id = $id";
            
            $conn->query($sql);
        }

        //delete user
        public static function deleteById(mysqli $conn, $id){

            $sql = "DELETE FROM users WHERE id = $id";

            $conn->query($sql);

        }
    }