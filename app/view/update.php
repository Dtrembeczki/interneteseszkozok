<?php
    $userid = $_GET['id'];
?>

<div id="msg"></div>

<div class="card col-xl-6 mx-auto p-4 mt-5">

    <form>
        <div class="mb-5">
            <img src="app/media/profilimg/default_img.jpg" alt="Default profil img" class="rounded border border-4" style="width: 120px;">
            <input type="file" name="profileimg" id="profileimg" class="btn btn-secondary">
        </div>
    </form>

    <form class="col-xl-10" id="userupdate">

        <div class="row mb-3">
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Vezetéknév</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lname" name="lnameChng">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Keresztnév</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="fname" name="fnameChng">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Email*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="emailChng">
            </div>
        </div>

        

        <div class="row mb-3">
            <label for="birthyear" class="col-xl-2 col-sm-10 col-form-label">
                Születési év
            </label>
            <div class="col-sm-10">
            <div class="col-sm-10">
                <input type="text" class="form-control" id="birthyear" name="birthyearChng" disabled>
            </div>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
                <div class="form-check">
                    <input type="hidden" name="newsletter" value="no">

                    <input class="form-check-input" type="checkbox" id="aszf" name="newsletter" value="yes">

                    <label class="form-check-label" for="aszf">
                        Hírlevélre feliratkozás
                    </label>
                </div>
            </div>
        </div>

        <button class="btn btn-primary" onclick="updateUsr(this.value)" value="<?= $userid?>">Szerkesztés mentése</button>
        <a href="?page=users" class="btn btn-secondary">Mégse</a>
    </form>

</div>

<div class="card col-xl-6 mx-auto p-4 mt-5">
    <form id="pwdChange">
        <div class="row mb-3">
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Új jelszó</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pwdchng" name="pwdChng">
            </div>
        </div>

        <div class="row mb-3">
            
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Új jelszó ismétlése</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pwdchng" name="pwdChng">
                </div>
            </div>

    </form>
</div>

<!--AJAX-->
<script>

$(document).ready(displayUpdate());

    function displayUpdate(){
            $.ajax({
            url: 'app/controller/update.controller.php',
            type: 'POST',
            data: { userid : '' + <?= $userid?> + ''},
            success:function(data, status){
                var user=JSON.parse(data);
                $("#lname").val(user.lname);
                $("#fname").val(user.fname);
                $("#email").val(user.email);
                $("#birthyear").val(user.birthyear);
            } 
        });
}


function updateUsr(userid){

    $(function(){

        $('#userupdate').on('submit', function(e){

        e.preventDefault();

        $.ajax({
            url: 'app/controller/update.controller.php',
            type: 'POST',
            dataType: 'JSON',
            data: $('form').serialize()
        }).done(function(d){
            
            $('#msg').text(d.msg).removeClass().addClass(d.class);

        }).fail(function(jqXhr, textStatus, errorMessage){
            //Mindig ajax failed-et dob és nem tér vissza a /app/controller/registration.php-rol
            $('#msg').append("AJAX Failed: " + textStatus + " error: " + errorMessage + " jqXhr: " + jqXhr );
        })

        });

    });
    
}
</script>