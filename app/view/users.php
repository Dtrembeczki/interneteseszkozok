
<div class="col-xl-6 mx-auto">

    <div class="mt-5" id="msg"></div>

    <div id="users"></div>

</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
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