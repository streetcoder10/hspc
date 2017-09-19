 

<?php
session_start();
include_once 'dbconnect.php';

$result = mysqli_query($con, "SELECT ID,ContestName, Description,DATE_FORMAT(REGDUEDATE,'%W, %d %M %Y') as RegDueDate,DATE_FORMAT(SubDueDate,'%W, %d %M %Y') as SubDueDate,MAXSTU,STATUS FROM CONTEST ORDER BY id DESC");

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
                <h2 style="text-align: center;"><a href="ManageTeachers.php" style="color:white;">MANAGE TEACHER </a></h2>
            </div>
            <div class="col-md-4" >
                <h2 style="text-align: center;"><a href="adminjudgehomepage.php" style="color:white;">MANAGE JUDGE</a></h2>
            </div>
            

        </div>
        </div>
	  
        <div class="col-md-12 col-xs-12 "   style="margin-top:15px;">
		            
 
		<?php
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT u.id,fname,lname,email,sname,teamname FROM users u inner join teams  t on t.teacherid = u.id WHERE roleid=2 ";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-border'>";
            echo "<tr>";
                 
                echo "<th>First Name</th>";
				 echo "<th>Last Name</th>";
                echo "<th>Email</th>";
                echo "<th>School Name</th>";
				 echo "<th>Team Name</th>";
				  
				echo "<th>Delete</th>";
            echo "</tr>";
			
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['sname'] . "</td>";
				echo "<td>" . $row['teamname'] . "</td>";
				 
				echo "<td><a href='deleteteachers.php?id=" . $row['id'] . "' onclick='return confirm_delete()' > Delete </a></td>";
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
   
              <button id="myBtn" class="btn btn-primary">Create New Invitation</button>
		  </div>
	  
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p> 
	
	<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Teacher Invite</legend>

					<div class="form-group">
						<label for="name">First Name</label>
						<input type="text" name="fname" placeholder="Enter First Name"   class="form-control" />
						 
					</div>
					
					<div class="form-group">
						<label for="name">Last Name</label>
						<input type="text" name="lname" placeholder="Enter Last Name" class="form-control" />
						 
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
	
	<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Instructions</h4>
      </div>
      <div class="modal-body">
        <p><ul>
		<li>Admin home page</li>
<li>To create a new contest, edit current contest information go to “MANAGE CONTEST” page</li>
<li>To send an invitation to a teacher, view registered teams go to “MANAGE TEACHERS” page</li>
<li>To send login credentials, view judge details go to “MANAGE JUDGE” page
</li>

</ul></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> 

               

  </div>
<?php
        // Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
              require_once 'phpmailer/PHPMailerAutoload.php';
              if(isset($_POST['signup']))
                  {
					  $sname="";
					  $password1= rand(1000,100000);
					  $fname =   $_POST['fname'] ;
	$lname =  $_POST['lname'];
	 
	$email =  $_POST['email'];
	
	 if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
					  if(mysqli_query($con , "INSERT INTO users(fname,lname,sname,email,password,roleid,status) VALUES('" . $fname . "','" . $lname . "','" . $sname . "', '" . $email . "', '" . md5($password1) . "',2,0)")) 
					  {
						  
							$email = 'hspcaj@gmail.com';                    
							$password = 'Abcd12345';
							$to_id = $_POST['email'];
							
							$message = 'Hello  ' . $fname .',<br/>  The Marshall University is conducting an online programming contest to enhance the student talent. We cordially invite you to be a part of the High School Programming Contest. The winning teams will be awarded at the Marshall university.  For participation, You must register your team using the provided username and password.We are looking forward to see you.<br/> <br/>  Login Id:  ' . $_POST['email'] . ' <br/>  Password : ' . $password1 .'<br/> <br/>  For further details please visit highschoolprograming@.com <br/><br/>Thanks and regards,<br/>High School Programming Contest<br/>Marshall university<br/>';
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
								
							   echo '<script>alert("Message sent!");</script>';
							   header("Location: manageteachers.php");
							   		
							}
					} else {
						 //echo '<script>alert("exit")</script>';
						echo '<script>alert("Error Sending Invite...Duplicate email! ");</script>';
						$errormsg = "Error in registering...Please try again later!";
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
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
        
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
