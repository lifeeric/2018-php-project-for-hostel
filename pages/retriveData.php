<?php 
require_once 'header.php';
require_once '../Core/init.php';

    if( !(isset($_SESSION['logged_in'])) )
    {
        header("Location: ../index.php");
    }

 ?>


<!--Show Student List Data-->
<div class="student-form">
    <div class="row">
        <div class="col-md-4">
                <a class="back" href="spa.php"> Back </a>
        </div>
        <div class="col-md-4">
            <h3> STUDENTS LIST </h3>
        </div>
        <div class="col-md-4 col-sm-12">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <input id="search" name="search" type="search" placeholder="CNIC/Name/Phone No" />
                <input name="submit" type="submit" value="Search" />
            </form>
        </div>
    </div>


<?php

        if( isset($_GET['submit']) )
        {
            $name = $_GET['search'];
        
            $sql = "SELECT * FROM `student_add` WHERE `email` LIKE '%$name%' OR `full_name` LIKE '%$name%' OR `F_name` LIKE '%$name%' OR `cnic` LIKE '%$name%' OR `contact_no` LIKE '%$name%';";
            $statement = $conn->query($sql);
            if( $statement->rowCount()  )
            {
                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                { ?>

    <div class="list">
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo $row->image; ?>" style="width: 100%;margin-bottom: 16px;">
            </div>
     
            <div class="col-md-4">
                <ul>
                    <li><strong style="text-decoration: underline">Full Name:</strong> <?php echo $row->full_name; ?></li>
                    <li><strong style="text-decoration: underline">Father Name:</strong> <?php echo $row->F_name; ?></li>
                    <li><strong style="text-decoration: underline">CNIC Number:</strong> <?php echo $row->cnic; ?></li>
                    <li><strong style="text-decoration: underline">Contact No:</strong> <?php echo $row->contact_no; ?></li>
                    <li><strong style="text-decoration: underline">Occupation:</strong> <?php echo $row->occupation; ?></li>
                    <li><strong style="text-decoration: underline">Program:</strong> <?php echo $row->program; ?></li>
                    <li><strong style="text-decoration: underline">Guardian Contact No:</strong> <?php echo $row->guardian_cont; ?></li> 
                    <li><strong style="text-decoration: underline">Semester/Year:</strong> <?php echo $row->semester; ?></li>
                </ul>
            </div>
            <div class="col-md-5">
                <ul>
                    <li><strong style="text-decoration: underline">Admission Date:</strong> <?php echo $row->admission_date; ?></li>
                    <li><strong style="text-decoration: underline">Room No:</strong> <?php echo $row->room_no; ?></li>
                    <li><strong style="text-decoration: underline">Admission Fee:</strong> <?php echo $row->admission_fee; ?></li>
                    <li><strong style="text-decoration: underline">Fees:</strong> <?php echo $row->fee; ?></li>
                    <li><strong style="text-decoration: underline">Security Advance:</strong> <?php echo $row->advance; ?></li>
                    <li><strong style="text-decoration: underline">Address:</strong> <?php echo $row->address; ?></li>
                    <li><strong style="text-decoration: underline">FB Link:</strong> <?php echo $row->email; ?></li>
                    <li><strong style="text-decoration: underline">College/Institution:</strong> <?php echo $row->c_name; ?></li>                    
                </ul>
            </div>  
        </div>
    </div>
      <?php     }
            }
            else 
            {
                echo '<p class="alert alert-danger"> Not Found </p>';
            }
        
    }
    else
    {


?>



 <?php
        
    $statement = new User;
    $myrow = $statement->retriveStudent( $conn );

    if( $myrow )
    {

        foreach( $myrow as $row )
        { ?>

    <div class="list">
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo $row->image; ?>" style="width: 100%;margin-bottom: 16px;">
            </div>
     
            <div class="col-md-4">
                <ul>
                    <li><strong style="text-decoration: underline">Full Name:</strong> <?php echo $row->full_name; ?></li>
                    <li><strong style="text-decoration: underline">Father Name:</strong> <?php echo $row->F_name; ?></li>
                    <li><strong style="text-decoration: underline">CNIC Number:</strong> <?php echo $row->cnic; ?></li>
                    <li><strong style="text-decoration: underline">Contact No:</strong> <?php echo $row->contact_no; ?></li>
                    <li><strong style="text-decoration: underline">Occupation:</strong> <?php echo $row->occupation; ?></li>
                    <li><strong style="text-decoration: underline">Program:</strong> <?php echo $row->program; ?></li>
                    <li><strong style="text-decoration: underline">Guardian Contact No:</strong> <?php echo $row->guardian_cont; ?></li> 
                    <li><strong style="text-decoration: underline">Semester/Year:</strong> <?php echo $row->semester; ?></li>
                </ul>
            </div>
            <div class="col-md-5">
                <ul>
                    <li><strong style="text-decoration: underline">Admission Date:</strong> <?php echo $row->admission_date; ?></li>
                    <li><strong style="text-decoration: underline">Room No:</strong> <?php echo $row->room_no; ?></li>
                    <li><strong style="text-decoration: underline">Admission Fee:</strong> <?php echo $row->admission_fee; ?></li>
                    <li><strong style="text-decoration: underline">Fees:</strong> <?php echo $row->fee; ?></li>
                    <li><strong style="text-decoration: underline">Security Advance:</strong> <?php echo $row->advance; ?></li>
                    <li><strong style="text-decoration: underline">Address:</strong> <?php echo $row->address; ?></li>
                    <li><strong style="text-decoration: underline">FB Link:</strong> <?php echo $row->email; ?></li>
                    <li><strong style="text-decoration: underline">College/Institution:</strong> <?php echo $row->c_name; ?></li>                    
                </ul>
            </div>  
        </div>
    </div>
<?php 

        }
    }
    else
    {
        echo "<p class='alert alert-warning'> No Student are added. </p>";
    }
}

?> 




 
</div>
<!--Show Student List Data-->


<script>
    function back()
    {
        window.history.back();
    }
</script>

</div>
<!-- /Max Width -->


</body>
</html>

