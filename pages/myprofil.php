<?php
    include '../functions/functions.php';

    headerHTML('Profilom');
?>

<main>

        <div class="col-sm-8">
            <h1><?php echo $_SESSION['name']?></h1>
            <p><?php echo $_SESSION['fullname']?></p>
        </div>


</main>