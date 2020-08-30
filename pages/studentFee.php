<?php 

date_default_timezone_set('Asia/Karachi');

require_once 'header.php';
require_once '../Core/init.php';

    if( !(isset($_SESSION['logged_in'])) )
    {
        header("Location: ../index.php");
    }

 ?>


<!-- Fee Start -->
<div class="student-form">

<?php

	if( !(isset($_GET['submit'])) )
	{
		echo "<p class='alert alert-danger'> You must be enter Student detail </p>";
	}
	else
	{

		$cnic = $_GET['cnic'];		
	
		$sql 	   = "SELECT * FROM student_add a INNER JOIN student_fee f ON a.s_id = f.s_id WHERE a.cnic = '{$cnic}' OR a.contact_no = '{$cnic}';";
		$statement = $conn->prepare($sql);

		if($statement->execute() )
		{
			if( $statement->rowCount() )
			{
				
?>
	
<?php 
				$rows = $statement->fetchAll(PDO::FETCH_OBJ);
				foreach( $rows as $row )
				{
					$image 	 = $row->image;
					$departure_date = $row->departure_date;
                    $id 	 = $row->s_id;
					$security= $row->advance;
					$name 	 = $row->full_name;
					$total = $row->fee;
					$receivable = $row->fee_dues;
					$date = $row->date;
     $receive = $row->fee_received;
     $advance = $row->advance;
				}	

 ?>

	<div class="row">
		<div class="col-md-4">
			<a class="back" href="spa.php"> Back </a>
		</div>
		<div class="col-md-4">
			<h4 class="header"> Monthly Fee/Check out </h4>
		</div>
		<div class="col-md-4">
		</div>
	</div>

	<Br />
	<Br />



	<div class="row">

		<div class="col-md-4">
			<img class="img-design" src="<?php echo $image; ?>" style="width: 100%">
			<button onclick="extra('fee')" class="extra-funds"> Monthly Fee </button>
			<button onclick="extra('extra')" class="extra-funds"> Extra Funds </button>
            <Br /> <Br />
            <!-- Fee Enter-->
            <div class="pays row" style="display: none" id="fee">
                <form class="form" action="../includes/received.php" method="POST">
                    <input type="text" name="received" placeholder="Montly Fee Received" />
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="hidden" name="fee" value="<?php echo $total; ?>" />
                    <input type="hidden" name="cnic" value="<?php echo $cnic; ?>" />
                    <input type="hidden" name="date" value="<?php echo Date('d/m/Y'); ?>" />

                    <Br />
                    <input type="submit" value="Submit Fee" />
                </form>
            </div>
            
            <!-- Dues -->
            <div class="pays" style="display: none;" id="extra">
			<form class="form" action="../includes/dues.php" method="POST">
				<input type="text" name="DuesReceived" placeholder="Amount" />
					<select name="dues" >
						<option value="due"> Pending Amount </option>
						<option value="securityReturn"> Security Fee Return </option>
					</select> 
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<input type="hidden" name="fee" value="<?php echo $total; ?>" />
				<input type="hidden" name="cnic" value="<?php echo $cnic; ?>" />
				<input type="hidden" name="date" value="<?php echo Date('d/m/Y'); ?>" />

				<Br />
				<Br />

				<input type="submit" value="Submit" />
			</form>
		</div>
            <p class="customSMS"></p>

		</div>
		<div class="col-md-8 max-height">
	<table>
		<tr class="round">
			<th>  Student ID </th>
			<th>  Name </th>
			<th>  Security Fee </th>
			<th>  Monthly Fee </th>
   <th>  Received Fee </th>
			<th>  Pending Dues </th>
			<th>  Month </th>
			<?php if( $advance == '0' ) {  ?>
			<th> Departure Date </th>
			<?php } ?>
		</tr>

<?php
				foreach( $rows as $row )
				{
					$id 	 = $row->s_id;
					$security= $row->advance;
					$name 	 = $row->full_name;
					$total = $row->fee;
					$receivable = $row->fee_dues;
					$date = $row->date;
     $receive = $row->fee_received;
?>
		<tr>
			<td> <?php echo $id; ?> </td>
			<td> <?php echo $name; ?> </td>
			<td> <i class="fas fa-check"></i><?php $security; ?> </td>
			<td> <?php echo $total; ?> </td>
   <td> <?php echo $receive; ?> </td>
			<td> <?php echo $receivable; ?> </td>
			<td> <?php echo $date; ?> </td>
			<?php if( $advance == '0' ) { ?>
			<td style="padding: 0;margin: 0"> <?php echo $departure_date; ?> </td>
											<?php } ?>
		</tr>
		<?php   } ?>
		<tr style="border: 2px solid #46a; background: #46a;color: #fafafa">
			<th> <?php echo $id; ?> </th>
			<th> <?php echo strtoupper($name); ?> </th>
			<th> <?php 
						if( $security !== '0' )
						{
							echo $security;
						}
						else
						{
							echo "Check out";
						}

				?> </th>
			<th> <?php echo $total; ?> </th>
		   <th> <?php
		             $statement = $conn->query("SELECT sum(fee_received) AS rec FROM student_fee WHERE s_id = $id;");
		             while( $row = $statement->fetch(PDO::FETCH_OBJ) )
		             {
		               echo $row->rec;
		             }
		            ?> </th>
			<th> <?php 
					  $sql = "SELECT sum(fee_dues) AS sumDues FROM student_fee WHERE s_id = $id;";
					  $statement= $conn->prepare($sql);
					  $statement->execute();
					  while( $row = $statement->fetch(PDO::FETCH_OBJ) )
					  {
					  	if( $row->sumDues === '0')
					  	{
					  		echo 'Clear';
					  	}
					  	else 
					  	echo $row->sumDues;
					  }
				?> 
			</th>
			<th> <?php echo "Current"; ?> </th>
			<?php if( $advance == '0' ) { ?>
			<th style="padding: 0;margin: 0"> <?php echo $departure_date; ?> </th>
			<?php } ?>
		</tr>
	
	</table>
		</div>
	</div>

	<Br />


<?php
			}
			else 
			{
				echo "<p class='alert alert-danger text-center'>No Student is existed! </p>";
			}

		}
	}

?>
</div>
<!-- Fee Close -->





<script src="../public/js/myQuery.js"></script>

<script type="text/javascript">
    function back()
    {
        window.history.back();
    }

    function extra(names)
    {
    	var i;
    	var x = document.getElementsByClassName('pays');

    	for( i = 0; i < x.length; i++ )
    	{
    		x[i].style.display = 'none';
    	}
    	document.getElementById(names).style.display = 'block';
    }
</script>


</div>
<!-- /Max Width -->


</body>
</html>