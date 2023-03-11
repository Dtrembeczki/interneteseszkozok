<?php
    
    include 'config/Database.php';
    include 'src/user/User.php';

    include 'functions/functions.php';
    $db = new Database();
    $conn = $db->connection();

    /*
    if (!$conn->connect_error) {
        echo('connect successfully');
    }*/

    headerHTML('home');

    ?>


    </body>
    </html>