<!DOCTYPE html>
<html>
<Head>
    <title>  The best online Hostel Management System for owners    </title>
    <link rel="shortcut icon" type="image/png" href="../logo.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script  src="public/js/jquery.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/lib/typed.js"></script>
    <link rel="stylesheet" href="public/css/animate.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">


        <!-- =========================================
                POSHEI Sunday, 1 July 2018
        ========================================== -->


<style>

@font-face {
  font-family: Poppins-Regular;
  src: url('font-awesome/poppins/Poppins-Regular.ttf'); 
}

@font-face {
  font-family: Poppins-Bold;
  src: url('font-awesome/poppins/Poppins-Bold.ttf'); 
}

@font-face {
  font-family: Poppins-Medium;
  src: url('font-awesome/poppins/Poppins-Medium.ttf'); 
}

@font-face {
  font-family: Montserrat-Bold;
  src: url('font-awesome/montserrat/Montserrat-Bold.ttf'); 
}

body{
    font-family: Poppins-Regular, sans-serif;
}
.col-md-7
{
    margin: 0;
    padding: 0;
    height: 99.9vh;
    background: -webkit-linear-gradient(to left, rgba(0,0,0, 0.8) ,rgba(102,166,255,0.6)),
                url('public/images/hostel.jpg') no-repeat center;
    background: -ms-linear-gradient(to left, rgba(0,0,0, 0.8) ,rgba(102,166,255,0.6)),
                url('public/images/hostel.jpg') no-repeat center;;
    background: -moz-linear-gradient(to left, rgba(0,0,0, 0.8) ,rgba(102,166,255,0.6)),
                url('public/images/hostel.jpg') no-repeat center;;
    background: -o-linear-gradient(to left, rgba(0,0,0, 0.8) ,rgba(102,166,255,0.6)),
                url('public/images/hostel.jpg') no-repeat center;;
    background: linear-gradient(to left, rgba(0,0,0, 0.8) ,rgba(102,166,255,0.6)),
                url('public/images/hostel.jpg') no-repeat center;
                
    background-size: 2000px;
}

.login-form
    {
        background: #fff;
        height: 100%;
        text-align: center; 
        margin-top: 200px;
    }
.relative-1
{
    position: relative;
}
.relative-1 h1 {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 50px;
    text-align: center;
    color: #333;
    font-family: Poppins-Medium;
    font-weight: 900;

}
.rights {
  position: absolute;
    bottom: 0;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80%;
    text-align: center;
    color: #fafafa;
    font-family: Poppins-Medium;
    text-align: justify;
}
.rights a {
  color: #000;
  font-weight: 900;
}
.relative
{
    position: relative;
    width: 100%;
    z-index: 1;
    margin-bottom: 10px;
}
.absolute
{
    position: absolute;
    top: 14px;
    left: 27%;
    transition: .5s ease;
}

.login-form form input[type=text], input[type=password]
{
 
  position: relative;
  font-family: Poppins-Medium;
  font-size: 15px;
  line-height: 1.5;
  color: #666666;
  border: none;
  display: block;
  width: 290px;
  margin: auto;
  background: #e6e6e6;
  height: 50px;
  border-radius: 25px;
  padding: 0 30px 0 68px;

}
input[type=checkbox]
{
  
  position: absolute;
  width: 30px;
  float: left;
  text-align: center;
  margin-left: 0%;
  transform: translateX(-80px);
  height: 20px;
}
input[type=text]:focus  .absolute
{   
    left: 140px;
    color: #57b846;
}

input[type=submit]
{
    background: #57b846;
    text-align: center;
    transition: .5s ease;
    display: block;
    width: 290px;
    margin: auto;

  font-family: Montserrat-Bold;
  font-size: 15px;
  line-height: 1.5;
  color: #fff;
  text-transform: uppercase;

  border: none;
  height: 50px;
  border-radius: 25px;
  background: #57b846;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 25px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;


}
input[type=submit]:hover
{
    background: #46a;
    color: #fafafa;
}
.row {
        margin: 0;
        padding: 0;
    }

.header-login
{
  font-family: Poppins-Bold;
  text-align: center;
  font-size: 24px;
  margin: auto;
  display: block;
  width: 100%;
  color: #333333;
}

@media only screen and (max-width: 768px )
{
    .col-md-7 {
        display: none;
    }
}
@media only screen and (max-width: 1090px )
{
    .absolute {
        left: 20%;
    }
}
@media only screen and (max-width: 850px )
{
    .absolute {
        left: 15%;
    }
}
@media only screen and (max-width: 768px )
{
    .absolute {
        left: 35%;
    }
}
@media only screen and (max-width: 660px )
{
    .absolute {
        left: 30%;
    }
    .login-form
    {
      margin-top: 30%;
    }
}

@media only screen and (max-width: 500px )
{
    .absolute {
        left: 24%;
    }
}
@media only screen and (max-width: 470px )
{
    .absolute {
        left: 24%;
    }
}
@media only screen and (max-width: 410px )
{
    .absolute {
        left: 18%;
    }
}
@media only screen and (max-width: 334px )
{
    .absolute {
        left: 10%;
    }
}

</style>
</Head>
<body>


<div class="row">
    
    <div class="col-md-7 relative-1">
            

            <div id="typed-strings">
              <p>www.Hosteledu.com</p>
            </div>
           <h1><span id="typed"></span></h1>
           <div class="rights">
            <p> &copy; 2017 - <?php echo Date('Y'); ?> All development and content publishing rights belongs to <a href="https://hosteledu.com" target="_blank"> Hosteledu</a> Officially represented for Hostel owners to keep a keen eye on their business online and enjoy the analytics. Any violation of copyrights will be challenged in the court of law.</p>
           </div>

          

    </div>



<script>
  var typed = new Typed('#typed', {
    stringsElement: '#typed-strings',
    typeSpeed: 80,
    backSpeed: 50,
    loop: true
  });
</script>
<script src="public/js/lib/typed.js"></script>




    
    <div class="login-form col-md-5">    
        <h2 class="header-login"> Member Login</h2>
        <Br />
        <Br />
            <form id="login" class="form" action="includes/login.php" method="POST">
                
                <!--User Name-->
                <div class="relative">
                    <input type="text" name="email" placeholder="User Name / Id Card" id="name" />
                    <div class="absolute">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                </div>


                <!--Password-->
                <div class="relative">
                    <input type="password" name="password" placeholder="Password" id="pass" />

                    <div class="absolute">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                </div>

                <label><input style="" type="checkbox" name="remember" id="1" />Remember Me:</label> <Br /><Br />

                <div class="relative">
                  
                  <input type="submit" name="login" placeholder="Login"/>
                </div>
                
                <Br />             
                
                <p class="customSMS"></p>

            </form>

            <?php

            
            if( isset($_COOKIE['cookie_user']) AND isset($_COOKIE['cookie_pass']) )
            {
              $name = $_COOKIE['cookie_user'];
              $pass = $_COOKIE['cookie_pass'];
              echo "
              <script>
                document.getElementById('name').value = '$name';
                document.getElementById('pass').value = '$pass';
              </script>";
            }

            ?>
        
        </div>
    </div>
    
    


<script src="public/js/myQuery.js"></script>
    
</body>
</html>