<div class="col-xl-6 mx-auto">
    <div class="mt-4">
        <select id="order" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option selected value="ASC">Növekvő sorrend</option>
            <option value="DESC">Csökkenő sorrend</option>
        </select>
    </div>
    <div id="users"></div>

</div>

<!--AJAX-->
<script>

    $(document).ready( function(){
        $.ajax({
            url : 'app/controller/users.controller.php',
            type: 'POST',
            dataType: 'JSON',
            success: function(res){
                var len = res.length;
                for(var i = 0; i<len;i++){
                    var id = res[i].id;
                    var fname = res[i].fname;
                    var lname = res[i].lname;
                    var email = res[i].email;

                    var user_str = "<div class='card mx-2 m-5'>" + 
                                        "<div class='card-header'>" + id + "</div>" +
                                        "<h2>" + lname + " " + fname +"</h2>" +
                                        "<p>" + email + "</p>" +
                                    "</div>";

                    $("#users").append(user_str);
                }
            }
        
        });
    });

</script>