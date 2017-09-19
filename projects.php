

<?php

include('dbconnect.php');

//judge id
$id = $_GET['id'];
$name = $_GET['name']; 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM teams ";
$count =0;
if($result = mysqli_query($con, $sql))
{
    if(mysqli_num_rows($result) > 0)
	{
             echo "<tr>";
                 
				 
				echo "<td>" . $name . "</td>";
				
				while($row = mysqli_fetch_array($result))
				{
					//team id
					 echo "<td><input onclick='assignprojects(" . $row['id'] . ",". $id.",this)' type='checkbox' /></td>";
				}
				echo "</tr>";
				echo "<tr>";
		  
    }  echo "</tr>";

 // Free result set
    mysqli_free_result($result);
} 
else
{
    echo "No records matching your query were found.";
}
 	
	

 
// Close connection
mysqli_close($con);
?>