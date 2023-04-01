<div class="card">

    <div id="users"></div>

</div>

<!--AJAX-->
<script>

    $(function(){
        $('body').on('load', function(e){

            e.preventDefault();

            $.ajax({
                url: 'app/controller/users.controller.php',
                method: 'GET',
                dataType: 'JSON',
                data: ''
            }).done(function(d){
                $("#users").text(d.f_name);
            })

        });
    });

</script>