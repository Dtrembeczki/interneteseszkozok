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


        /**
         * Summary of getUserByNameOrEmail
         * @param mysqli $conn
         * @param string $name
         * @param string $email
         * @return bool|mysqli_result
         * 
         *      query: select * from users where name = '' or email = ''
         *      Select user by name or email
         *      This function is used to get all information to sign in.
         */
        public static function getUserByNameOrEmail(mysqli $conn, string $name, string $email){
            $sql = "select * from users where name = '". $name ."' or email = '". $email ."'";
            $result = $conn->query($sql);

            return $result;
        }

        /**
         * Summary of getUserByid
         * @param mysqli $conn
         * @param int $id
         * @return bool|mysqli_result
         * 
         *      query: select * from users where id = ''
         *      Select a user by it's id from Database
         */
        public static function getUserByid(mysqli $conn, int $id){
            $sql = "select * from users where name = ". $id ."";
            $result = $conn->query($sql);

            return $result;
        }

        /**
         * Summary of setSessionVariables
         * @return void
         * Setting the session variables
         */
        public function setSessionVariables(){
            $_SESSION['uid'] = $this->id;
            $_SESSION['name'] = $this->name;
            $_SESSION['email'] = $this->email;
            $_SESSION['fullname'] = $this->firstname . ' ' . $this->lastname;
        }

        //getters and setters

        /**
         * Summary of __getId
         * @return int
         */
        public function __getId(){
            return $this->id;
        }

        /**
         * Summary of __setId
         * @param int $id
         * @return void
         */
        public function __setId(int $id){
            $this->id = $id;
        }

        /**
         * Summary of __getName
         * @return string
         */
        public function __getName(){
            return $this->name;
        }

        /**
         * Summary of __setName
         * @param string $name
         * @return void
         */
        public function __setName(string $name){
            $this->name = $name;
        }

        /**
         * Summary of __getEmail
         * @return string
         */
        public function __getEmail(){
            return $this->email;
        }

        /**
         * Summary of __setEmail
         * @param string $email
         * @return void
         */
        public function __setEmail(string $email){
            $this->email = $email;
        }

        /**
         * Summary of __getFirstName
         * @return string
         */
        public function __getFirstName(){
            return $this->firstname;
        }

        /**
         * Summary of __setFirstName
         * @param string $firstname
         * @return void
         */
        public function __setFirstName(string $firstname){
            $this->firstname = $firstname;
        }

        /**
         * Summary of __getLastName
         * @return string
         */
        public function __getLastName(){
            return $this->lastname;
        }

        /**
         * Summary of __setLastName
         * @param string $lastname
         * @return void
         */
        public function __setLastName(string $lastname){
            $this->lastname = $lastname;
        }

        /**
         * Summary of __getDateofBirth
         * @return mixed
         */
        public function __getDateofBirth(){
            return $this->dateofbirth;
        }

        /**
         * Summary of __setDateOfBirth
         * @param mixed $dateofbirth
         * @return void
         */
        public function __setDateOfBirth($dateofbirth){
            $this->dateofbirth = $dateofbirth;
        }
    }