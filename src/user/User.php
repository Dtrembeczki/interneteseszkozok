<?php


    /**
     * Summary of User
     */
    class User{
        private $id;
        private $name;
        private $firstname;
        private $lastname;
        private $dateofbirth;
        private $pwd;
        private $hashed_pwd;
        private $email;
        private $sex;

        /**
         * Summary of __construct
         * @param string $name
         * @param string $pwd
         * @param string $email
         * @param string $sex
         */
        public function __construct(string $name, string $firstname, string $lastname, string $pwd, string $email, string $sex, $dateofbirth){
            $this->name = $name;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->pwd = $pwd;
            $this->email = $email;
            $this->sex = $sex;
            $this->dateofbirth = $dateofbirth;
        }

        
        /**
         * Summary of __toString
         * @return string
         */
        public function __toString() : string{
            $str = "id= ".$this->id." name= ".$this->name." email=".$this->email." sex= ".$this->sex;
            return $str;
        }
        
        /**
         * Summary of readAllUsers
         * @param mysqli $conn
         * @return bool|mysqli_result
         * 
         * Static function
         * Read all users from the database with query:
         * SELECT * FROM users where 1
         */
        public static function readAllUsers(mysqli $conn){

            $sql = "SELECT * FROM users where 1";
            $result = $conn->query($sql);

            return $result;
        }
        

        /**
         * Summary of insertUsr
         * @param mysqli $conn
         * @return void
         * 
         * Insert user to the users table
         * INSERT INTO users(name, firstname, lastname, pwd, email, dateofbirth, sex, regtime) VALUES()
         */
        public function insertUsr(mysqli $conn){
            $this->hashed_pwd = password_hash($this->pwd, PASSWORD_DEFAULT);

            //turn dateofbirth from string to date 
            $date = strtotime($this->dateofbirth);
            $date = date("Y-m-d", $date);

            //sql query
            /*$sql = 'INSERT INTO users(name, firstname, lastname, pwd, email, dateofbirth, sex) 
            VALUES('.$this->name.', '.$this->firstname.', '.$this->lastname.',
             '.$this->hashed_pwd.', '.$this->email.', '.$date.', '.$this->sex.')';*/

            $sql = 'INSERT INTO users(name, firstname, lastname, pwd, email, dateofbirth, sex) 
            VALUES(?,?,?,?,?,?,?)';

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssssss', $this->name, $this->firstname, $this->lastname, $this->hashed_pwd, $this->email, $date, $this->sex);

            $stmt->execute();
        }

        //select * from users where name = '' or email = ''
        public static function getUserByNameOrEmail(mysqli $conn, string $name, string $email){
            $sql = "select * from users where name = '". $name ."' or email = '". $email ."'";
            $result = $conn->query($sql);

            return $result;
        }

        //select * from users where id = ''
        public static function getUserByid(mysqli $conn, int $id){
            $sql = "select * from users where name = ". $id ."";
            $result = $conn->query($sql);

            return $result;
        }

        public function setSessionVariables(){
            $_SESSION['uid'] = $this->id;
            $_SESSION['name'] = $this->name;
            $_SESSION['email'] = $this->email;
        }

        //getters and setters
        public function __getId(){
            return $this->id;
        }

        public function __setId(int $id){
            $this->id = $id;
        }

        public function __getName(){
            return $this->name;
        }

        public function __setName(string $name){
            $this->name = $name;
        }

        public function __getEmail(){
            return $this->email;
        }

        public function __setEmail(string $email){
            $this->email = $email;
        }

        public function __getFirstName(){
            return $this->firstname;
        }

        public function __setFirstName(string $firstname){
            $this->firstname = $firstname;
        }

        public function __getLastName(){
            return $this->lastname;
        }

        public function __setLastName(string $lastname){
            $this->lastname = $lastname;
        }

        public function __getDateofBirth(){
            return $this->dateofbirth;
        }

        public function __setDateOfBirth($dateofbirth){
            $this->dateofbirth = $dateofbirth;
        }
    }