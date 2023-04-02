<div class="col-xl-6 mx-auto">
    <div class="mt-4">
        <select id="order" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option selected value="ASC">Növekvő sorrend</option>
            <option value="DESC">Csökkenő sorrend</option>
        </select>
    </div>



    <div id="users"></div>

</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Törlés</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Biztosan törlöd?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nem, visszalépés</button>
        <button id="userDelete" type="button" class="btn btn-danger">Igen, törlés</button>
      </div>
    </div>
  </div>
</div>

<!--AJAX-->
<script>

    $(document).ready( function(){

        $.ajax({
            url: 'app/controller/users.controller.php',
            type: 'POST',
            success:function(result){
                $('#users').html(result);
            } 
        });
    });


</script>

<script>

var myModal = document.getElementById('deletModal')
var myInput = document.getElementById('delete')

console.log(userId);

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})

</script>