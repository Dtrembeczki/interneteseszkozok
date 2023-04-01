<?php

require_once '../init.php';

$email = $_POST['email'];
$where = "where email = '". $email ."'";
$result = User::readCostumWhere($conn, $where);
if($result->num_rows > 0){
    print json_encode(['msg' => 'van ilyen email']);
    return;
}

print json_encode(['msg' => 'testajax.php oldalon vagyunk']);