<?php
    include '../functions/functions.php';
    

    headerHTML('Regisztráció');
?>
    
    <!--main-->
    <main class="col-sm-12 mx-auto">

        <!--Bootsrtap sigup form-->
        <form class="col-sm-6 mx-auto p-5 bg-body mt-5" action="../includes/insertUsr.inc.php" method="post">

            <!--username-->
            <div class="row mb-3">
                <label for="name3" class="col-sm-3 col-form-label">Felhasználó név</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name3" name="name">
                </div>
            </div>

            <!--first name-->
            <div class="row mb-3">
                <label for="fname3" class="col-sm-3 col-form-label">Keresztnév</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="fname3" name="fname">
                </div>
            </div>

            <!--last name-->
            <div class="row mb-3">
                <label for="lname3" class="col-sm-3 col-form-label">Vezetéknév</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="lname3" name="lname">
                </div>
            </div>

            <!--email-->
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="inputEmail3" name="email">
                </div>
            </div>

            <!--PWD-->
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Jelszó</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword3" name="pwd">
                </div>
            </div>

            <!--PWD again-->
            <div class="row mb-3">
                <label for="inputPassword3check" class="col-sm-3 col-form-label">Jelszó újra</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword3check" name="pwdcheck">
                </div>
            </div>

            <!--Date of birth-->
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Születési idő</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="inputPassword3" name="dateofbirth">
                </div>
            </div>

            <!--sex-->
            <fieldset class="row mb-3">

                <legend class="col-form-label col-sm-3 pt-0">Nemed:</legend>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="gridRadios1" value="f">
                        <label class="form-check-label" for="gridRadios1">
                            Férfi
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="gridRadios2" value="n">
                        <label class="form-check-label" for="gridRadios2">
                            Nő
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="gridRadios2" value="e">
                        <label class="form-check-label" for="gridRadios2">
                            Egyéb/nem nyilatkozom
                        </label>
                    </div>

                </div>

            </fieldset>

            <!--aszf-->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="aszf" id="gridCheckbox2" value="ok">
                <label class="form-check-label" for="gridCheckbox2">
                    Elolvastam az Általános Szerződési Feltételeket.
                </label>
            </div>

            <div class="row mx-3">
                <div class="col-sm-3 mt-2">
                    <button type="submit" class="btn btn-primary" name="signup">Regisztráció</button>
                </div>
                <div class="col-sm-9 d-flex justify-content-end">
                    <a href="signin.php">Már van fiókom</a>
                </div>
            </div>

            </form>

    </main>
</body>
</html>