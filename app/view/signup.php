
<?php
  $keyvalue = md5(rand());
  
  Cookie::create('captcha', $keyvalue, 1);
  $_SESSION['captcha'] = $keyvalue;
?>

<!--my loader-->
<div class="my-loader-holder" id="loader">
    <div class="my-loader"></div>
</div>

<main class="col-xl-6 mx-auto p-4 mt-5 skeleton">

    <!-- BOOTSTRAP reg form -->
<form>

<div id="msg"></div>

<h1>Regisztráció</h1>

  <div class="row mb-3">
      <label for="birthyear" class="col-xl-2 col-sm-10 col-form-label">
          Titulus
      </label>
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

    <div class="row mb-3">
        <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Vezetéknév*</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="lname">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Keresztnév*</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="fname">
        </div>
    </div>

  <div class="row mb-3">
    <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Email*</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="email">
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-xl-2 col-sm-10 col-form-label">Jelszó*</label>
    <div class="col-sm-10">
      <input autocomplete="off" type="password" class="form-control" id="inputPassword3" name="pwd">
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-xl-2 col-sm-10 col-form-label">Jelszó újra*</label>
    <div class="col-sm-10">
      <input autocomplete="off" type="password" class="form-control" id="inputPassword3" name="pwdAgain">
    </div>
  </div>

  
  <div class="row mb-3">
    <label for="birthyear" class="col-xl-2 col-sm-10 col-form-label">
        Születési év
    </label>
    <div class="col-sm-10">
        <input type="date" name="birthyear" id="birthyear">
    </div>
  </div>

  <fieldset class="row mb-3">
    <legend class="col-form-label col-xl-2 col-sm-10 pt-0">Nem</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="f" checked>
        <label class="form-check-label" for="gridRadios1">
          Férfi
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="n">
        <label class="form-check-label" for="gridRadios2">
          Nő
        </label>
      </div>
      
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="e">
        <label class="form-check-label" for="gridRadios2">
          Nem nyilatkozom/Egyéb
        </label>
      </div>

    </div>
  </fieldset>

  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="form-check">
        <input type="hidden" name="gdpr" value="no">

        <input class="form-check-input" type="checkbox" id="aszf" name="gdpr" value="yes">

        <label class="form-check-label" for="aszf">
          Elfogadom az <a href="?page=aszf">ÁSZF-t</a>!
        </label>
      </div>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="form-check">
        <input class="form-check-input" type="hidden" id="newsletter" name="newsletter" value="0">
        <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter" value="1">

        <label class="form-check-label" for="newsletter">
          Feliratkozom a hírlevélre!
        </label>
      </div>
    </div>
  </div>

  <!--captcha-->
  <div class="row mb-3 card p-4 bg-light text-dark">
    <div class="col-sm-8 offset-sm-2">
      <div class="form-check" id="captcha-holder">

        <div class="d-none" id="loader">
            Loading...
        </div>

        <input class="form-check-input fs-2" type="checkbox" id="captcha" name="captcha" value="<?= $_SESSION['captcha']?>">
        <label class="form-check-label fs-2" for="captcha">
          Nem vagyok robot!
        </label>
      </div>
    </div>
  </div>

  <button class="btn btn-primary col-sm-12" id="btn" disabled>Regisztráció</button>
</form>
</main>

<!--AJAX-->
<script>

      $(document).ready(function(){
        $("#loader").hide();
      });

      $(function(){

        $('form').on('submit', function(e){

          e.preventDefault();

          $("#loader").show();

          $.ajax({
            url: 'app/controller/signup.controller.php',
            type: 'POST',
            dataType: 'JSON',
            data: $('form').serialize()
          }).done(function(d){
            
            $("#loader").hide();

            $('#msg').text(d.msg).removeClass().addClass(d.class);

          }).fail(function(jqXhr, textStatus, errorMessage){
            //Mindig ajax failed-et dob és nem tér vissza a /app/controller/registration.php-rol
            $('#msg').append("AJAX Failed: " + textStatus + " error: " + errorMessage + " jqXhr: " + jqXhr );
          })

        });

      });


      //posttal elküldi a serverside-nak aminél ha egyezik a cookie-ban eltárolt captcha akkor visszaküldi a kulcsot, amit leellenőriz
      $("#captcha").change(function(){

        var seskey = $('#captcha').val();

        if(this.checked){
          $.ajax({
            url: 'app/controller/captcha.php',
            type: 'POST',
            dataType: 'json',
            data: { key : seskey },
            success: function(data, status){
              if(data.reskey == 1){
                $('#captcha-holder').html("<p class='fs-5 text-success text-center'>Nem vagy robot, regisztrálhatsz!</p>");
                $('#btn').removeAttr('disabled');
              }else{
                $('#captcha-holder').html("<p class='fs-5 text-danger text-center'>Robot Vagy</p>");
              }
            }
            
          })
        }
      });
      
</script>
<script>

</script>
