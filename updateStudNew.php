<?php 
include_once 'dbconnect.php';
require_once 'phpmailer/PHPMailerAutoload.php';

foreach($_POST['data'] as $each){
	//$each['id']
	
	//if(mysqli_query($con, "insert into assignedjudges (teamid,Judgeid) values (".$each['teamId'].",".$each['judgeId'].")")){
		//echo "<script>console.log('Updated Success!')</script>";
	//}
	// data.push({'id':$(this).find('#idTxt').val(),'':$(this).find('#stunameTxt').val(),'':$(this).find('#emailTxt').val(),'':$(this).find('#schoolTxt').val(),'':$(this).find('#gradeTxt').val()});
        
	//$team_id = $each['team'];
    $stu_name = $each['stuname'];
    $stu_email = $each['email'];
   // $stu_gender = $each['gender'];
    $stu_school = $each['school'];
	$stu_grade =  $each['grade'];
	$stu_id = $each['id'];
    $query = "UPDATE students SET stuname='$stu_name',school='$stu_school',grade='$stu_grade',email='$stu_email' WHERE id = $stu_id";
    //echo $query;
    $result = mysqli_query($con, $query);
    //$rowCount = mysqli_affected_rows($con);
    if($result)
    {
        header('Location:TeamManagement.php');
    }
    else
    {
        $msg = "<span style='color:red'>Some problem occurred, please try again.</span>";
    }
					
} 
 ?>