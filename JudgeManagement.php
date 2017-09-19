<?php
session_start();

 

include_once 'dbconnect.php';
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
  
    <link href="css/StyleSheet.css" rel="stylesheet" />
    <style>
    	.info_table tr input[readonly]{border:none !important;}
		.none{display:none !important;}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Marshall</title>
  
</head>
<body>
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
                <h2 style="text-align: center;"><a href="ManageTeachers.php" style="color:white;">MANAGE TEACHERS </a></h2>
            </div>
            <div class="col-md-4" >
                <h2 style="text-align: center;"><a href="adminjudgehomepage.php" style="color:white;">MANAGE JUDGE</a></h2>
            </div>
            

        </div>
        </div>
        <div class="col-md-12 col-xs-12">
            <div class="col-md-2">
                <div id="wrapper">
                    <!-- Sidebar -->
                    <div id="sidebar-wrapper" style="margin-top: 5px;">
                        <ul class="sidebar-nav">
                            <li class="sidebar-brand" style="border-bottom: solid white 1px;">
                                <a href="#" style="font-size: 35px;color: white;">
                                    QuickLaunch
                                </a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="judgemanagement.php" style="font-size: 16px;color:#fff;font-weight:bold;">JUDGE MANAGEMENT</a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="AssigningProjects.php" style="font-size: 16px;">ASSIGNING PROJECTS</a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="adminviewgrades.php" style="font-size: 16px;">VIEW GRADES</a>
                            </li>
                            <!--<li style="border-bottom: solid white 1px;">
                                <a href="#">Events</a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="#">About</a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="#">Services</a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="#">Contact</a>
                            </li>-->
                        </ul>
                    </div>
                   
                   
                </div>

        </div>

            <div class="col-md-10" style="margin-top:5px;overflow-y:scroll;padding:0px 20px;">

               <?php
			   
			   


        
			   
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM users  WHERE roleid=3 ";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-border info_table'>";
            echo "<tr>";
                 
                echo "<th>First Name</th>";
				echo "<th>Last Name</th>";
				echo "<th>Designation</th>";
				echo "<th>Expertise</th>";
                echo "<th>Email</th>";
		echo "<th>Mobile</th>";
                echo "<th>Edit</th>";
				echo "<th>Delete</th>";
            echo "</tr>";
			
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
				echo "<td>" . $row['designation'] . "</td>";
				echo "<td>" . $row['expertise'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['mobile'] . "</td>";
				//echo "<td><a href='editjudge.php?id=" . $row['id'] . "'   > Edit </a></td>";
				echo "<td><a class='edit'> Edit </a></td>";
				echo "<td><a href='deletejudge.php?id=" . $row['id'] . "' onclick='return confirm_delete()' > Delete </a></td>";
				
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
//mysqli_close($con);
?>
   
        <button id="myBtn" class="btn btn-primary">Add New Judge</button>

            </div>
			<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content col-md-8 col-xs-8" style="margin:0 auto;float:none;margin-top:15px;">
    <span class="close">&times;</span>
    <p> 
	
	<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="updateform">
				<fieldset>
					<legend>Judge Creation</legend>

					<div class="form-group">
						<label for="name">First Name</label>
						<input type="text" name="fname" placeholder="Enter First Name"   class="form-control" />
						 
					</div>
					
					<div class="form-group">
						<label for="name">Last Name</label>
						<input type="text" name="lname" placeholder="Enter Last Name" class="form-control" />
						 
					</div>
					 
					 <div class="form-group">
						<label for="name">Designation</label>
						<input type="text" name="desg" placeholder="Enter Designation" class="form-control" />
						 
					</div>
					
					<div class="form-group">
						<label for="name">Expertise</label>
						<input type="text" name="Exper" placeholder="Enter Expertise" class="form-control" />
						 
					</div>
					
					<div class="form-group">
						<label for="name">School</label>
						<input type="text" name="School" placeholder="Enter School" class="form-control" />
						 
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Email"  class="form-control" />
						 
					</div>
				</fieldset>
				<div class="form-group">
						<input type="submit" name="signup" value="Send Invite" class="btn btn-primary" style="margin-top: 20px;" />
					</div>
			</form>
						
	</p>
	
	
  </div>
  </div>
  
  
  
  <!-- NEw Code-->
 
 
 <div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content col-md-8 col-xs-8" style="margin:0 auto;float:none;margin-top:15px;">
    <span class="close">&times;</span>
    <p> 
	
	<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="updateform" id="updateform">
				<fieldset>
					<legend>Judge Update</legend>

					<div class="form-group">
						<label for="name">First Name</label>
						<input type="text" name="fname" placeholder="Enter First Name"   class="form-control" />
						 
					</div>
					
					<div class="form-group">
						<label for="name">Last Name</label>
						<input type="text" name="lname" placeholder="Enter Last Name" class="form-control" />
						 
					</div>
                    
                    <div class="form-group">
						<label for="name">Designation</label>
						<input type="text" name="designation" placeholder="Enter Designation" class="form-control" />
						 
					</div>
                    
                    <div class="form-group">
						<label for="name">Expertise</label>
						<input type="text" name="expertise" placeholder="Enter Expertise Eg C,C++" class="form-control" />
						 
					</div>
					 
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" readonly name="email" placeholder="Email"  class="form-control" />
						 
					</div>
                    
                    <div class="form-group">
						<label for="name">School Name</label>
						<input type="text" name="sname" placeholder="Enter School Name" class="form-control" />
						 
					</div>
				</fieldset>
				<div class="form-group">
						<input type="submit" name="update" value="Update" class="btn btn-primary" style="margin-top: 20px;" />
					</div>
			</form>
						
	</p>
	
	
  </div>
  </div>
 
        
        
<?php
// Check connection

        include_once 'dbconnect.php';
              require_once 'phpmailer/PHPMailerAutoload.php';
              if(isset($_POST['signup']))
                  {
					  //$sname=$_POST['sname'];
					  $password1= rand(1000,100000);
					  $fname =   $_POST['fname'] ;
					  $lname =  $_POST['lname'];
	 				  $temp_email =  $_POST['email'];
					  $email =  $_POST['email'];
					  $designation =  $_POST['desg'];
					  $School =  $_POST['School'];
					  $expertise =  $_POST['Exper'];
	if(mysqli_query($con, "INSERT INTO users(fname,lname,sname,email,password,roleid,status,designation,expertise) VALUES('" . $fname . "','" . $lname . "','" . $School ."', '" . $email . "', '" . md5($password1) . "',3,0,'". $designation ."','". $expertise ."')")) 
					  {
							$email = 'hspcaj@gmail.com';                    
							$password = 'Abcd12345';
							$to_id = $_POST['email'];
							
							$message = 'Hello  ' . $fname .',<br/>  We are privileged to inform you that you have been registered as judge to the Marshall high school programming contest. We are providing  the login credentials below.<br/><br/> Login Id : ' . $_POST['email'] . ' <br/>  Password : ' . $password1 . "<br/><br/> <br/> Thanks and Regards, <br/> High School Programming Contest<br/> Marshall University";
							$subject = 'Welcome New User';

							$mail = new PHPMailer;

							$mail->isSMTP();

							$mail->Host = 'smtp.gmail.com';

							$mail->Port = 587;

							$mail->SMTPSecure = 'tls';

							$mail->SMTPAuth = true;

							$mail->Username = $email;

							$mail->Password = $password;

							$mail->setFrom('hspcaj@gmail.com', $_SESSION['usr_name'] );

							$mail->addReplyTo('hspcaj@gmail.com', $_SESSION['usr_name']);

							$mail->addAddress($to_id);

							$mail->Subject = $subject;

							$mail->msgHTML($message);

							if (!$mail->send()) {
							   $error = "Mailer Error: " . $mail->ErrorInfo;
								?><script>alert('<?php echo $error ?>');</script><?php
							} 
							else {
								//header("Location: index.php");
							  // echo '<script>alert("Message sent!");</script>';
							   mysqli_query($con, "UPDATE users SET status=1 WHERE email='" . $temp_email . "'");
							   echo "<script>alert('Message sent!');location.href='judgemanagement.php';</script>";	
							}
					} else {
						echo '<script>alert("Error Sending Invite...Duplicate email! ");</script>';
						$errormsg = "Error in registering...Please try again later!";
					}
					  
					  
                   
               }
        ?>
        
        
        <?php
// Check connection

        include_once 'dbconnect.php';
              require_once 'phpmailer/PHPMailerAutoload.php';
              if(isset($_POST['update']))
                  {
					  $sname=$_POST['sname'];
					  $fname =   $_POST['fname'] ;
					  $lname =  $_POST['lname'];
					  $email =  $_POST['email'];
					  $designation =  $_POST['designation'];
	 				  $expertise =  $_POST['expertise'];
					  if(mysqli_query($con, "UPDATE users SET fname='".$fname."',lname='".$lname."',designation='".$designation."',expertise='".$expertise."',sname='".$sname."' WHERE email='".$email."'")){
						  echo "<script>alert('Updated Successfully!');location.href='judgemanagement.php';</script>";
						   
						  
						   
					  }
					
					  
				  }
                   
               
        ?>
 
    </div>

        <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
        </script>
		<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the modal
var modal2 = document.getElementById('myModal2');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
	modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
		modal2.style.display = "none";
    }
}







// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal2.style.display = "none";
    }
}


$('.edit').click(function(){
	//alert("sample");
	var ele = $(this).parent().parent();
	$('#updateform').find('input[name="fname"]').val($(ele).find('td').eq(0).text());
	$('#updateform').find('input[name="lname"]').val($(ele).find('td').eq(1).text());
	$('#updateform').find('input[name="designation"]').val($(ele).find('td').eq(2).text());
	$('#updateform').find('input[name="expertise"]').val($(ele).find('td').eq(3).text());
	$('#updateform').find('input[name="email"]').val($(ele).find('td').eq(4).text());
	$('#updateform').find('input[name="sname"]').val($(ele).find('td').eq(5).text());
	$('#myModal2').show();
});
$('.close').click(function(){
$('.modal').hide();
});

</script>
</body>

</html>
