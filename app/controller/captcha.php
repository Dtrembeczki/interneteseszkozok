<?php

    $data = array();

    //check if captcha key posted from signup.php view
    if(isset($_POST['key'])){
        //check if posted key and cookie 'captcha' is equal
        if($_POST['key'] == $_COOKIE['captcha']){
            $seskey = $_COOKIE['key'];
            $data = (['key' => $seskey]);
        }else{
            $data = (['key' => 'nokey']);
        }

        echo json_encode($data);
    }