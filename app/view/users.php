
<div class="col-xl-6 mx-auto p-4 mt-5">

    <div class="col-xl-12">
      <label class="col-xl-2" for="order">Rendezés</label>
      <select class="col-xl-6 form-select" name="order" id="order" onchange="ordering(this.value)">
        <option value="ASC">Növekvő</option>
        <option value="DESC" selected>Csökkenő</option>
      </select>

    </div>

    <div id="msg"></div>

    <div id="users"></div>

</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="deleteModal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Törlés</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Biztosan törlöd?
      </div>
      <div class="modal-footer">
          <input type="hidden" disabled id="modalUserId">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nem, visszalépés</button>
          <button onclick="deleteUser(this.value)" id="userDelete" type="button" class="btn btn-danger">Igen, törlés</button> 
      </div>
    </div>
  </div>
</div>
 <!--eoModal -->

<!--update Modal
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 100%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profil szerkesztése</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form>
        <div class="mb-5 d-block">
            <img src="app/media/profilimg/default_img.jpg" alt="Default profil img" class="rounded border border-4 d-block mx-auto" style="width: 120px;">
            <input type="file" name="profileimg" id="profileimg" class="btn btn-secondary d-block mx-auto">
        </div>
    </form>

    <form class="col-xl-12">

        <div class="row mb-3">
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Vezetéknév</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lname" name="lname">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Keresztnév</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="fname" name="fname">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Email*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-xl-2 col-sm-10 col-form-label">Jelszó változtatás</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pwdchng" name="pwdchng">
            </div>
        </div>

        <div class="row mb-3">
            <label for="birthyear" class="col-xl-2 col-sm-10 col-form-label">
                Születési év
            </label>
            <div class="col-sm-10">
            <div class="col-sm-10">
                <input type="text" class="form-control" id="birthyear" name="birthyear" disabled>
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
      <div class="modal-footer">
          <input type="hidden" disabled id="modalUserId">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
          <button onclick="updateUser(this.value)" id="userDelete" type="button" class="btn btn-danger" value="<>">Mentés</button> 
      </div>
    </div>
  </div>
</div>
eoModal -->

<!--AJAX-->
<script>

    $(document).ready(display());

    function display(){
            $.ajax({
              url: 'app/controller/users.controller.php',
              type: 'POST',
              success:function(result){
                  $('#users').html(result);
              } 
          });
    }

    //delete users
    function deleteUser(userid){
      $.ajax({
        url: 'app/controller/users-delete.controller.php',
        method: 'post',
        data: {
          id: userid
        },
        success: function(data, status){
          display();
        }
      });
    }


    //display in order
    function ordering(orderValue){

      $.ajax({
              url: 'app/controller/users.controller.php',
              type: 'POST',
              data:{ order : orderValue },
              success:function(result){
                $('#users').html(result);                 
              } 
          });

    }


</script>

<script>

function openDeleteModal(id) { 
  var myModal = document.getElementById('deletModal');
  var myInput = document.getElementById('delete');

  var modalUserId = document.getElementById('modalUserId');
  modalUserId.value = id;

  var userDelete = document.getElementById('userDelete');
  userDelete.value = id;

  myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus();
  });

 }

</script>