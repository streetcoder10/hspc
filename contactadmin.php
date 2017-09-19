 

<?php
session_start();
include_once 'dbconnect.php';
 

?>

<?php
        
		
		
		$result = mysqli_query($con, "SELECT * FROM users ");

	if ($row = mysqli_fetch_array($result)) {
		$toemail = $row['id'];
		$toname = $row['fname'] ." " . $row['lname'];
		 
	}
              require_once 'phpmailer/PHPMailerAutoload.php';
              if(isset($_POST['send']))
                  {
                    $email = 'hspcaj@gmail.com';                    
                    $password = 'Abcd12345';
                    
                    $message = $_POST['message'];
                    $subject = $_POST['subject'];

                    $mail = new PHPMailer;

                    $mail->isSMTP();

                    $mail->Host = 'smtp.gmail.com';

                    $mail->Port = 587;

                    $mail->SMTPSecure = 'tls';

                    $mail->SMTPAuth = true;

                    $mail->Username = $email;

                    $mail->Password = $password;

                    $mail->setFrom($toemail, $_SESSION['usr_name'] );

                    $mail->addReplyTo($toemail, $_SESSION['usr_name'] );

                    $mail->addAddress('hspcaj@gmail.com');

                    $mail->Subject = $subject;

                    $mail->msgHTML($message ." <br/> Regards, <br/>  " .  $_SESSION['usr_name']);

                    if (!$mail->send()) {
                       $error = "Mailer Error: " . $mail->ErrorInfo;
                        ?><script>alert('<?php echo $error ?>');</script><?php
                    } 
                    else {
                       echo '<script>alert("Message sent!");</script>';
                    }
               }
        ?>
<style>

.red{
    color:red;
    }
.form-area
{
   
	padding: 10px 40px 60px;
	margin: 10px 0px 60px;
	border: 1px solid GREY;
	}
</style>
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
                  <a href="home.php"> <img src="images/marsahll logo.PNG"/></a>
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
<div class="col-md-offset-3 col-md-6">
    <div class="form-area">  
        <form action="contactadmin.php" method="post">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Send Email</h3>
    				<div class="form-group">
						<input type="text" class="form-control" placeholder="Subject : " name="subject" required> 
						<input type="hidden" placeholder="To : Email Id " value="hspcaj@gmail.com"   name="toid"/>  
					</div>
					
                    <div class="form-group">
                    <textarea rows="4" cols="50" placeholder="Enter Your Message..." name="message"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">Thank You</p></span>                    
                    </div>
            
      <input type="submit" value="Send" name="send"  class="btn btn-primary" />
        </form>
    </div>
</div>
</div>

        </div>
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
