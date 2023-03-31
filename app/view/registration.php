
<main class="d-flex justify-content-center mt-4">



    <!-- BOOTSTRAP reg form -->
<form class="col-xl-6" >
  
<div id="msg"></div>

<h1>Regisztráció</h1>

    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Vezetéknév</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="lname">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Keresztnév</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="fname">
        </div>
    </div>

  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="email">
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Jelszó</label>
    <div class="col-sm-10">
      <input autocomplete="off" type="password" class="form-control" id="inputPassword3" name="pwd">
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Jelszó újra</label>
    <div class="col-sm-10">
      <input autocomplete="off" type="password" class="form-control" id="inputPassword3" name="pwdAgain">
    </div>
  </div>

  
  <div class="row mb-3">
    <label for="birthyear" class="col-sm-2 col-form-label">
        Születési év
    </label>
    <div class="col-sm-10">
        <select name="birthyear" id="birthyear" class="form-select">
            <?php for($i = date('Y')-100; $i<=date('Y'); $i++):?>
                <option value="<?= $i?>"><?= $i?></option>
            <?php endfor;?>
        </select>
    </div>
  </div>

  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Nem</legend>
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
        <input class="form-check-input" type="checkbox" id="gridCheck1" name="gdpr">
        <label class="form-check-label" for="gridCheck1">
          Elfogadom az ÁSZF-t!
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
            url: '../app/controller/registration.php',
            method: 'POST',
            dataType: 'JSON',
            data: $('form').serialize()
          }).done(function(d){
            
            $('#msg').text(d.msg);

          }).fail(function(){
            //Mindig ajax failed-et dob és nem tér vissza a /app/controller/registration.php-rol
            alert('AJAX failed!');
          })

        });

      });


</script>