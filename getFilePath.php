<?php 
include_once 'dbconnect.php';
require_once 'phpmailer/PHPMailerAutoload.php';

$query = "select Filepath from projectdownload where teamid = ".$_POST['data'];
$result = mysqli_query($con, $query);
$teams = array();
if($row = mysqli_fetch_assoc($result))
{
	//$teams[] = $row;
	echo $row['Filepath'];
}else{
	echo "NotFound";
}
	
 ?>-