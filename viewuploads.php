﻿ 

<?php
session_start();
include_once 'dbconnect.php';

 $id = $_GET['id'];


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
                  <a href="#"> <img src="images/marsahll logo.PNG"/></a>
            </div>
        <div class="col-md-8" align="center">
 
 <h1>  HIGH SCHOOL PROGRAMMING CONTEST</h1>

        </div>
        <div class="col-md-2" style="padding-top:20px;">
           
               <p>Welcome <?php echo $_SESSION['usr_name']; ?></p>
               
           
        </div>

    </div>
       
 
 
  
  
   <div class="col-md-12" style="margin-top:40px;height:420px;" >
    	<h2>Uploaded Team Files</h2>
		 <?php
// Check connection
if($con === false){
    die("ERROR: Cou	ld not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = " SELECT teamname,filename,filepath FROM  projectdownload  INNER JOIN teams ON projectdownload.teamid = teams.id where teamid =". $id ;

if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-border'>";
            echo "<tr>";
                
                echo "<th>Team Name</th>";
				echo "<th>File Name</th>";
                echo "<th>Download Source Code</th>";
                
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
              
                echo "<td>" . $row['teamname'] . "</td>";
                echo "<td>  ". $row['filename'] ." </td>";
if($row['filename'] != null)    
{
			   echo "<td> <a href='download.php?filename=".$row['filepath'] ."' > <img height='30' width='30' src='images/532.png'/></a></td>";
			   }	
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
mysqli_close($con);
?>
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
