 

<?php
session_start();
include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$cname = mysqli_real_escape_string($con, $_POST['cname']);
	$desc = mysqli_real_escape_string($con, $_POST['desc']);
	$RegDate = mysqli_real_escape_string($con, $_POST['RegDate']);
	$SubDate = mysqli_real_escape_string($con, $_POST['SubDate']);
	$maxStud = mysqli_real_escape_string($con, $_POST['maxStud']);
	 
	
	//name can contain only alpha characters and space
	   
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO Contest(ContestName,Description,RegDueDate,SubDueDate,MAxStu) VALUES('" . $cname . "','" . $desc . "','" . $RegDate . "', '" . $SubDate . "', '" . $maxStud . "')")) {
			$successmsg = "Successfully Created Contest! ";
			 header('Location: Managecontest.php');
			
		} else {
			$errormsg = "Error in registering...Please try again later!";
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
  
</head>
<body  style="font-family:verdana;">
    <div class="topnav row">

       <div class="col-md-2" style=" padding: 25px;">
                  <a href="adminhomepage.php"> <img src="images/marsahll logo.PNG"/></a>
            </div>
        <div class="col-md-8" align="center">
 
 <h1>  HIGH SCHOOL PROGRAMMING CONTEST</h1>

        </div>
        <div class="col-md-2" style="padding-top:20px;">
           
               <p>Welcome <?php echo $_SESSION['usr_name']; ?></p>
               
                <p><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></p>
           
        </div>

    </div>

    <div class="row" style="background-color: #086435;border-color: #086435;">

        <div class="col-md-12">

            <div class="col-md-4" style="border-right:solid;border-color:white;">
                <h2 style="text-align: center;"><a href="managecontest.php" style="color:white;">MANAGE CONTEST</a></h2>
            </div>
            <div class="col-md-4" style="border-right:solid;border-color:white;">
                <h2 style="text-align: center;"><a href="TeamManagement.php" style="color:white;">MANAGE TEACHER </a></h2>
            </div>
            <div class="col-md-4" >
                <h2 style="text-align: center;"><a href="adminjudgehomepage.php" style="color:white;">MANAGE JUDGE</a></h2>
            </div>
            

        </div>
        </div>
	  
        <div class="col-md-12 col-xs-12 "   style="margin-top:15px;">
             
		  <div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				
					 
					<div class="form-group">
						<label for="name">Contest Name</label>
						<input type="text" name="cname" placeholder="Enter Contest Name" required value="<?php if($error) echo $cname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($cname_error)) echo $cname_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Description</label>
						<textarea  name="desc" placeholder="Enter Last Name" required value="<?php if($error) echo $desc; ?>" class="form-control" ></textarea>
					 
					</div>
					
					<div class="form-group">
						<label for="name">Team Registration Due Date</label>
						<input type="date" name="RegDate"  required value="<?php if($error) echo $lname; ?>" class="form-control" />
						 
					</div>
					
					<div class="form-group">
						<label for="name">Project Submission Due Date</label>
						<input type="date" name="SubDate"   required value="<?php if($error) echo $email; ?>" class="form-control" />
						  
					</div>

					<div class="form-group">
						<label for="name">Max Students in a Team</label>
						<input type="text" name="maxStud" placeholder="Enter Number" required class="form-control" />
						 
					</div>

 
					<div class="form-group">
						<input type="submit" name="signup" value="Create" class="btn btn-primary" />
					</div>
				
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>

	  
    </div>

        
		<script type="text/javascript">
    function confirm_delete()
    {
        if(confirm('Do you want to delete?'))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
        </script>
</body>

</html>
