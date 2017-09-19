 

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
			header("Location: Teacherhomepage.php");
		}
		else if($_SESSION['role_id'] == 3)
		{
			header("Location: Judgehomepage.php");
		}
		
	} else {
		echo  "<script>alert('Incorrect Email or Password!!!')</script>";
	}
	
	
	
}



//$query3 = "select tl.teamid,tl.contestid,tl.submitted_date,tl.rating,tl.school,t.teamname from teamlist tl inner join teams t where tl.teamid = t.id AND  `submitted_date` BETWEEN '2017-01-01' AND '2017-12-31'  Order by rating DESC";
$query3 = "select ts.teamname,asj.teamid,AVG(tr.AVG) as avg from teams ts inner join  assignedjudges asj inner join teamratings tr inner join students st where ts.id = asj.teamid AND asj.teamid = tr.teamid  group by asj.teamid Order by avg DESC LIMIT 3";
$result3 = mysqli_query($con, $query3);
$teamslist = array();
while($row = mysqli_fetch_assoc($result3))
{
	$teamslist[] = $row;
}
$flag="0";
if($_GET["flag"] != null)
$flag = $_GET["flag"];
if($flag != "")
$result = mysqli_query($con, "select * from contest where RegDueDate <  '".$flag."-12-31' AND RegDueDate > '".$flag."-01-01' Order by SubDueDate DESC");
else{
	$flag = 2017;
$result = mysqli_query($con, "select * from contest order by SubDueDate DESC");
}

if ($row = mysqli_fetch_array($result)) {
  
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
    <style>
    .chooseyear,.chooseyear li{list-style-type:none;}
	.chooseyear li{    float: left;
    padding: 10px 20px;
    border-bottom: 1px solid #000;
    margin-left: 10px;cursor:pointer;}
	.chooseyear li.active{border-color: #06F;
    font-weight: bold;
    color: #06F;
}
    </style>
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
<body style="font-size:">
       <div class="topnav row">

        <div class="col-md-2" style=" padding: 25px;">
                  <a href="home.php"> <img src="images/marsahll logo.PNG"/></a>
            </div>
        <div class="col-md-8" align="center">
            
 
           	<h2 >HIGH SCHOOL PROGRAMMING CONTEST</h2>

        </div>
        <div class="col-md-2" style="padding-top:20px;">
           
              <ul class="nav navbar-nav" style="padding-top: 40px;">
                 <!--<li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
                <li><a href="#"  data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="#"  data-toggle="modal" data-target="#myModal2">Sign Up?</a></li>
            </ul>
           
        </div>

    </div>
       
  <div class="row" style="background-color: #086435;border-color: #086435;">
      
          <div class="col-md-12">

             <div class="col-md-3" style="border-right:solid;border-color:white;">
                  <h2 style="text-align: center;"><a href="home.php" style="color:white;">Home</a></h2>
              </div>
              <div class="col-md-3"  style="border-right:solid;border-color:white;">
                  <h2 style="text-align: center;"><a href="contestHistory.php?flag=2017" style="color:white;"> Contest History </a></h2>
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
  
    
	
  
   <div class="col-md-12" style="margin-top:40px;">
    
	  <div class="col-md-12">
      	<h4>Choose Year:</h4>
      	<ul class="chooseyear" style="display: inline-block; padding-left: 0;">
        	<li class="active 2017">2017</li>
            <li class="2016">2016</li>
            <li class="2015">2015</li>
            <li class="2014">2014</li>
            <li class="2013">2013</li>
            <li class="2012">2012</li>
        </ul>
      </div>
      <div class="col-md-12">
      	  <div class="col-md-12">
            <h4>Contest Name</h4>
            <span><?php echo $row['ContestName']; ?></span>
          </div>
          <div class="col-md-12">
            <h4>Contest Description</h4>
            <span><?php echo $row['Description']; ?></span>
          </div>
          <div class="col-md-12">
            <h4>Leaderboard</h4>
          </div>
          <div class="col-md-12">
           <table class="table">
           	<thead>
            	<tr>
                	<th>Rank</th>
                    <th>Team Name</th>
                    <th>Team Members</th>
                    <th>School</th>
                </tr>
            </thead>
            <tbody>
            	<?php
                if( ! empty($teamslist) ) {
					$index = 0;
                    foreach($teamslist as $each){
						$index++;
				?>
	
				<tr>
                	<td><?= $index ?></td>
                    <td><?= $each["teamname"] ?></td>
                    <td>
                    	<?php
                        	$query4 = "select stuname from students where teamid=".$each["teamid"];
							$result4 = mysqli_query($con, $query4);
							$teamslist = array();
							$temp = 0;
							while($row = mysqli_fetch_assoc($result4))
							{
								if($temp == 0)
									echo $row["stuname"];
								else
									echo ", ".$row["stuname"];
								$temp++;
							}
						?>
                    </td>
                    <td>
                    	<?php
                        	$query4 = "select school from students where teamid=".$each["teamid"];
							$result4 = mysqli_query($con, $query4);
							$teamslist = array();
							if($row = mysqli_fetch_assoc($result4))
							{
								echo $row["school"];
								
							}
						?>
                    </td>
                </tr>
			<?php } } ?>
            	
                <!--tr>
                	<td>2</td>
                    <td>Team Name</td>
                    <td>Team Members</td>
                    <td>School</td>
                </tr>
                <tr>
                	<td>3</td>
                    <td>Team Name</td>
                    <td>Team Members</td>
                    <td>School</td>
                </tr-->
            </tbody>
           </table>
          </div>
      </div>
	</div>

	<!--<div class="col-md-12 col-xs-12">
    	<button id="myBtn" class="btn btn-primary">Post Leaderboard</button>
    </div>-->
   <div class="col-md-12 col-xs-12">
    <div class="row" style="background-color:#101010;margin-top: 40px;">
        <div class="copyright">
            <div class="container">
                <div class="col-md-12" style="padding-top: 4px;color:white;">
                    <p style="text-align:center; ">© 2017 - All Rights with Marshall University</p>
                </div>
                
            </div>
        </div>
    </div>
	</div>
   
   <script>
   	$('.chooseyear li').click(function(){
	$(this).addClass('active').siblings().removeClass('active');
	var year = $(this).html();
	location.href= "contestHistory.php?flag="+year;
	});
	if(<?=$flag?> == "0"){
		$('.chooseyear li.2017').click();
		}
	$('.chooseyear li.<?=$flag?>').addClass("active").siblings().removeClass("active");
   </script>
</body>
</html>
