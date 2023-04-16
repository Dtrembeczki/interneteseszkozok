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
        public $salt = "@Ladl43jl2ad54eK*L%WJklkdjcld@.-a&LSAJdl";
        
        /**
         *              CRUD   METHODS
         *      create($conn, $fname, $lname, $email, $pwd, $gender, $birthyear): createing user 
         */

        //create user
        public static function create(mysqli $conn, $title, $fname, $lname, $email, $pwd, $gender, $birthyear, $newsletter){

            $sql = "INSERT INTO users(title, f_name, l_name, email, pwd, gender, dateofbirth, newsletter) 
                    VALUES ('".$title."','".$fname."','". $lname ."','". $email ."','". $pwd ."','". $gender ."','". $birthyear ."', '".$newsletter."')";


            $conn->query($sql);
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
         * "SELECT * FROM users " ... "HERE YOU CAN WRITE YOUR WHERE STATEMENT";
         * @return mysqli_result
         */
        public static function readCostumWhere(mysqli $conn, $where =""){
            $sql = "SELECT * FROM users " . $where;

            $res = $conn->query($sql);
            return $res;
        }

        //update user with array
        public function updateByIdArray(mysqli $conn, int $id, array $data)
        {
            
        }

        //update user
        public static function updateById(mysqli $conn, $id, $title, $fname, $lname ,$email, $gender){

            $sql = "UPDATE users 
                        SET f_name =    '$fname',
                            l_name =    '$lname', 
                            email =     '$email', 
                            gender =    '$gender'
                            title = '$title' WHERE id = $id";
            
            $conn->query($sql);
        }

        //update user on changed properties
        public static function updateByIdChanged(mysqli $conn, $id, $fname="", $lname="" ,$email="", $pwd=""){

            $sql = "UPDATE users SET ";

            if(!empty($fname)){
                $sql .= "f_name = $fname, ";
            }
            
            if(!empty($lname)){
                $sql .= "l_name = $lname, ";
            }

            if(!empty($email)){
                $sql .= "email = $email, ";
            }

            if(!empty($pwd)){
                $sql .= "pwd = $pwd ";
            }

            $sql .= "WHERE id = $id";

            $conn->query($sql);
        }

        //delete user
        public static function deleteById(mysqli $conn, $id){

            $sql = "DELETE FROM users WHERE id = $id";

            $conn->query($sql);

        }
    }