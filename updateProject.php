<?php
session_start();
include_once 'dbconnect.php';
?>
<?php

$query = "SELECT * FROM teams where teacherid = " . $_SESSION['usr_id'] ;
$result = mysqli_query($con, $query);
$teams = array();
while($row = mysqli_fetch_assoc($result))
{
	$teams[] = $row;
}

if(isset($_POST['btn-upload']))
{
	$pic = rand(1000,100000)."-".$_FILES['pic']['name'];
    $pic_loc = $_FILES['pic']['tmp_name'];
	$folder="files/";
	$id=  $_GET['id'];
	if(move_uploaded_file($pic_loc,$folder.$pic))
	{ 
           

		 
			
		if(mysqli_query($con, "INSERT INTO projectdownload(teamid,Filename,Filepath) VALUES('" . $id  . "','" . $pic . "','files/" . $pic . "')")) {
			$successmsg = "Successfully Uploaded ";
			echo "<script>alert('Successfully Uploaded file');</script>";
			 
		} else {
			$errormsg = "Error while Uploading...Please try again later!";
		}
		
		 
	}
	else
	{
		?><script>alert('error while uploading file');</script><?php
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
                  <a href="home.php"> <img src="images/marsahll logo.PNG"/></a>
            </div>
        <div class="col-md-8" align="center">
            <h1> MARSHALL UNIVERSITY</h1>
 <h1>  HIGH SCHOOL PROGRAMMING CONTEST</h1>

        </div>
        <div class="col-md-2" style="padding-top:20px;">
           
               <p>Welcome <?php echo $_SESSION['usr_name']; ?></p>
               <p><a href="#"><span class="glyphicon glyphicon-log-in"></span> My profile</a></p>
                <p><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></p>
           
        </div>

    </div>

    <div class="row" style="background-color: #086435;border-color: #086435;">

        <div class="col-md-12">

            <div class="col-md-4" style="border-right:solid;border-color:white;">
                <h2 style="text-align: center;"><a href="Teacherhomepage.php" style="color:white;">HOME</a></h2>
            </div>
            <div class="col-md-4" style="border-right:solid;border-color:white;">
                <h2 style="text-align: center;"><a href="TeamManagement.php" style="color:white;">TEAM MANAGEMENT </a></h2>
            </div>
            <div class="col-md-4" >
                <h2 style="text-align: center;"><a href="archivedcontest.php" style="color:white;">ARCHIVED CONTEST</a></h2>
            </div>
            

        </div>
        </div>
		<div class="col-md-12">
		<div class="btn btn-success btn-lg col-md-1"  style="margin-top:15px">
		<a href="TeamManagement.php" style="color:white;">Back </a>
		</div>
		
		<div class="col-md-2  col-md-offset-8" style="margin-top:15px";> 
		<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Instructions</button>
		
		</div>
		</div>
		
		
		<div >
		</div>
		
		 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Instructions</h4>
      </div>
      <div class="modal-body">
        <p><ul>
		<li> This page  provides a link to

upload files.For uploading file click, the upload button </li>
 </ul></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        <div class="col-md-12 col-xs-12 ">
            

            <div class="col-md-10 col-xs-12">

<form action="" method="post" enctype="multipart/form-data">
<div class="col-md-offset-2 col-md-9    ">
<h2 style="text-align:center;">Upload Project</h2>
<hr/>

 

<div class="col-md-6 col-md-offset-3">

<input type="file" class="form-control" name="pic" />
<br/>

<button type="submit" class="btn btn-primary"  style=" background-color: #086435;" name="btn-upload">Submit</button>
</form>
</div>
		
                
                   		 
		 
               

            
    </div>

        <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
        </script>
</body>

</html>
