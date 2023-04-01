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

$sql = "INSERT INTO users(f_name, l_name, email, pwd, gender, dateofbirth) 
 VALUES ('{$fname}', '{$lname}', '{$email}', '{$pwd}' , '{$gender}' , '{$birthyear}')";

//valami kínja van

if($conn->query($sql)){
    print json_encode(['msg' => 'insert ok']);
    
}


print json_encode(['msg' => 'testajax.php oldalon vagyunk']);