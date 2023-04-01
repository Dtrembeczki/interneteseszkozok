<?php

    require_once '../init.php';

    if(isset($_POST)){

        //check if email or pwd or pwdAgain is empty
        if(empty($_POST['email']) || empty($_POST['pwd']) || empty($_POST['pwdAgain'])){
            //JSON error msg
            print json_encode(["msg" => "Minden csillaggal jelölt mezőt kötelező kitölteni! Próbálja újra!","class" => "alert alert-danger"]);
            return;
        }

        //checking pwd if equals to pwdAgain
        if($_POST['pwd'] != $_POST['pwdAgain']){
            //JSON error msg
            print json_encode(["msg" => "A két jelszómező nem egyezik! Próbálja újra!","class" => "alert alert-danger"]);
            return;
        }

        //checking if terms of use is empty
        if($_POST['gdpr'] != "yes"){
            //JSON error msg
            print json_encode(["msg" => "El kell fogadni az ÁSZF-t a regisztrációhoz! Próbálja újra!","class" => "alert alert-danger"]);
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


        //checking the email in db
        $where = "where email = '". $email ."'";
        $result = User::readCostumWhere($conn, $where);
        if($result->num_rows > 0){
            print json_encode(["msg" => "Ezzel az e-mail címmel már lett regisztrálva fiók","class" => "alert alert-danger"]);
            return;
        }

        $pwd = hash('sha256',$pwd);

        //insert user
        if(User::create($conn, $fname, $lname, $email, $pwd, $gender, $birthyear)){
           //  JSON error msg
           print json_encode(['msg' => 'Sikeres regisztráció','class' => 'alert alert-success']);
           return;
        }

        //debug true sor
        print json_encode(["msg" => "signup.controller.php oldalon vagyunk","class" => "alert alert-primary"]);
        return;

    }