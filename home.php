<?php
session_start();

 

include_once 'dbconnect.php';


//$email = mysqli_real_escape_string($con, $_POST['email']);
//	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "select *from contest ORDER BY SubDueDate DESC");

	if ($contest_row = mysqli_fetch_array($result)) {
	}
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
			header("Location: Teacherhomepage.php");
		}
		else if($_SESSION['role_id'] == 3)
		{
			header("Location: Judgehomepage.php");
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
<body  style="font-family:verdana;">
    <div class="topnav row">
        
        <div class="col-md-2" style=" padding: 25px;">
                  <a href="home.php"> <img src="images/marsahll logo.PNG"/></a>
            </div>
			 <div class="col-md-8" align="center">
 
           	<h2 style="padding-top: 25px;">HIGH SCHOOL PROGRAMMING CONTEST</h2>
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
              <div class="col-md-3" style="border-right:solid;border-color:white;">
                  <h2 style="text-align: center;"><a href="contestHistory.php?flag=2017" style="color:white;">Contest History</a></h2>
              </div>
              <!--div class="col-md-3"  style="border-right:solid;border-color:white;">
                  <h2 style="text-align: center;"><a href="#" style="color:white;"> Leaderboard </a></h2>
              </div-->
              <div class="col-md-3"  style="border-right:solid;border-color:white;">
                  <h2 style="text-align: center;"><a href="aboutus.php" style="color:white;">About us</a></h2>
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


    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            <div class="item active">

                <img src="images/00.JPG" style="width:100%;height:300px;" />
                
            </div>

            <div class="item">

                <img src="images/01.JPG" style="width:100%;height:300px;" />
               
            </div>

            <div class="item">

                <img src="images/03.PNG" style="width:100%;height:300px;" />
                
            </div>

            <div class="item">

                <img src="images/05.JPG" style="width:100%;height:300px;" />
               
            </div>

        </div>

       
    </div>
    <div class="container" style="background-color:rgba(214, 214, 214, 0.13);margin-top:10px;">


        <div class="row">
            <div class="col-md-8 col-xs-12">
                <h2 style="text-align:center;color:#383a39;">Welcome to the Contest!!!</h2>
                <hr />
                <div class="col-md-12">
                
 <p>
<b>Marshall University</b> is sponsoring the annual Computer Programming Contest for high school students. The contest is designed to encourage students to learn computer programming and to reward their excellent work! High school students in all grades are eligible to participate.
 
All high school students who would like to enter should have a sponsoring teacher from their respective high school or a private teacher for home schooling.<p>
<p>
 
Teacher can register with contact details for approval and registered teachers can complete student/team (max. 5 members) information as well as project details. The deadline for submitting the project is March 1, 2018.
 </p>
 <b>
Project Requirements</b>
 <ul>
 <li>Entries can be written in any programming language running on PC (Window or Linux).</li>
 <li>Entries must be accompanied by clear documentation of:</li>
   </ul>
   <ol>
   <li>The problem the program is intended to solve</li>
    
        
      <li>Instruction of program installation and deployment</li>
	  
 </ol>
 <b>
Judging Criteria</b>
<ul>
<li>Functionalities, design style and difficulties</li>
 <li> User interface and graphic interaction</li>
  <li> Completeness of documentation of system and platform requirement, 
  clear procedures to install submitted program and required software supplement and clear instruction of how to execute application</li>
  <li> Percentage of self-develop code vs. using "third party" functions</li>
 </ul>
 <b>
Cash Prizes</b>
<ol>
<li>1st Prize: $200</li>
   <li> 2nd Prize: $150</li>
   <li> 3rd Prize: $100</li>
    <li>Honorable Mention: $50</li>
 </ol>
<p>By submitting materials to this programming contest, all authors attest to the ownership of the submitted materials, 
and to providing Marshall University with an unlimited license to use the submitted materials for teaching, marketing of 
computing and computing programs, and other non-commercial use.</p>
 <p>
Please contact <a href="">contest@marshall.edu </a>for more information.</p>
 
 
                    
                </div>

            </div>
            <div class="col-md-4 col-xs-12">
                <h2 style="text-align:center;color:#383a39;">Announcements</h2>
                <hr />

                <div>
                	<h2>Ongoing Contest</h2>
                    <div>
                    	<h4>Contest Name</h4>  <span><?php echo $contest_row['ContestName']; ?></span>
                    </div>
                     <!--<div>
                    	<h4>Contest Description</h4>  <span><?php echo $contest_row['Description']; ?></span>
                    </div>-->
                     <div>
                    	<h4>Registration Due date</h4>  <span><?php echo $contest_row['RegDueDate']; ?></span>
                    </div>
                     <div>
                    	<h4>Project Submission date</h4>  <span><?php echo $contest_row['SubDueDate']; ?></span>
                    </div>
                     <div>
                    	<h4>Max team members</h4>  <span><?php echo $contest_row['MAxStu']; ?></span>
                    </div>
                </div>
                <hr />
                <h2 style="text-align:center;color:#383a39;">Calender</h2>
                <div class="col-md-4 col-xs-12">
                    <div class="row">
                        <div class="span12">
                            <table class="table-condensed table-bordered table-striped" style="width: 50%;margin:0 auto;">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <span class="btn-group">
                                                <a class="btn"><i class="icon-chevron-left"></i></a>
                                                <a class="btn btn-success">April 2017</a>
                                                <a class="btn"><i class="icon-chevron-right"></i></a>
                                            </span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Su</th>
                                        <th>Mo</th>
                                        <th>Tu</th>
                                        <th>We</th>
                                        <th>Th</th>
                                        <th>Fr</th>
                                        <th>Sa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="muted">29</td>
                                        <td class="muted">30</td>
                                        <td class="muted">31</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
                                        <td>10</td>
                                        <td>11</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>13</td>
                                        <td>14</td>
                                        <td>15</td>
                                        <td>16</td>
                                        <td>17</td>
                                        <td>18</td>
                                    </tr>
                                    <tr>
                                        <td>19</td>
                                        <td>20</td>
                                        <td>21</td>
                                        <td>22</td>
                                        <td>23</td>
                                        <td>24</td>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <td>26</td>
                                        <td>27</td>
                                        <td>28</td>
                                        <td>29</td>
                                        <td>30</td>
                                        <td>31</td>
                                        <td class="muted">2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
    <div class="row" style="background-color:#101010;margin-top: 40px;">
        <div class="copyright">
            <div class="">
                <div class="col-md-12" style="padding-top: 4px;color:white;">
                    <p style="text-align:center; ">© 2017 - All Rights with Marshall University</p>
                </div>
                
            </div>
        </div>
    </div>
   
   <script>
   // class="btn-success"
   var date=new Date().getDate();
   var months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
  $('.table-condensed').find('th a.btn-success').html(months[new Date().getMonth()]+", "+new Date().getFullYear());
   $('.table-condensed').find('td:contains("'+date+'")').each(function(){
		if($(this).text() == date)
   		$(this).addClass("btn-success"); 
	});
   
   </script>
</body>
</html>
