<?php
    include '../src/user/User.php';
    include '../config/Database.php';

    $db = new Database();
    $conn = $db->connection();


    if (isset($_POST['signup'])){
        
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sex = mysqli_real_escape_string($conn, $_POST['sex']);

        $usr = new User($name, $pwd, $email, $sex);
        if (!$usr->insertUsr($conn)){
            header('Location: ../signup.php?msg=success');
            exit;
        }else{
            header('Location: ../signup.php?msg=sql');
        }
    }