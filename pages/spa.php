<?php

    date_default_timezone_set('Asia/Karachi');
    require_once '../Core/init.php';

    
    if( !(isset($_SESSION['logged_in'])) )
    {
        header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title> Hostel Management System </title>
    <link rel="shortcut icon" type="image/png" href="../logo.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <script  src="../public/js/jquery.min.js"></script>
    <script src="../public/js/popper.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/lib/typed.js"></script>
    <link rel="stylesheet" href="../public/css/animate.css">
    
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

        </div>
    </header>
    <!--/Header-->


    
<script>
  var typed = new Typed('#typed', {
    stringsElement: '#typed-strings',
    typeSpeed: 60,
    backSpeed: 40,
    loop: true
  });
</script>
    
     

    <?php require_once 'navbar.php';?>

    

<!-- Max width -->
<div class="max-width">
        
    <!-- DashBoard -->
    <div class="student-form animated bounceInRight" id="dashboard">
        <a href="#" class="sideBar" onclick="Open();">☰</a>
        <h3> DASHBOARD </h3>
        <div class="row">
            
            <div class="col-md col-sm-3 col-lg signle-portfolio" onclick="openCity('student')">
                <img src="../public/images/addStudent.png" class="portfolio-img">
                <div class="portfolio-text">
                    <p>ADD STUDENT</p>
                </div>
            </div>
            
            <div class="col-md col-sm-3 col-lg signle-portfolio">
                <a href="retriveData.php">
                    <img src="../public/images/list.png" class="portfolio-img">
                    <div class="portfolio-text">
                        <p>STUDENT LISTS</p>
                    </div>
                </a>
            </div>

            <div class="col-md col-sm-3 col-lg signle-portfolio" onclick="openCity('monthly')">
                <img src="../public/images/rent.jpg" class="portfolio-img">
                <div class="portfolio-text">
                    <p>MONTHLY FEE</p>
                </div>
            </div>

            <div class="col-md col-sm-3 col-lg signle-portfolio" onclick="openCity('Daily')">
                <img src="../public/images/daily.png" class="portfolio-img">
                <div class="portfolio-text">
                    <p>ADD MESS EXP</p>
                </div>
            </div>
            
            <div class="col-md col-sm-3 col-lg signle-portfolio" onclick="openCity('other')">
                <img src="../public/images/admin.jpg" class="portfolio-img">
                <div class="portfolio-text">
                    <p>ADMIN EXP</p>
                </div>
            </div>
            
        </div>
        
        <div class="row">
            
            <div class="col-md col-sm-3 col-lg signle-portfolio" onclick="openCity('bill')">
                <img src="../public/images/billing.png" class="portfolio-img">
                <div class="portfolio-text">
                    <p>UTILITY BILLS</p>
                </div>
            </div>

            <div class="col-md col-sm-3 col-lg signle-portfolio" onclick="openCity('accounts')">
                <img src="../public/images/other.jpg" class="portfolio-img">
                <div class="portfolio-text">
                    <p>OTHER ACCOUNTS</p>
                </div>
            </div>

            <div class="col-md col-sm-3 col-lg signle-portfolio" onclick="openCity('Employee')">
                <img src="../public/images/salaries.png" class="portfolio-img">
                <div class="portfolio-text">
                    <p>SALARIES</p>
                </div>
            </div>
            <div class="col-md col-sm-3 col-lg signle-portfolio" onclick="openCity('room')">
                <a href="room.php">    
                    <img src="../public/images/room.jpg" class="portfolio-img">
                    <div class="portfolio-text">
                        <p>ROOM STATUS</p>
                    </div>
                </a>
            </div>
            <div class="col-md col-sm-3 col-lg signle-portfolio" onclick="openCity('calculation')">
                <img src="../public/images/report.png" class="portfolio-img">
                <div class="portfolio-text">
                    <p>REPORTS</p>
                </div>
            </div>
        </div>
    </div>
    <!-- DashBoard Close -->



<div class="student-form" id="accounts" style="display: none;">
    <a href="#" class="sideBar" onclick="Open();">☰</a>
    <h3> Other Accounts </h3>
    <form class="form" action="../includes/otherAccount.php" method="POST">

        <div class="row">
            <div class="col-md-4">
                <!-- rent -->
                <label for="rent">Marketing Expense:</label>
                <input type="text" class="clear" id="rent" name="market" value="0" />
                <Br />
            </div>

            <div class="col-md-4">
                <!-- rent-amount -->
                <label for="rent-amount">Rent Amount:</label>
                <input type="text" class="clear" id="rent-amount" name="rent-amount" value="0" />
                <Br />
            </div>
            <div class="col-md-4">
                <!-- laundry -->
                <label for="laundry">Laundry:</label>
                <input type="text" class="clear" id="laundry" name="laundry" value="0" />
                <Br />
            </div>
        </div>

            <input type="hidden" name="date" value="<?php echo date('d/m/Y'); ?>" />

        <Br />

        <!-- Submit -->
        <input type="submit" name="submit" value="Submit" />
        <p class="customSMS"></p>

    </form>
</div>


<!-- Monthly fee  -->
<div class="student-form" id="monthly" style="display: none;">
    <a href="#" class="sideBar" onclick="Open();">☰</a>
    <h3> Monthly Fee </h3>
    
    <form action="studentFee.php" method="GET">

        <div class="row">
            <div class="col-md-12">
                <!-- cnic -->
                <label for="cnic">CNIC/Phone No:</label>
                <input type="text" class="input" id="cnic" name="cnic" placeholder="Enter CNIC/Phone no" />
                <Br />
            </div>
        </div>
        

        <Br />

        <!-- Submit -->
        <input type="submit" name="submit" value="Submit" />
        <p class="customSMS"></p>

    </form>

</div>

<!-- Monthly fee -->




    

<div class="student-form" id="bill" style="display: none;">
    <a href="#" class="sideBar" onclick="Open();">☰</a>
    <h3> Utility Bills </h3>
    <form class="form" action="../includes/billing.php" method="POST">


        <!-- InterNet Bill  -->
        <div class="row">
            <div class="col-md-3">
     
                <label for="inter-bill-month">Bill Name:</label>
                <input type="text" class="clear" id="inter-bill-month" name="bill_name" placeholder="Internet/Gas" />
            </div>
            <div class="col-md-3">
  
                <label for="int-account-id">Bill Account ID:</label>
                <input type="text" class="clear" id="int-account-id" name="bill_id" placeholder="123456" />
            </div>
            <div class="col-md-3">
 
                <label for="inter-bill-amount">Bill Amount:</label>
                <input type="text" class="clear" id="inter-bill-amount" name="bill_amount" placeholder="20000" />
            </div>
            <div class="col-md-3">

                <label for="inter-bill-due-date">Bill Due Date:</label>
                <input type="date" id="inter-bill-due-date" name="bill-due-date" />
            </div>
        </div>
        

        
        <!-- Date()  -->
        <input type="hidden" name="date" value="<?php echo date('d/m/Y'); ?>" />

        
        <Br />
        <Br />


        <!-- Submit -->
        <input type="submit" name="submit" value="Submit" />
        <p class="customSMS"></p>
    </form>
    
</div>

        
        
            
<div class="student-form" id="Daily" style="display: none;">
    <a href="#" class="sideBar" onclick="Open();">☰</a>
    <h3> Daily Mess Expenses </h3>

    <form class="form" action="../includes/dailyExp.php" method="POST">

        <div class="row">
            <div class="col-md-4">
            <!-- addmission_date -->
            <label for="addmission_date">Day/Month/Year:</label>
            <input type="text" id="addmission_date" name="addmission_date" value="<?php echo date('d/m/Y'); ?>" />
        </div>
            <div class="col-md-4">
                <!-- item -->
                <label for="item">Item Name:</label>
                <input type="text" class="clear" id="item" name="item" placeholder="Item Name" />
                <Br />
            </div>

            <div class="col-md-4">
                <!-- price -->
                <label for="price">Item Price:</label>
                <input type="text" class="clear" id="price" name="price" placeholder="Item Price" />
                <Br />
            </div>
    </div>  

        
        <Br />
        <Br />


        <!-- Submit -->
        <input type="submit" name="submit" value="Submit" />
        <p class="customSMS"></p>
    </form>
    
</div>
        

          
<div class="student-form" id="other" style="display: none;">
    <a href="#" class="sideBar" onclick="Open();">☰</a>
    <h3> Administration Expenses </h3>
    <form class="form" action="../includes/adminExp.php" method="POST">
        
        <div class="row">
            <div class="col-md-6">
                <!-- admin -->
                <label for="admin">Name Expense:</label>
                <input type="text" class="clear" id="admin" name="admin" placeholder="Name Expense" />
                <Br />
            </div>

            <div class="col-md-6">
                <!-- salaries -->
                <label for="salaries">Price:</label>
                <input type="text" class="clear" id="salaries" name="price" placeholder="Price" />
                <Br />
            </div>
        </div>
        

        <div class="col-md-6">
            <!-- addmission_date -->
            <label for="addmission_date"></label>
            <input type="hidden" id="addmission_date" name="date" value="<?= date('d/m/Y'); ?>" />
        </div>


        <Br />
        <Br />


        <!-- Submit -->
        <input type="submit" name="submit" value="Submit" />
        <p class="customSMS"></p>
    </form>
    
</div>



<!-- employee sarlaries -->
<div class="student-form" id="Employee" style="display: none;">
    <a href="#" class="sideBar" onclick="Open();">☰</a>
    <h3> Employee Salaries </h3>
    <form class="form" action="../includes/employee.php" method="POST">

        
        <div class="row">
            <div class="col-md-6">
                <!-- admin -->
                <label for="admin">Employee Name:</label>
                <input type="text" class="clear" id="admin" name="employee_name" placeholder="Enter Name" />
                <Br />
            </div>

            <div class="col-md-6">
                <!-- salaries -->
                <label for="salaries">Salaries:</label>
                <input type="text" class="clear" id="salaries" name="salaries" placeholder="1000" />
                <Br />
            </div>
        </div>
        

        <div class="col-md-6">
            <!-- addmission_date -->
            <label for="addmission_date"></label>
            <input type="hidden" id="addmission_date" name="date" value="<?= date('d/m/Y'); ?>" />
        </div>


        <Br />
        <Br />


        <!-- Submit -->
        <input type="submit" name="submit" value="Submit" />
        <p class="customSMS"></p>
    </form>
    
</div>
<!-- employee sarlaries -->

        
<!-- Student add form-->
<div class="student-form" id="student" style="display: none;">
    <a href="#" class="sideBar" onclick="Open();">☰</a>
    <h3> Student Registration Form </h3>
    <form class="form" action="../includes/addStudent.php" method="POST" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-6">
                <!-- full name -->
                <label for="full-name">Full Name:</label>
                <input type="text" class="input" id="full-name" name="full-name" placeholder="Ateeq ur Rahman" />
                <Br />
            </div>

            <div class="col-md-6">
                <!-- father-name -->
                <label for="father-name">Father Name:</label>
                <input type="text" class="input" id="father-name" name="father-name" placeholder="Zafar Iqbar" />
                <Br />
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <!-- cnic -->
                <label for="cnic">CNIC Number:</label>
                <input type="text" class="input" id="cnic" name="cnic" placeholder="16101-5897542-1" />
                <Br />
            </div>

            <div class="col-md-6">
                <!-- contact -->
                <label for="contact">Contact No:</label>
                <input type="phone" class="input" id="contact" name="contact" placeholder="03001234567" />
                <Br />
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
               <!-- occupation -->
                <label for="occupation">Occupation:</label>
                <select id="occupation" name="occupation">
                    <option selected value="student"> Student </option>
                    <option value="job Holder"> Job Holder </option>
                </select>
                <Br />
            </div>

            <div class="col-md-6">
                <!-- program -->
                <label for="program">Program:</label>
                <input type="text" class="input" id="program" name="program" placeholder="MBA/BS" />
                <Br />
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-6">
                <!-- college -->
                <label for="college">College/Institution:</label>
                <input type="text" class="input" id="college" name="college" placeholder="NUMAL University" />
                <Br />
            </div>

            <div class="col-md-6">
                <!-- semester -->
                <label for="semester">Semester/Year:</label>
                <input type="text" class="input" id="semester" name="semester" placeholder="4th Year/ 8th Semester" />
                <Br />
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <!-- room_no -->
                <label for="room_no">Room No ( 01, 02 , 03 ):</label>
                <input type="text" class="input" id="room_no" name="room_no" placeholder="01" />
                <Br />
            </div>

            <div class="col-md-6">
                <!-- address -->
                <label for="address">Address:</label>
                <input type="text" class="input" id="address" name="address" placeholder="Main Town Islamabad" />
                <Br />
            </div>
        </div>
        
        <div class="row">

            <div class="col-md-6">
                <!-- advance -->
                <label for="advance">Admission Fee:</label>
                <input type="text" class="input" id="advance" name="admission_fee" placeholder="1000" />
                <Br />
            </div>

            <div class="col-md-6">
                <!-- fee -->
                <label for="fee">Monthly Fee:</label>
                <input type="text" class="input" id="fee" name="fee" placeholder="7000" />
                <Br />
            </div>
            
        </div>
        
        <div class="row">

            <div class="col-md-6">
                <!-- advance -->
                <label for="advance">Advance Security:</label>
                <input type="text" class="input" id="advance" name="advance" placeholder="2000" />
                <Br />
            </div>
            
            <div class="col-md-6">
                <!-- guardian_contact -->
                <label for="guardian_contact">Guardian Contact No:</label>
                <input type="phone" class="input" id="guardian_contact" name="guardian_contact" placeholder="0300-1234567" />
                <Br />
            </div>

        </div>
 
        <div class="row">
            <div class="col-md-6">
                <!-- email -->
                <label for="email">Facebook Link:</label>
                <input type="text" class="input" id="email" name="email" value="www.facebook.com/" />
                <Br />
                <!-- addmission_date -->
                <label for="addmission_date"></label>
                <input type="hidden" class="input" id="addmission_date" name="addmission_date" value="<?php echo date('d/m/Y'); ?>" />
            </div>

            <div class="col-md-6">  
                <!-- Submit -->
                <Br />

                <input type="submit" name="submit" value="Submit Data" style="margin-top: 8px;"/>
                
    </form>
            </div>
        </div>

        <p class="customSMS" style="margin-top: -70px;"></p>

            <!-- Image Section -->
            
                <form action="../includes/image.php" method="POST" enctype="multipart/form-data">
                    <div class="file-upload">
                        <Br />
                        <h4 style="text-align: center" class="text-danger"> This is section only for Image: </h4>
                        <Br />
                        <div class="row">
                            <div class="col-md-6">
                                <!-- contact -->
                                <label for="contact">CNIC No:</label>
                                <input type="phone"  id="contact"  required name="cnic" placeholder="16101-5897542-1" />
                            </div>
                            <div class="col-md-6">
                              <label><strong> Student's Image:</strong></label>
                              <label for="upload" class="file-upload__label">Select Image</label>
                              <input type="file" name="file" id="upload" required class="file-upload__input" />
                              
                            </div>
                        </div>

                    <Br />

                    <input type="submit" name="img" value="Upload Image" />
                </form>
            </div>

        <Br />
        <Br />
    
</div>
<!-- Student add form Close-->







<!-- Month Calculation -->
<div class="student-form" id="calculation" style="display: none;">
    <a href="#" class="sideBar" onclick="Open();">☰</a>
    <h3> Generate Reports </h3>
    <p class="alert alert-warning"> <strong>Warning:</strong> Note: You can find all reports by entering the dates in the Input Fields e.g From:  01/01/2018 To: 20/01/2018.
     </p>
    <form class="form-inline" method="post" action="calculation.php">
        From:<input type="text" name="date_to" placeholder="01/07/2018" />
        To:<input type="text" name="date_from" placeholder="31/07/2018" />
        <button type="submit" id="pdf" name="submit" class="btn btn-primary"><i class="fa fa-pdf"aria-hidden="true"></i>
            Find Report</button>
    </form>

</div>
<!-- Month calculation colose -->








        
    </div>
<!-- /Max Width -->

    
    <!--Modal-->

     <div id="modal" class="cssb animated swing" style="display: none;">
        <p class="modal-p"> </p>
        <button class="1" onclick="location.reload();"> Refresh </button>
        <button class="" onclick="document.getElementById('modal').style.display='none'">No</button>
     </div>

    <!--Modal-->



<script>

function Open()
{

    document.getElementById('Nav').style.display = "block";

}

function Close()
{
     document.getElementById('Nav').style.display = "none";
}

</script>
    
    
<script>
function refresh()
{

    window.loaction = 'spa.php';

}
</script>
    

    
<script src="../public/js/myQuery.js"></script>


<script>
    
function openCity(cityName) {
    var i;
    var x = document.getElementsByClassName("student-form");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(cityName).style.display = "block";  
}
        
</script>


</body>
</html>