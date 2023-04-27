<?php

    require_once '../model/Cookie.php';

    if (isset($_POST['key'])) {
        if($_POST['key'] = $_COOKIE['captcha']){
            $value = rand();
            Cookie::create('reskey',$value, 1);

            echo json_encode(['reskey' => 1]);
        }
    }