<?php

    require_once "../init.php";

    require_once APP . '/config.php';
    require_once MODEL . '/User.php';

    //$conn creating
    $db = new Database;
    //$conn = $db->dbconnect();

    if(isset($_POST['email'])){

        /*
            Fontos mezők vizsgálata OK
            jelszó == jelszó újra   OK
            Foglalt email           OK   
            ÁSZF
            jelszó hash             OK
            insert user             OK
        */

        if(empty($_POST['email']) || empty($_POST['pwd']) || empty($_POST['pwdAgain'])){

            $msg = ['msg' => 'Teszt mezők', 'class' => 'alert alert-danger'];
            //  JSON error msg
            print json_encode($msg);
            return; 
        }

        if($_POST['pwd'] != $_POST['pwdAgain']){
            $msg = ['msg' => 'Teszt jelszok', 'class' => 'alert alert-danger'];
           //  JSON error msg
           print json_encode($msg);
           return; 

        }

        if(empty($_POST['gdpr'])){
            $msg = ['msg' => 'Teszt gdpr', 'class' => 'alert alert-danger'];
            //error msg
            print json_encode($msg);
            return;
        }

        //XSS SQL injection
        //inputok név szerint
        $lname = htmlspecialchars($conn->real_escape_string($_POST['lname']));
        $fname = htmlspecialchars($conn->real_escape_string($_POST['fname']));
        $email = htmlspecialchars($conn->real_escape_string($_POST['email']));
        $pwd = htmlspecialchars($conn->real_escape_string($_POST['pwd']));
        $birthyear = htmlspecialchars($conn->real_escape_string($_POST['birthyear']));
        $gender = htmlspecialchars($conn->real_escape_string($_POST['gender']));

        //Foglalt email check
        $result = User::readCostumWhere($conn, "email='$email'");
        if($result->num_rows > 0){
            //error msg
            print json_encode(['msg' => 'Email cím foglalt' , 'class' => 'alert alert-danger']);
            return;
        }

        //pwd hash
        $pwd = hash('sha256',$pwd);

        //insert user
        if(User::create($conn, $fname, $lname, $email, $pwd, $gender, $birthyear)){
           //  JSON error msg
           print json_encode(['msg' => 'OK']);
           return;
        }else{
            print $conn->error;
        }

    }