<?php

//require_once '../init.php';
require_once '../config.php';

$db = new Database;
$conn = $db->dbconnect();

/*if(User::create($conn, "test", "test", $_POST['email'], $_POST['pwd'], "test", 1234)){
    //  JSON error msg
    print json_encode(['msg' => 'Sikeres regisztráció','class' => 'alert alert-success']);
    return;
 }*/

foreach($_POST as $key => $value){
    $$key = htmlspecialchars($value);
}


//valami kínja van

if(User::create($conn, 'test', 'test', 'test' ,'test','test', '1234')){
    print json_encode(['msg' => 'Sikeres regisztráció','class' => 'alert alert-success']);
    return;
}


print json_encode(['msg' => 'testajax.php oldalon vagyunk']);