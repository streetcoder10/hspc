﻿<?php
session_start();

 

include_once 'dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['fname'] ." " . $row['lname'];
		$_SESSION['role_id'] = $row['roleid'];
		
		
		if($_SESSION['role_id'] == 1){
		
		header("Location: adminhomepage.php");
		}
		else if($_SESSION['role_id'] == 2)
		{
			header("Location: teacherhomepage.php");
		}
		else if($_SESSION['role_id'] == 3)
		{
			header("Location: judgehomepage.php");
		}
		
	} else {
		$errormsg = "Incorrect Email or Password!!!";
	}
	
	
	
}

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/StyleSheet.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Marshall</title>
	<style>
          
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
.imbig { font-size: 20px;}
p { font-size: 20px;}
</style>
</head>
<body style="font-family:verdana;">
    <div class="topnav row">
        
       <div class="col-md-2" style=" padding: 25px;">
           <a href="home.php"> <img src="images/marsahll logo.PNG"/> </a>
            </div>
			 <div class="col-md-8" align="center">
			  
           	<h2 style="padding-top:25px;">HIGH SCHOOL PROGRAMMING CONTEST</h2>
            </div>
        <div class="col-md-2">
            <ul class="nav navbar-nav" style="padding-top: 40px;">
                 <!--<li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
                <li><a href="#"  data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="#"  data-toggle="modal" data-target="#myModal2">Sign Up?</a></li>
            </ul>
            </div>
            
        </div>
       
    <!--<nav class="navbar" style="background-color: #086435;border-color: #086435;margin-top: -1px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar" style="background-color:white;"></span>
                    <span class="icon-bar" style="background-color:white;"></span>
                    <span class="icon-bar" style="background-color:white;"></span>
                </button>
               
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#" style="color:white;">Contest</a></li>
                    <li>
                        <a style="color:white;" href="#">Leaderboard</a></li>
                    <li><a href="#" style="color:white;">About us</a></li>
                    <li><a href="#" style="color:white;">Contact</a></li>
                </ul>
               
            </div>
        </div>
    </nav>-->
  <div class="row" style="background-color: #086435;border-color: #086435;">
      
          <div class="col-md-12">

              <div class="col-md-3" style="border-right:solid;border-color:white;">
                  <h2 style="text-align: center;"><a href="home.php" style="color:white;">Home</a></h2>
              </div>
              <div class="col-md-3"  style="border-right:solid;border-color:white;">
                  <h2 style="text-align: center;"><a href="contestHistory.php" style="color:white;"> Contest History </a></h2>
              </div>
              <div class="col-md-3"  style="border-right:solid;border-color:white;">
                  <h2 style="text-align: center;"><a href="AboutUs.php" style="color:white;">About us</a></h2>
              </div>
              <div class="col-md-3">
                  <h2 style="text-align: center;"><a href="ContactUs.php" style="color:white;">Contact Us</a></h2>
              </div>

          </div>
      </div>
    <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">  Login</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
        <fieldset>
 
          
          <div class="form-group">
            <label for="name" style="color:#fff;">Email</label>
            <input type="text" name="email" placeholder="Your Email" required class="form-control" />
          </div>

          <div class="form-group">
            <label for="name" style="color:#fff;">Password</label>
            <input type="password" name="password"  placeholder="Your Password" required class="form-control" />
          </div>

          <div class="form-group">
            <input type="submit"  style="width:100%;" name="login" value="Login" class="btn btn-success" />
          </div>
          <!--<div class="form-group">
                        <p>If you want to sign up for the contest, Visit <a href="ContactUs.php">Contact Us</a>page and ask for sign up procedure</p>
                    </div>-->
           
        </fieldset>
        
      </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
  
     <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Want to Sign Up for the Contest?</h4>
                </div>
                <div class="modal-body">
                   <p>Send an e-mail to <b>Meaghan Buckland</b> at "bucklandm@marshall.edu" and request for a sign up procedure</p><br>
                   <p>Include your Contact Name and Number with your High School Information</p> 
                </div>
               <!-- <div class="modal-header">
                    <h4 class="modal-title">For Students</h4>
                </div>-->
                <!--<div class="modal-body">
                    <p>If you are a student and would like to participate in the contest , from a team with your friends/classmates. Also ask your teacher to <a href="ContactUs.php">Contact Us</a> about registration Process.</p>
                </div>-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
  
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sign Up</h4>
                </div>
                <div class="modal-body">
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <div class="container"  >


        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h2 style="text-align:center;color:#383a39;">ABOUT MARSHALL </h2>
                <hr />
                <div class="col-md-12">
                <p>About us:</p>
<p>We, at Computer Science department in Marshall University, want to provide a platform for the students to showcase their computer programming skills and reward them. The aim of this website is to encourage the High school students to actively participate in computer programming. This will help the students to choose their career path after their High school.</p>
<p>All the contests are designed as team projects. Students get a chance to work in teams. This will help to improve their leadership skills, cooperation and teamwork skills, appreciation of different abilities and build trust. This will help the students to identify their strengths and weaknesses.</p>
</p><br>
<h3 align="center"><b>Weisberg Division of Computer Science</b></h3><br>
<p>The Computer Science Program at Marshall university prepares students for careers in computer science through learning based on practice and grounded in theory. Students learn how to analyze, design, build, test, and deploy computer-based systems by making technical trade-offs between performance, scalability, availability, reliability, security, maintainability, cost and societal impact. Marshall’s computing facilities are state-of-the-art and readily available to students.</p><br>
<h4><b><span>Division Chair:</span></b> Dr. Wook-Sung Yoo</h4>
<h4><b><span>Email:</span></b> yoow@marshall.edu</h4>

<p>Visit the following link to know more about Degree Programs:</p>
<a href="http://www.marshall.edu/cite/home/academic/all-programs/">Click me!</a>
                    
                </div>

            </div>
             
        </div>
    </div>
    <div class="row" style="background-color:#101010; margin-top: 40px;"">
        <div class="copyright">
            <div class="container">
                <div class="col-md-12" style="padding-top: 4px;color:white;">
                    <p style="text-align:center; ">© 2017 - All Rights with Marshall University</p>
                </div>
                
            </div>
        </div>
    </div>
   
   
</body>
</html>
