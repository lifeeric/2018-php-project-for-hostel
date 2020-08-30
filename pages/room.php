<?php 
    require_once 'header.php';
?>
<script>
 
 $(document).ready(function()
    {
        $('.check').click(function( e ) 
        {
            e.preventDefault();

            var name = $('#room-no').val();

            $('.box-checking').load("../includes/roomCheck.php", {
                room : name
            });
            
        });
        
    });

</script>



<!-- Student add form-->
<div class="student-form" id="room">
    <div class="row">

        <div class="col-md-4">
         <a href="spa.php" class="back"> Back </a>
        </div>

        <div class="col-md-4">
         <h3> Room Status</h3>
        </div>

        <div class="col-md-4">
        </div>

    </div>


<Br />
<Br />
<Br />
<Br />
<Br />

    <form action="" method="POST">

        <div class="row">

            <div class="col-md-6">
               <label> Enter Room No. like (01, 02, 03): </label> 
               <input type="text" id="room-no" placeholder="Search Room No"> 
            </div>

            <div class="col-md-6">
                <button style="margin-top: 33px;" class="check" > Check </button>
            </div>

        </div>
<p class="box-checking"></p>
    </from>

    
</div>
<!-- Student add form Close-->




</body>
</html>

