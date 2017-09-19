<?php
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
  </style>
</head>
<body style="font-family:verdana;">
    <div class="topnav row">
        
        <div class="col-md-2" style=" padding: 25px;">
           <a href="home.php"> <img src="images/marsahll logo.PNG"/></a>
            </div>
			 <div class="col-md-8" align="center">
            
		    <h2 >HIGH SCHOOL PROGRAMMING CONTEST</h2>
            </div>
        <div class="col-md-2">
            <ul class="nav navbar-nav" style="padding-top: 40px;">
                 <!--<li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
                <li><a href="#"  data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
                  <h2 style="text-align: center;"><a href="#" style="color:white;">Contest</a></h2>
              </div>
              <div class="col-md-3"  style="border-right:solid;border-color:white;">
                  <h2 style="text-align: center;"><a href="#" style="color:white;"> Leaderboard </a></h2>
              </div>
              <div class="col-md-3"  style="border-right:solid;border-color:white;">
                  <h2 style="text-align: center;"><a href="#" style="color:white;">About us</a></h2>
              </div>
              <div class="col-md-3">
                  <h2 style="text-align: center;"><a href="#" style="color:white;">Contact</a></h2>
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
						<input type="submit"  style="width:100%;" name="login" value="Login" class="btn btn-primary" />
					</div>
					
					 
				</fieldset>
				
			</form>
                </div>
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
                   
<p>One of West Virginia’s first public institutions of higher education, Marshall University was founded as Marshall Academy in 1837 and named after Chief Justice of the Supreme Court John Marshall (1755-1835). </p>

<p>The institution became Marshall College in 1858 and attained university status in 1961.</p>


<p>At Marshall University, we change lives and inspire extraordinary futures. </p>

<p>Our students attach high value to our small class sizes, having faculty members actively instructing in the classroom, the availability of intensive advising, exceptional student success resources, modern facilities, a growing global community and robust extracurricular programming. </p>

<p>Our faculty members are leaders, mentors and cultivators of talent. They are making a real difference in the lives of our students, many of whom arrive here with enormous potential but lack a reliable roadmap for academic accomplishment. </p>

<p>Our alumni are the heart and soul of the Marshall family. They have gone on to lead Fortune 500 companies, win Pulitzer Prizes and become captains of industry, science, education and the arts.</p>

<p>Here, you'll discover a commitment to teaching, high-level research and professional training that prepare you to thrive in the world. You'll join a community where you're part of something larger than your own ambitions. You'll find a sense of belonging and nurturance that will help you achieve your full potential. You'll discover what it means to be one of the Sons and Daughters of Marshall</p>

<p>Weisberg Division of Computer Science
The Computer Science Program at Marshall university prepares students for careers in computer science through learning based on practice and grounded in theory. Students learn how to analyze, design, build, test, and deploy computer-based systems by making technical trade-offs between performance, scalability, availability, reliability, security, maintainability, cost and societal impact. Marshall’s computing facilities are state-of-the-art and readily available to students.
Division Chair: Dr. Wook-Sung Yoo
Email: yoow@marshall.edu
Chair’s Welcome Message to Computer Science Program
Visit the following link to know more about Degree Programs:

	http://www.marshall.edu/cite/home/academic/all-programs/
</p>
                    
                </div>

            </div>
             
        </div>
    </div>
    <div class="row" style="background-color:#101010;margin-top: 40px;">
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
