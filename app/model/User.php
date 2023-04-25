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
        protected $salt = "@Ladl43jl2ad54eK*L%WJklkdjcld@.-a&LSAJdl";
        
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

        /**
         * updateing user data
        */
        public static function updateByIdArray(mysqli $conn, int $id, array $data)
        {
            $sql = "UPDATE users SET ";
            $multiplesql = "";

            if($data['title'] != ""){
                $multiplesql = $sql . " title = '".$data['title']."' WHERE id = $id;";
            }

            if ($data['title'] == "") {
                $multiplesql = $sql . " title = '' WHERE id = $id;";
            }

            if($data['fname'] != ""){
                    $multiplesql .= $sql . " f_name = '".$data['fname']."' WHERE id = $id;";
            }

            if($data['lname'] != ""){
                $multiplesql .= $sql . " l_name = '".$data['lname']."' WHERE id = $id;";
            }

            if($data['email'] != ""){
                $multiplesql .= $sql . " email = '".$data['email']."' WHERE id = $id;";
            }

            if($data['email'] != ""){
                $multiplesql .= $sql . " gender = '".$data['gender']."' WHERE id = $id;";
            }

            if($data['newsletter'] != ""){
                $multiplesql .= $sql . " newsletter = '".$data['newsletter']."' WHERE id = $id;";
            }

            //echo json_encode(["msg" => "multiplesql" . $multiplesql]);
            $conn->multi_query($multiplesql);
        }

        /**
         * pwd change with salting and hashing.
        */
        public static function updatePwdById(mysqli $conn, int $id, string $pwd)
        {
            $sql = "UPDATE users SET ";
            $salt = "@Ladl43jl2ad54eK*L%WJklkdjcld@.-a&LSAJdl";

            $hashed = password_hash($pwd, PASSWORD_DEFAULT);
            $sql .= "pwd = '$hashed' WHERE id = $id";

            $conn->query($sql);
        }

        /**
         * update the profile img
         */
        public static function updatePImgById(mysqli $conn, int $id, array $imgArr)
        {
            $sql = "UPDATE users SET ";

            $imgname = $imgArr['name'];
            $imgtmp = $imgArr['tmp_name'];
            $path = 'app/media/profilimg/';
            move_uploaded_file($imgtmp, $path . '' . $imgname);

            $sql .= "profil_img = '".$imgname."'";

            $conn->query($sql);
        }

        //delete user
        public static function deleteById(mysqli $conn, $id){

            $sql = "DELETE FROM users WHERE id = $id";

            $conn->query($sql);

        }
    }