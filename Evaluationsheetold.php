<?php
session_start();

 



 

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup']))
{
	$assignedid = mysqli_real_escape_string($con, $_POST['ajudgeid']);

    for($i=1;$i<=10;$i++)
    {
        $key = 'evaluate'.$i;
        $rating = $_POST[$key];
        $evaluationid = $i;
		if(mysqli_query($con, "INSERT INTO grades(assignedjudgeid,evaluationid,rating) VALUES('$assignedid','$evaluationid','$rating')")) {
            if($i==10)
		        $msg = "<span style='color:green'>Successfully done!</span>";
		} else {
			$msg = "<span style='color:red'>Some Problem occurred...Please try again later!</span>";
		}
	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Home | Marshall University</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
		<style type="text/css">
  #footer {
     position:absolute;
    bottom : 0;
    height : 40px;
    margin-top : 40px;
	width:100%;
	text-align: center;
    padding-top: 10px;
  }
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script type="text/javascript">
    var lastSelected;
    $(function () {
        //if you have any radio selected by default
        lastSelected = $('[name="evaluate1"]:checked').val();
		 
		
    });
    $(document).on('click', '[name="evaluate1"]', function () {
 
		 $("label[id='value1']").html($(this).val());
        lastSelected = $(this).val();
		 $("label[id='Total']").html($(this).val());
		 
    });
	
	$(document).on('click', '[name="evaluate2"]', function () {
 
		 $("label[id='value2']").html($(this).val());
        lastSelected = $(this).val();
		var total = 0;
		
		 
    });
	$(document).on('click', '[name="evaluate3"]', function () {
 
		 $("label[id='value3']").html($(this).val());
        lastSelected = $(this).val();
    });
	$(document).on('click', '[name="evaluate4"]', function () {
 
		 $("label[id='value4']").html($(this).val());
        lastSelected = $(this).val();
    });
	$(document).on('click', '[name="evaluate5"]', function () {
 
		 $("label[id='value5']").html($(this).val());
        lastSelected = $(this).val();
    });
	$(document).on('click', '[name="evaluate6"]', function () {
 
		 $("label[id='value6']").html($(this).val());
        lastSelected = $(this).val();
    });
	$(document).on('click', '[name="evaluate7"]', function () {
 
		 $("label[id='value7']").html($(this).val());
        lastSelected = $(this).val();
    });
	$(document).on('click', '[name="evaluate8"]', function () {
 
		 $("label[id='value8']").html($(this).val());
        lastSelected = $(this).val();
    });
	$(document).on('click', '[name="evaluate9"]', function () {
 
		 $("label[id='value9']").html($(this).val());
        lastSelected = $(this).val();
    });
	$(document).on('click', '[name="evaluate10"]', function () {
 
		 $("label[id='value10']").html($(this).val());
        lastSelected = $(this).val();
    });
</script>
</head>
<body  style="font-family:verdana;">

 
<?php if(isset($msg) && $msg != '') {
echo '<div class="">'.$msg.'</div>';
 } ?>
<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
	<input type="hidden" name="ajudgeid" value="<?=$_GET['id']?>" />
<div>
<table width="100%">
 
<tr> <td colspan="3"  align="center"><br/></td></tr>
<tr> <td colspan="3"  align="center"><br/></td></tr>
<tr><td width="10%"></td><td width="80%" align="center">
<?php
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM evaluationform";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table'>";
            echo "<tr>";
                 
                echo "<th></th>";
                echo "<th>Poor</th>";
                echo "<th>Adequate</th>";
				echo "<th>Fair</th>";
				echo "<th>Good</th>";
				echo "<th>Excellent</th>";
				echo "<th>Totals</th>";
				
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                
                echo "<td>" . $row['attribute'] . "</td>";
				echo "<td> <input type='radio' name='evaluate". $row['id'] . "' id='poor". $row['id'] . "'  value=1></input> </td>";
				echo "<td> <input type='radio' name='evaluate". $row['id'] . "' id='Adequate". $row['id'] . "' value=2></input> </td>";
				 echo "<td> <input type='radio' name='evaluate". $row['id'] . "' id='Fair". $row['id'] . "' value=3></input> </td>";
				 echo "<td> <input type='radio' name='evaluate". $row['id'] . "' id='Good". $row['id'] . "' value=4></input> </td>";
				 echo "<td> <input type='radio' name='evaluate". $row['id'] . "' id='Excellent". $row['id'] . "' value=5></input> </td>";
				  echo "<td> <label id='value". $row['id'] . "' >0 </label>   </td>";
								
            echo "</tr>";
        }
		echo "<tr>";
		echo "<td colspan='6'>Total</td><td> <label id='Total' >0 </label> </td>  ";
		echo "</tr>";

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
</td><td width="10%"></td></tr></table>
</div>
<div  >
						<input type="submit" name="signup" value="Submit" class="btn btn-primary" />
					</div>
				 
			</form>
  
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

