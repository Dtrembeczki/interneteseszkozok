<?php

    require_once '../init.php';

    if(isset($_POST['id'])){

        User::deleteById($conn, $_POST['id']);
    }