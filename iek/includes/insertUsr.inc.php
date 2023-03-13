<?php
    include '../src/user/User.php';
    include '../config/Database.php';

    $db = new Database("iek");
    $conn = $db->connection();


    if (isset($_POST['signup'])){
        
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        $pwd_check = mysqli_real_escape_string($conn, $_POST['pwdcheck']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $dateofbirth = $_POST['dateofbirth'];
        $sex = mysqli_real_escape_string($conn, $_POST['sex']);
        
        /*
        *           Need validation part here...
        */

        //      Declare User user
        $usr = new User($name, $firstname,$lastname, $pwd, $email, $sex, $dateofbirth);
        if (!$usr->insertUsr($conn)){
            header('Location: ../pages/signup.php?msg=success');
            exit;
        }else{
            header('Location: ../pages/signup.php?msg=sql');
        }
    }