<?php

    require_once '../init.php';

    $result = User::readCostumWhere($conn, "where 1 ORDER BY id ASC");
    $data_arr = array();
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $fname = $row['f_name'];
            $lname = $row['l_name'];
            $email = $row['email'];
            $gender = $row['gender'];
            $dateofbirth = $row['dateofbirth'];

            $data_arr[] = array(    "id" => $id,
                                    "fname" => $fname,
                                    "lname" => $lname,
                                    "email" => $email,
                                    "gender" => $gender,
                                    "dateofbirth" => $dateofbirth);
        }
    }else{
        $data_arr[] = array("id" => "Nincs megjeleníthető adat");
    }

    echo json_encode($data_arr);
