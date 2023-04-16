
<main class="col-xl-6 mx-auto p-4 mt-5">



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
          Elfogadom az ÁSZF-t!
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

  <button class="btn btn-primary">Regisztráció</button>
</form>


</main>

<!--AJAX-->
<script>

      $(function(){

        $('form').on('submit', function(e){

          e.preventDefault();

          $.ajax({
            url: 'app/controller/signup.controller.php',
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


</script>