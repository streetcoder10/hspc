<?php 
include_once 'dbconnect.php';
require_once 'phpmailer/PHPMailerAutoload.php';

// if(mysqli_query($con, "delete from assignedjudges")){
		// echo "<script>console.log('deleted all records!');</script>";
	// }
foreach($_POST['data'] as $each){
	//$each['id']
	$query9 = "SELECT * FROM assignedjudges where judgeid=". $each['judgeId'] ." and teamid =" . $each['teamId'];
$result9 = mysqli_query($con, $query9);
$check = "false";
while($row = mysqli_fetch_assoc($result9))
{
	 $check = "true";
}

if($check == "false"){
	
	if(mysqli_query($con, "insert into assignedjudges (teamid,Judgeid) values (".$each['teamId'].",".$each['judgeId'].")")){
	 
		echo "<script>console.log('Updated Success!')</script>";
	}
 }
else { 
 
 }
	
					
} 
 ?>