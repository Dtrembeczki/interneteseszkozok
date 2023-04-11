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
                'birthyear' =>  $row['dateofbirth']
            ]);
        }
        
        
        echo json_encode($userdata);
    }

    if(isset($_POST['fnameChng'])){
        echo json_encode(['msg' =>  'OK']);
    }