 

<?php
session_start();
include_once 'dbconnect.php';

$result1 = mysqli_query($con, "SELECT * FROM users WHERE id =". $_SESSION['usr_id'] );

if ($row1 = mysqli_fetch_array($result1)) {
  
}
 



//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$fname = mysqli_real_escape_string($con, $_POST['fname']);
	$lname = mysqli_real_escape_string($con, $_POST['lname']);
	 
	
	$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	 $exper =  mysqli_real_escape_string($con, $_POST['exper']);
	 $desg  =  mysqli_real_escape_string($con, $_POST['desg']);
	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}
	if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
		$error = true;
		$lname_error = "Name must contain only alphabets and space";
	}
	
		 
	if(strlen($mobile) < 10) {
		$error = true;
		$password_error = "mobile must be minimum of 10 characters";
	}
	 
	if (!$error) {
		 
		
		if(mysqli_query($con, "UPDATE users set fname ='" . $fname . "', lname ='" . $lname . "',mobile ='" . $mobile . "',designation = '" . $desg . "',expertise ='" . $exper ."'  where id = " . $_SESSION['usr_id'] ))
			{
echo "<script>alert('Successfully Updated')</script> ";
 header('Location:judgeprofile.php');
			
		} else {
			$errormsg = "Error in Update...Please try again later!";
		}
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
<body style="font-size:">
    <div class="topnav row">

        <div class="col-md-2" style=" padding: 25px;">
                  <a href="judgehomepage.php"> <img src="images/marsahll logo.PNG"/></a>
            </div>
        <div class="col-md-8" align="center">
 
 <h1>  HIGH SCHOOL PROGRAMMING CONTEST</h1>

        </div>
        <div class="col-md-2" style="padding-top:20px;">
           
               <p>Welcome <?php echo $_SESSION['usr_name']; ?></p>
               <p><a href="judgeprofile.php"><span class="glyphicon glyphicon-log-in"></span> My profile</a></p>
                <p><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></p>
           
        </div>

    </div>
       
 
  <div class="row" style="background-color: #086435;border-color: #086435;">
      
         <div class="col-md-12">

              <div class="col-md-3" style="border-right:solid;border-color:white; ">
                  <h2 style="text-align: center;"><a href="Judgehomepage.php" style="color:white;font-size: 22px;">Home </a></h2>
              </div>
              <div class="col-md-2"  style="border-right:solid;border-color:white; ">
                  <h2 style="text-align: center;"><a href="assignedprojects.php" style="color:white;font-size: 22px;"> Assigned Projects </a></h2>
              </div>
              <div class="col-md-2"  style="border-right:solid;border-color:white; ">
                  <h2 style="text-align: center;"><a href="judgegrades.php" style="color:white;font-size: 22px;">Grades</a></h2>
              </div>
              <div class="col-md-2" style="border-right:solid;border-color:white; ">
                  <h2 style="text-align: center;"><a href="contactadmin.php" style="color:white;font-size: 22px;">Contact Admin</a></h2>
              </div>
			  <div class="col-md-3 "   style="border-right:solid;border-color:white; ">
			     
				<h2 style="text-align: center;"><a href="judgearchivedcontetst.php" style="color:white;font-size: 22px;">Archived Contest</a></h2>
					 
				  
				  
              </div>
			

          </div>
 
      </div>
    
	
  
   <div class="col-md-12" style="margin-top:40px;">
    <div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					 

					<div class="form-group">
						<label for="name">First Name</label>
						<input type="text" name="fname" value="<?php echo $row1['fname']; ?>"  placeholder="Enter First Name" required value="<?php if($error) echo $fname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Last Name</label>
						<input type="text" name="lname" value="<?php echo $row1['lname']; ?>"  placeholder="Enter Last Name" required value="<?php if($error) echo $lname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($lname_error)) echo $lname_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Designation</label>
						<input type="text" name="desg" value="<?php echo $row1['designation']; ?>"    placeholder="Enter Designation " required value="<?php if($error) echo $lname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($sname_error)) echo $sname_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Expertise</label>
						<input type="text" name="exper" value="<?php echo $row1['expertise']; ?>"    placeholder="Enter Expertise " required value="<?php if($error) echo $lname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($sname_error)) echo $sname_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" value="<?php echo $row1['email']; ?>" disabled="true"   placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Mobile</label>
						<input type="text" name="mobile" value="<?php echo $row1['mobile']; ?>"  placeholder="Mobile"   class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>


					 
					<div class="form-group">
						<input type="submit" name="signup" value="  Update" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	 
</div>
<
	
	</div>



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
   
   
</body>
</html>
