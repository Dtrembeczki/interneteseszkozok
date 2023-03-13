<?php
    include '../functions/functions.php';

    headerHTML('Bejelentkezés');
?>
    
    <!--main-->
    <main class="col-sm-12 mx-auto">

        <!--Bootsrtap sigup form-->
        <form class="col-sm-6 mx-auto p-5 bg-body mt-5" action="../includes/signin.inc.php" method="post">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Felhasználó név/E-mail</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" name="name_email">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Jelszó</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword3" name="pwd">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary" name="signinSubmit">Bejelentkezés</button>
                </div>
                <div class="col-sm-9 d-flex justify-content-end">
                    <a href="signup.php">Még nincs fiókom, regisztrálok</a>
                </div>
            </div>

        </form>

    </main>
</body>
</html>