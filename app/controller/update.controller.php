<?php

    require_once '../init.php';


    $userdata = array();

    if(isset($_POST['userid'])){
        $userid=htmlspecialchars($conn->real_escape_string($_POST['userid']));

        $result = User::readById($conn, $userid);
        //$userdata = array();

        while($row = $result->fetch_assoc()){
            $userdata = ([
                'id'    =>  $row['id'],
                'fname' =>  $row['f_name'],
                'lname' =>  $row['l_name'],
                'email' =>  $row['email'],
                'birthyear' =>  $row['dateofbirth'],
                'title' =>  $row['title'],
                'gender' => $row['gender'],
                'newsletter' => $row['newsletter'],
                'img' => $row['profil_img'],
                'msg' => 'msg',
                'class' => 'alert alert-primary'
            ]);
        }
        
        
       /* echo json_encode($userdata);
        $userdata=array();*/
    }

    //if change posted
    if(isset($_POST['lnameChng'])){

        //check if emailChng or lnameChng or fnameChng empty and drop JSON msg
        if(empty($_POST['emailChng']) || empty($_POST['lnameChng']) || empty($_POST['fnameChng']))
        {
            //JSON error msg
            print json_encode(["msg" => "Minden csillaggal jelölt mezőt kötelező kitölteni! Próbálja újra!","class" => "alert alert-danger"]);
            return;
        }

        $userid = htmlspecialchars($conn->real_escape_string($_POST['userid']));
        $title = htmlspecialchars($conn->real_escape_string($_POST['title']));
        $lname = htmlspecialchars($conn->real_escape_string($_POST['lnameChng']));
        $fname = htmlspecialchars($conn->real_escape_string($_POST['fnameChng']));
        $email = htmlspecialchars($conn->real_escape_string($_POST['emailChng']));
        $gender = htmlspecialchars($conn->real_escape_string($_POST['genderChng']));
        $newsletter = htmlspecialchars($conn->real_escape_string($_POST['newsletterChng']));

        $userchngArr = array();
        $userchngArr = ([
            'title' => $title,
            'lname' => $lname,
            'fname' => $fname,
            'email' => $email,
            'gender' => $gender,
            'newsletter' => $newsletter
        ]);

        User::updateByIdArray($conn, $userid, $userchngArr);
        $userdata['msg'] = "Változtatás mentve";
        $userdata['class'] = 'alert alert-success';

        unset($userchngArr);
    }

    //if pwdChng submit pressed
    if(isset($_POST['pwdChng']) || isset($_POST['pwdChngAgain'])){

        //check if the two 
        if(empty($_POST['pwdChng']) || empty($_POST['pwdChngAgain'])){
            print json_encode(["msg" => "Jelszó mező üres","class" => "alert alert-danger"]);
            return;
        }

        if($_POST['pwdChng'] != $_POST['pwdChngAgain']){
            print json_encode(["msg" => "Jelszó mezők nem egyeznek","class" => "alert alert-danger"]);
            return;
        }

        //xss and sql injection protection
        $userid=htmlspecialchars($conn->real_escape_string($_POST['userid']));
        $pwd = htmlspecialchars($conn->real_escape_string($_POST['pwdChng']));
        
        //update pass with User class static method 
        User::updatePwdById($conn, $userid, $pwd);
        $userdata['msg'] = "Jelszó ok";
        $userdata['class'] = 'alert alert-success';


    }

    //if img update posted
    if(isset($_POST['imgupload'])){
        echo "ok";
    }

    echo json_encode($userdata);

    //unset the array
    $userdata=array();