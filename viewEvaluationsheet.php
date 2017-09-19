<?php
session_start();

 

include_once 'dbconnect.php';
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
$value= $_GET['id']; 
 
// Attempt select query execution
$sql = "SELECT attribute,rating FROM grades g INNER JOIN evaluationform e ON g.evaluationid= e.id WHERE assignedjudgeid=" . $value;
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table'>";
            echo "<tr>";
                 
                echo "<th></th>";
                echo "<th>Rating</th>";
                
				
            echo "</tr>";
			$count=0;
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                
                echo "<td>" . $row['attribute'] . "</td>";
				 echo "<td>" . $row['rating'] . "</td>";
				 		$count = $count + 	$row['rating'];	
            echo "</tr>";
        }
		echo "<tr>";


		echo "<td >Total</td><td> <label id='Total' >$count </label> </td>  ";
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

 
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

