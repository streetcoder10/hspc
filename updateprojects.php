<?php
session_start();

include_once 'dbconnect.php';
//set validation error flag as false
$error = false;

//check if form is submitted
 
	
	$judgeid =   $_POST['judgeId'];
$teamid =   $_POST['teamId'];
    
        
		 
		if(mysqli_query($con, "INSERT INTO assignedjudges(teamid,judgeid) VALUES(" .$teamid . " ," . $judgeid .")") ){
             
		}
	



?>

