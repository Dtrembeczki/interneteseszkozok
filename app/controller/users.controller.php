<?php

    require_once '../init.php';
    
    $result = User::readAll($conn);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();
        $usersjson = json_encode($row);
    }else{

        $usersjson = json_encode(['usermsg' => 'Nincs megjelníthető adat', 'class' => 'card bg-secondary']);

    }

    print $usersjson;