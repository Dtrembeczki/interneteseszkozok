<?php
    session_start();

    include '../src/user/User.php';
    include '../config/Database.php';
    
    $db = new Database();
    $conn = $db->connection();

    if (isset($_POST['signinSubmit'])){

        $name_email = mysqli_real_escape_string($conn, $_POST['name_email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

        $result = User::getUserByNameOrEmail($conn, $name_email, $name_email);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            
            if(password_verify($pwd, $row['pwd'])){
                header('Location: ../index.php?msg=success');

                $user = new User($row['name'], $row['pwd'], $row['email'],$row['sex']);
                $user->__setId($row['id']);
                $user->setSessionVariables();
                exit();
            }else{
                header('Location: ../pages/signin.php?msg=pwderror');
            }
        }else{
            header('Location: ../pages/signin.php?msg=nousr');
            exit();
        }
    }