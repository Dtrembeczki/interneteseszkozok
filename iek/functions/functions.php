<?php

    function headerHTML($page){

        session_start();

        if ($page == "home") {
            $title = "Főoldal";
            $navs = "
            <li class='nav-item'>
                <a class='nav-link active' href='index.php'>Főoldal
                </a>
            </li>
            ";
        }else{
            $title = $page;
            $logout = "
            <li class='nav-item'>
                <a class='nav-link' href='includes/signout.inc.php'>Kijelentkezés</a>
            </li>
            ";
            $navs = "
            <li class='nav-item'>
                <a class='nav-link active' href='../index.php'>Főoldal
                </a>
            </li>
            ";
        }

        if (isset($_SESSION['uid'])) {
            $login = "<a class='nav-link' href='pages/myprofil.php'>Profilom</a>";
            $logout = "
            <li class='nav-item'>
                <a class='nav-link' href='../includes/signout.inc.php'>Kijelentkezés</a>
            </li>
            ";
        }else{
            $login = "<a class='nav-link' href='pages/signin.php'>Bejelentkezés/Regisztráció</a>";
            $logout = "";
        }

        ECHO "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <!--bootstrap import-->
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
            <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js' integrity='sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p' crossorigin='anonymous'></script>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js' integrity='sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF' crossorigin='anonymous'></script>
    
            <title>".$title."</title>
        </head>
        <body class='bg-light'>
            
        <!--navbar-->
            <ul class='nav justify-content-center bg-dark text-white'>
                ".$navs."
                <li class='nav-item'>
                    ". $login ."
                </li>
                ". $logout."
            </ul>
        ";
    }