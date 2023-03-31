<?php

if(empty($_POST['email'])){
    print json_encode(['msg' => 'Email üres']);
    return;
}

print json_encode(['msg' => 'OK']);