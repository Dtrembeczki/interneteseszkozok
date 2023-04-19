<?php
    $userid = $_GET['id'];
?>

<div id="msg"></div>

<div class="card col-xl-6 mx-auto p-4 mt-5">

    <!--profile_img change-->
    <form enctype="multipart/form-data" id="imgForm">
        <div class="mb-5">
            <input type="hidden" name="userid" id="userid" value="<?= $userid?>">
            <img id="profil_img" src="app/media/profilimg/default_img.jpg" alt="Default profil img" class="rounded border border-4" style="width: 120px;">
            <input type="file" name="profileimg" id="profileimgFile" class="btn btn-secondary">
            <!--<button id="imguploadbtn" name="imguploadbtn" class="btn btn-primary">Mentés</button>-->
        </div>
    </form>

    <form class="col-xl-10" id="userupdate">

        <h3>Profil adatainak megváltoztatása</h3>

        <input type="hidden" name="userid" value="<?= $userid?>">

        <!--select-->
        <div class="row mb-3">
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Titulus</label>
            <div class="col-sm-10">
                <select name="title" id="title" class="form-select">
                    <option value="">--</option>
                    <option value="dr.">dr.</option>
                    <option value="prof.">prof.</option>
                    <option value="id.">id.</option>
                    <option value="ifj.">ifj.</option>
                </select>
            </div>
        </div>

        <!--fname input-->
        <div class="row mb-3">
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Vezetéknév</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lname" name="lnameChng">
            </div>
        </div>

        <!--lname input-->
        <div class="row mb-3">
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Keresztnév</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="fname" name="fnameChng">
            </div>
        </div>

        <!--email input-->
        <div class="row mb-3">
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Email*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="emailChng">
            </div>
        </div>

        <!--birthdate disabled input-->
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

        <!--select gender-->
        <div class="row mb-3">
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Nemed:</label>
            <div class="col-sm-10">
                <select name="genderChng" id="gender" class="form-select">
                    <option value="f">férfi</option>
                    <option value="n">nő</option>
                    <option value="e">Egyéb/Nem nyilatkozom</option>
                </select>
            </div>
        </div>

        <!--news letter input-->
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
            <label class="col-xl-2 col-sm-10 col-form-label" for="newsletter">Hírlevélre feliratkozás</label>
                <div class="col-sm-10">

                        <select name="newsletterChng" id="newsletter" class="form-select">
                            <option value="1">Feliratkozva</option>
                            <option value="0">Leirtakozva</option>
                        </select>
                </div>
            </div>
        </div>

        

        <button class="btn btn-primary" value="<?= $userid?>">Szerkesztés mentése</button>
        <a href="?page=users" class="btn btn-secondary">Mégse</a>
    </form>

</div>

<!--pwd change input-->
<div class="card col-xl-6 mx-auto p-4 mt-5">
    <form id="pwdChangeForm">
        
        <h3>Jelszó megváltoztatása</h3>
        <div class="row mb-3">
            <label for="pwdchng" class="col-xl-2 col-sm-10 col-form-label">Új jelszó</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pwdchng" name="pwdChng">
            </div>
        </div>

        <div class="row mb-3">
            
            <label for="pwdchngAgain" class="col-xl-2 col-sm-10 col-form-label">Új jelszó ismétlése</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pwdchngAgain" name="pwdChngAgain">
                </div>
        </div>

        <input type="hidden" name="userid" value="<?= $userid?>">

        <button class="btn btn-primary" value="<?= $userid?>">Jelszó frissítése</button>
        <a href="?page=users" class="btn btn-secondary">Mégse</a>

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
                $("#title").val(user.title);
                $("#gender").val(user.gender);
                $("#newsletter").val(user.newsletter);
                $("#profil_img").attr('src', 'app/media/profilimg/' + user.img);
            } 
        });
}

    //update user ajax
    $(function(){

        $('#userupdate').on('submit', function(e){

        e.preventDefault();

        $.ajax({
            url: 'app/controller/update.controller.php',
            type: 'POST',
            dataType: 'JSON',
            data: $('#userupdate').serialize()
        }).done(function(d){
            
            $('#msg').text(d.msg).removeClass().addClass(d.class);

        }).fail(function(jqXhr, textStatus, errorMessage){
            //Nem tud egyszerre több AJAX üzenetet kezelni
            $('#msg').append("AJAX Failed: " + textStatus + " error: " + errorMessage + " jqXhr: " + jqXhr );
        })

        });

    });

 //update user pwd ajax
    $(function(){

        $('#pwdChangeForm').on('submit', function(e){

        e.preventDefault();

        $.ajax({
            url: 'app/controller/update.controller.php',
            type: 'POST',
            dataType: 'JSON',
            data: $('#pwdChangeForm').serialize()
        }).done(function(d){
            
            $('#msg').text(d.msg).removeClass().addClass(d.class);

        }).fail(function(jqXhr, textStatus, errorMessage){
            //Mostmár tud
            $('#msg').append("AJAX Failed: " + textStatus + " error: " + errorMessage + " jqXhr: " + jqXhr );
        })

        });

    });


 //update user profile img ajax
$(function(){

    $('#imgForm').on('submit', function(e){

    e.preventDefault();

    $.ajax({
        url: 'app/controller/update.controller.php',
        type: 'POST',
        dataType: 'JSON',
        data: new FormData(this),
        beforeSend: function(){
            $("#imguploadbtn").attr("disabled", "disabled");
        }
    }).done(function(d){
        
        $('#msg').text(d.msg).removeClass().addClass(d.class);

    }).fail(function(jqXhr, textStatus, errorMessage){
        //Mostmár tud
        $('#msg').append("AJAX Failed: " + textStatus + " error: " + errorMessage + " jqXhr: " + jqXhr );
    })

    });

});

</script>