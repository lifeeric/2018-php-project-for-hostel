<?php

    date_default_timezone_set('Asia/Karachi');
    require_once '../Core/init.php';

    if( !(isset($_SESSION['logged_in'])) )
    {
        header("Location: ../index.php");
    }

if( isset($_POST['submit']) )
{
    $to = $_POST['date_from'];
    $from = $_POST['date_to'];

?>

<!DOCTYPE html>
<html>
<head>
    <title> Reports </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../logo.png"/>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <script  src="../public/js/jquery.min.js"></script>
    <script src="../public/js/popper.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/lib/typed.js"></script>
    <link rel="stylesheet" href="../public/css/animate.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    
</head>
<body>

    <!--Header-->
    <header>
        <div class="menu animated bounceInUp">
            <a href="spa.php" style="float: left;">
                <img src="../public/images/logo3.png" style="width: 80px;">
            </a>
            <a id="logout" href="../includes/logout.php"> Log Out </a>

            <div class="none-typed">
                <div id="typed-strings">
                    <p>Welcome To HMS! <strong><?php $name =  $_SESSION['logged_in']['name'];
                                                     $first_name = explode('@', $name);
                                                     echo $first_name['0'];
                                                     ?></strong></p>
                    <p>Enjoy the best reports!</p>
                    <p>Hosteledu.com</p>
                </div>
               <h1><span id="typed"></span></h1>
           </div>

    </header>
    <!--/Header-->

<div class="fixed-buttons" onclick="Open();">
    ☰
</div>
    
<script>
  var typed = new Typed('#typed', {
    stringsElement: '#typed-strings',
    typeSpeed: 60,
    backSpeed: 40,
    loop: true
  });
</script>

<!-- Background color -->
<div class="backg">

   <div class="fixed-button" id="fixed-button">
       <a href="#" id="Close" onclick="Close();"> &times;Close </a>
       <a href="spa.php">Home</a>
       <a href="#daily" onclick="SPA('daily');">Mess Expenses</a>
       <a href="#admin" onclick="SPA('admin');">Administration Expenses</a>
       <a href="#employee" onclick="SPA('employee');">Employee Salaries</a>
       <a href="#utility" onclick="SPA('utility');">Utility Bills</a>
       <a href="#account" onclick="SPA('account');">Other Accounts</a>
       <a href="#fee" onclick="SPA('fee');">Monthly Fee</a>
       <a href="#new" onclick="SPA('new');">New Student Lists</a>
       <a href="#total" onclick="SPA('total');">Income Statement</a>
   </div>

  

    <!-- Table Start -->
<div class="table-show" id="daily">
    
    <Br />
    <Br />
    <Br />
    <Br />
    <Br />

    <h3 class="header"> Mess Expenses </h3>
    	<div class="table100">
    		<table>
                <thead>
                    <tr class="round">
                        <th>S.No</th>                  
                        <th>Items</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>

        <?php


$sql = "SELECT * FROM `daily_mess` WHERE `date` BETWEEN '$from' AND '$to';";
$statement = $conn->query($sql);

    $statement->execute();

    $x = 1;

    if( !$statement->rowCount() )
    {
        
    }
    else
    {
        while( $row = $statement->fetch(PDO::FETCH_OBJ) )
        { ?>


                    <tr>
                        <td><?php echo $x++; ?></td>
                        <td><?php echo $row->items; ?></td>
                        <td><?php echo $row->price; ?></td>
                        <td><?php echo $row->date; ?></td>
                    </tr>
                    
 <?php  }
   
    }

?> 
                    <!-- Total -->
                    <tr>
                        <th><?php echo $x++; ?></th>
                        <th><?php

                            $statement = $conn->query("SELECT count(items) AS countItem FROM `daily_mess` WHERE `date` BETWEEN '$from' AND '$to';");
                            while( $row = $statement->fetch(PDO::FETCH_BOTH) )
                            {
                                echo $row['countItem'];
                            }
                            ?>Items</th>
                        <th><?php

                                $statement = $conn->query("SELECT sum(price) AS Total FROM `daily_mess` WHERE `date` BETWEEN '$from' AND '$to';");
                                
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->Total;
                                }
                            ?></th>
                        <th><?php

                            $statement = $conn->query("SELECT count(DISTINCT date) AS Days FROM `daily_mess` WHERE `date` BETWEEN '$from' AND '$to';");

                            while( $row = $statement->fetch(PDO::FETCH_ASSOC) )
                            {
                                echo $row['Days'];
                            }
                            ?>Days</th>
                    </tr>
                </tbody>
            </table>

    	</div>
</div>
<!-- Table close -->


    
<div id="admin" class="table-show" style="display: none;">
    
    <Br />
    <Br />
    <Br />
    <Br />
    <Br />


    <!-- Table Start -->
    <h3 class="header" id=""> Administration Expenses </h3>
    	<div class="table100">

    		<table>
                <thead>
                    <tr class="round">
                        <th>S.No</th>              
                        <th>Expenses</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $x = 1;
                        $statement = $conn->query("SELECT * FROM `admin_exp` WHERE `date` BETWEEN '$from' AND '$to';");
                        while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                        { ?>

                    <tr>
                        <td> <?php echo $x++; ?></td>
                        <td> <?php echo $row->name_exp; ?></td>
                        <td> <?php echo $row->price; ?></td>
                        <td> <?php echo $row->date; ?></td>
                    </tr>

                <?php  }

                    ?>

                    <!-- Total -->
                    <tr>
                        <th> <?php echo $x++; ?></th>
                        <th> <?php 

                                $statement = $conn->query("SELECT count(name_exp) AS items FROM `admin_exp` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->items;
                                }

                                ?>Items</th>
                        <th> <?php 

                                $statement = $conn->query("SELECT sum(price) AS Price FROM `admin_exp` WHERE `date` BETWEEN '$from' AND '$to';");
                                while(  $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->Price;
                                }
                                
                                ?></th>
                        <th> <?php 

                                $statement = $conn->query("SELECT count(DISTINCT date) AS Days FROM `admin_exp` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_ASSOC) )
                                {
                                    echo $row['Days'];
                                }

                                ?>Days</th>
                    </tr>
                </tbody>
            </table>

    	</div>
</div>
<!-- Table close -->


<div id="employee" class="table-show" style="display: none;">
    
    <Br />
    <Br />
    <Br />
    <Br />
    <Br />
    <!-- Table Start -->
    <h3 class="header" id=""> Employee Salaries </h3>
    	<div class="table100">

    		<table>
                <thead>
                    <tr class="round">
                        <th>S.No</th>  
                        <th>Employee</th>
                        <th>Salaries</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        $x = 1;
                        $statement = $conn->query("SELECT * FROM `employee_salaries` WHERE `date` BETWEEN '$from' AND '$to';");
                        
                        $rows = $statement->fetchAll(PDO::FETCH_OBJ);

                        foreach( $rows as $row )
                        { ?>

                    <tr>
                        <td> <?php echo $x++; ?></td>
                        <td> <?php echo $row->employee_name; ?></td>
                        <td> <?php echo $row->emp_salaries; ?></td>
                        <td> <?php echo $row->date; ?></td>
                    </tr>

                <?php  }

                        ?>
    
                    <!-- Total -->
                    <tr>
                        <th> <?php echo $x++; ?></th>
                        <th> <?php 
                                $statement = $conn->query("SELECT count(employee_name) AS emp FROM `employee_salaries` WHERE `date` BETWEEN '$from' AND '$to';");
                                while(  $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->emp;
                                }
                                ?></th>
                        <th> <?php 
                                $statement = $conn->query("SELECT sum(emp_salaries) AS salaries FROM `employee_salaries` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->salaries;
                                }

                                ?></th>
                        <th> <?php 
                                $statement = $conn->query("SELECT count(DISTINCT date) AS date FROM `employee_salaries` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->date;
                                }

                                ?>Days</th>
                    </tr>
                </tbody>
            </table>

    	</div>
    </div>
    	<!-- Table close -->
    


    <div id="utility" class="table-show" style="display: none;">
    
    <Br />
    <Br />
    <Br />
    <Br />
    <Br />
    
    
<!-- Table Start -->
    <h3 class="header" id=""> Utility Bills </h3>
        	<!-- Table close -->
    <Br />
    <div class="table1002">

    		<table>
                <thead>
                    <tr class="round">
                        <th> S.No </th>
                        <th>Bill Name</th>
                        <th>Bill Account ID</th>
                        <th>Bill Amount</th>
                        <th>Bill Due Date</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $x = 1;
                        $statement = $conn->query("SELECT * FROM `utility_bill` WHERE `date` BETWEEN '$from' AND '$to';");
                        $rows = $statement->fetchAll(PDO::FETCH_OBJ);

                        foreach( $rows as $row )
                        { ?>

                    <tr>
                        <td> <?php echo $x++; ?></td>
                        <td> <?php echo $row->bill_name; ?></td>
                        <td> <?php echo $row->bill_id; ?></td>
                        <td> <?php echo $row->bill_amount; ?></td>
                        <td> <?php echo $row->bill_due_date; ?></td>
                        <td> <?php echo $row->date; ?></td>
                    </tr>
                    
                <?php  }

                    ?>

                    <!-- Total -->
                    <tr>
                        <th> <?php echo $x++; ?> </th>
                        <th> --- </th>
                        <th> <?php 
                                $statement = $conn->query("SELECT count(bill_id) AS IDs FROM `utility_bill` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->IDs;
                                }

                                ?> </th>
                        <th> <?php 
                                $statement = $conn->query("SELECT sum(bill_amount) AS amount FROM `utility_bill` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->amount;
                                }

                                ?> </th>
                        <th> --- </th>
                        <th> <?php 
                                $statement = $conn->query("SELECT count(DISTINCT date) AS date FROM `utility_bill` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->date;
                                }


                                ?>Days </th>
                    </tr>
                </tbody>
            </table>
            </div>

    	</div>
    

    	

    <div id="account" class="table-show" style="display: none;">
    
    <Br />
    <Br />
    <Br />
    <Br />
    <Br />
    <!-- Table Start -->
    <h3 class="header" id=""> Other Accounts </h3>
    	<div class="table1002">

    		<table>
                <thead>
                    <tr class="round">
                        <th>S.No</th>  
                        <th>Marketing Expenses</th>
                        <th>Rent Amount</th>
                        <th>Laundry</th>
                        <th>Date</th>                        
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $x = 1;
                        $statement = $conn->query("SELECT * FROM `other_accounts` WHERE `date` BETWEEN '$from' AND '$to';");
                        $rows = $statement->fetchAll(PDO::FETCH_OBJ);

                        foreach( $rows as $row )
                        { ?>
                        
                    <tr>
                        <td> <?php echo $x++; ?></td>
                        <td> <?php echo $row->marketing_exp; ?></td>
                        <td> <?php echo $row->rent_amount; ?></td>
                        <td> <?php echo $row->laundry; ?></td>
                        <td> <?php echo $row->date; ?></td>                        
                    </tr>

                <?php  }

                    ?>
                    
                    <!-- Total -->
                    <tr>
                        <th> <?php echo $x++; ?> </th>
                        <th> <?php 
                                $statement = $conn->query("SELECT sum(marketing_exp) AS marke_exp FROM `other_accounts` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->marke_exp;
                                }

                                ?> </th>
                        <th> <?php 
                                $statement = $conn->query("SELECT sum(rent_amount) AS amount FROM `other_accounts` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->amount;
                                }

                                ?> </th>
                        <th> <?php 
                                $statement = $conn->query("SELECT sum(laundry) AS laun_amount FROM `other_accounts` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->laun_amount;
                                }
                                ?> </th>
                        <th> <?php 
                                $statement = $conn->query("SELECT count(DISTINCT date) AS date FROM `other_accounts` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->date;
                                }

                                ?>Days </th>
                    </tr>

                </tbody>
            </table>

    	</div>
    </div>
<!-- Table close -->
    
    
    

    

    
    <div id="fee" class="table-show" style="display: none;">
    
    <Br />
    <Br />
    <Br />
    <Br />
    <Br />
    <!-- Table -->
    <h3 class="header">Student Fee</h3>
        <div class="table1003">

    		<table>
                <thead>
                    <tr class="round">
                        <th>ID</th>
                        <th>Name</th>
                        <th>F-Name</th>
                        <th>CNIC</th>
                        <th>Phone</th>
                        <th>Institute</th>
                        <th>Fee Received</th>
                        <th>Dues</th>
                        <th>Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $statement = $conn->query("SELECT * FROM `student_add` INNER JOIN `student_fee`  ON `student_add`.`s_id` = `student_fee`.`s_id` WHERE `student_fee`.`date` BETWEEN '$from' AND '$to' AND fee_received != '0';");
                        $rows = $statement->fetchAll(PDO::FETCH_OBJ);
                        
                        foreach( $rows as $row )
                        { ?>

                    <tr>
                        <td> <?php echo $row->s_id; ?> </td>
                        <td> <?php echo $row->full_name; ?> </td>
                        <td> <?php echo $row->F_name; ?> </td>
                        <td> <?php echo $row->cnic; ?> </td>
                        <td> <?php echo $row->contact_no; ?> </td>
                        <td> <?php echo $row->c_name; ?> </td>
                        <td> <?php echo $row->fee_received; ?> </td>
                        <td> <?php echo $row->fee_dues; ?> </td>
                        <td> <?php echo $row->date; ?> </td>
                    </tr>

                <?php   }

                    ?>

                    <!-- Total -->
                    <tr>
                        <th> <?php 
                                $statement = $conn->query("SELECT count(DISTINCT s_id) AS students FROM `student_fee` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->students;
                                }

                                ?> </th>
                        <th> --- </th>
                        <th> --- </th>
                        <th> --- </th>
                        <th> --- </th>
                        <th> --- </th>
                        <th> <?php 
                                $statement = $conn->query("SELECT sum(fee_received) AS received FROM `student_fee` WHERE `date` BETWEEN '$from' AND '$to'");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->received;
                                }

                                ?> </th>
                        <th> <?php 
                                $statement = $conn->query("SELECT sum(fee_dues) AS due FROM `student_fee` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->due;
                                }

                                ?> </th>
                        <th> <?php 
                                $statement = $conn->query("SELECT count(DISTINCT date) AS date FROM `student_fee` WHERE `date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->date;
                                }

                                ?>Days </th>
                    </tr>
                </tbody>
            </table>

    	</div>
    </div>
    
    


    <div id="new" class="table-show" style="display: none;">
    
    <Br />
    <Br />
    <Br />
    <Br />
    <Br />

    <h3 class="header" id="">New Student Added</h3>
    <div class="table1003">
    <!-- Table -->
    		<table>
                <thead>
                    <tr class="round">
                        <th>ID</th>
                        <th>Name</th>
                        <th>F-Name</th>
                        <th>CNIC</th>
                        <th>College</th>
                        <th>Guardian Contact</th>
                        <th>Admission Fee</th>
                        <th>Security Fee</th>
                        <th>Admission Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $statement = $conn->query("SELECT * FROM `student_add` WHERE `admission_date` BETWEEN '$from' AND '$to';");
                        $rows = $statement->fetchAll(PDO::FETCH_OBJ);

                        foreach( $rows as $row )
                        { ?>

                
                    <tr>
                        <td> <?php echo $row->s_id; ?> </td>
                        <td> <?php echo $row->full_name; ?> </td>
                        <td> <?php echo $row->F_name; ?> </td>
                        <td> <?php echo $row->cnic; ?> </td>
                        <td> <?php echo $row->c_name; ?> </td>
                        <td> <?php echo $row->guardian_cont; ?> </td>
                        <td> <?php echo $row->admission_fee; ?> </td>
                        <td> <?php echo $row->advance; ?> </td>
                        <td> <?php echo $row->admission_date; ?> </td>
                    </tr>

                <?php   }

                        ?>

                    <!-- Total -->
                    <tr>
                        <th> <?php 
                                $statement = $conn->query("SELECT count(s_id) AS students FROM `student_add` WHERE `admission_date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->students;
                                }

                                ?> </th>
                        <th> --- </th>
                        <th> --- </th>
                        <th> --- </th>
                        <th> --- </th>
                        <th>  ---</th>
                        <th> <?php 
                                $statement = $conn->query("SELECT sum(admission_fee) AS fee_admission FROM `student_add` WHERE `admission_date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->fee_admission;
                                }

                                ?> </th>
                        <th> <?php 
                                $statement = $conn->query("SELECT sum(advance) AS security FROM `student_add` WHERE `admission_date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->security;
                                }

                                ?> </th>
                        <th> <?php 
                                $statement = $conn->query("SELECT count(DISTINCT admission_date) AS date FROM `student_add` WHERE `admission_date` BETWEEN '$from' AND '$to';");
                                while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                {
                                    echo $row->date;
                                }

                                ?>Days</th>
                    </tr>
                </tbody>
            </table>

    	</div>
    </div>
    
    <Br />
    
    <!-- Table Close -->



    <div id="total" class="table-show" style="display: none;">
    
    <Br />
    <Br />
    <Br />
    <Br />
    <Br />


     <!-- Table -->
    <h3 class="header"> Income Statement</h3>
        <div class="totalCollection">

            <ul>
                <li>  Total Fee Collection  <span> <?php
                                                                    $statement = $conn->query("SELECT sum(fee_received) AS Fee FROM `student_fee` WHERE `date` BETWEEN '$from' AND '$to';");
                                                                    while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                                                    {
                                                                        echo $monthlyF = $row->Fee;
                                                                    }
                    ?> </span></li>
                <li>  Total Admission Fee    <span> <?php
                                                                    $statement = $conn->query("SELECT sum(admission_fee) AS admissionFees FROM `student_add` WHERE `admission_date` BETWEEN '$from' AND '$to';");
                                                                    while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                                                    {
                                                                        echo $admissionF = $row->admissionFees;
                                                                    }
                    ?> </span></li>
                <li>  Total Securities   <span> <?php
                                                                    $statement = $conn->query("SELECT sum(advance) AS security FROM `student_add` WHERE `admission_date` BETWEEN '$from' AND '$to';");
                                                                    while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                                                    {
                                                                        echo $row->security;
                                                                    }
                    ?> </span></li>
                <li style="color: #008000;"> <strong> Revenue/Income ----------------------------- </strong> <span style="font-weight: 600"> <?php
                                                                    $revenue = $monthlyF + $admissionF;
                                                                    echo $revenue;
                    ?> </span></li>
                <li>  Total Food Expenses       <span> <?php 
                                                                    $statement = $conn->query("SELECT sum(price) AS Price FROM `daily_mess` WHERE `date` BETWEEN '$from' AND '$to';");
                                                                    while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                                                    {
                                                                        echo $Fprice = $row->Price;
                                                                    }
                    ?></span></li>
                <li>  Utility Bills Expenses    <span> <?php
                                                                    $statement = $conn->query("SELECT sum(bill_amount) AS Amounts FROM `utility_bill` WHERE `date` BETWEEN '$from' AND '$to';");
                                                                    while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                                                    {
                                                                        echo $bills = $row->Amounts;
                                                                    }
                    ?></span></li>
                <li>  Administration Expenses  <span> <?php
                                                                    $statement = $conn->query("SELECT sum(price) AS Price FROM `admin_exp` WHERE `date` BETWEEN '$from' AND '$to';");
                                                                    while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                                                    {
                                                                        echo $Aprice = $row->Price;
                                                                    }
                    ?></span></li>
                <li>  Marketing Expenses       <span> <?php
                                                                    $statement = $conn->query("SELECT sum(marketing_exp) AS Market FROM `other_accounts` WHERE `date` BETWEEN '$from' AND '$to';");
                                                                    while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                                                    {
                                                                        echo $market = $row->Market;
                                                                    }
                    ?></span></li>
                <li>  Laundry Expenses         <span> <?php
                                                                    $statement = $conn->query("SELECT sum(laundry) AS Laundry FROM other_accounts WHERE `date` BETWEEN '$from' AND '$to'");
                                                                    while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                                                    {
                                                                        echo $laundry = $row->Laundry;
                                                                    }
                    ?></span></li>
                <li>  Rent Expense             <span> <?php
                                                                    $statement = $conn->query("SELECT sum(rent_amount) AS RentAmount FROM `other_accounts` WHERE `date` BETWEEN '$from' AND '$to'");
                                                                    while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                                                    {
                                                                        echo $rent = $row->RentAmount;
                                                                    }

                    ?></span></li>
                <li>  Total Salaries                 <span> <?php
                                                                    $statement = $conn->query("SELECT sum(emp_salaries) AS Salaries FROM `employee_salaries` WHERE `date` BETWEEN '$from' AND '$to';");
                                                                    while( $row = $statement->fetch(PDO::FETCH_OBJ) )
                                                                    {
                                                                        echo $salaries = $row->Salaries;
                                                                    }
                    ?></span></li>
                <li style="color: #008000;"> <strong> Total Expenses   -----------------------------        </strong> <span style="font-weight: 600"> <?php 
                                                                    $totalExp = $Fprice + $bills + $Aprice + $market + $laundry + $rent + $salaries;
                                                                    echo $totalExp;
                    ?></span></li>
                <li style="color: #008000"> <strong> Surplus/Deficit  -----------------------------        </strong> <span style="font-weight: 600"> <?php 
                                                                    $surplus = $monthlyF + $admissionF - ($totalExp);

                                                                    if( $surplus < 0 )
                                                                    {
                                                                        echo "<span style='color: #ef3943'>{$surplus}</span>";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "<span style='color: #008000'>{$surplus}</span>";
                                                                    }
                    ?> </span></li>
            </ul>

        </div>
    </div>

    <Br />
    <Br />
    <Br />
    <Br />
    


<?php
    }
    else
    {
        header("Location: spa.php");
    }
 ?>
 </div>




<script>

function SPA( ClassName )
{
    var x = document.getElementsByClassName('table-show');
    var i;
    for( i = 0; i < x.length; i++)
    {
        x[i].style.display = "none";
    }
    document.getElementById(ClassName).style.display = "block";
}



function Open()
{
    document.getElementById('fixed-button').style.display = "block";
}

function Close()
{
    document.getElementById('fixed-button').style.display = "none";
}
</script>



<!-- Background color -->
<?php require_once'footer.php'; ?>
   