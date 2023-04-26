<?php

    require_once 'public/elements/header.php';
    require_once 'public/elements/nav.php';
    require_once 'app/init.php';

    Cookie::create('test', 'testcookie', 2);
    
    $app = new App;
?>

<?php
    require_once 'public/elements/footer.php';
?>