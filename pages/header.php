<?php

    date_default_timezone_set('Asia/Karachi');
    require_once '../Core/init.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title> Hostel Edu || hosteledu.com </title>
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
        <div class="menu">
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