<?php

    require_once '../init.php';


    if(isset($_POST['userid'])){
        $userid=htmlspecialchars($conn->real_escape_string($_POST['userid']));

        $result = User::readById($conn, $userid);
        $userdata = array();

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
                'msg' => 'msg',
                'class' => 'alert alert-primary'
            ]);
        }
        
        
       /* echo json_encode($userdata);
        $userdata=array();*/
    }

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
    }

    echo json_encode($userdata);
    $userdata=array();