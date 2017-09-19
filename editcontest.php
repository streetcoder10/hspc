 

<?php
session_start();
include_once 'dbconnect.php';


if(isset($_POST['submit']))
{
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
    $cname = $_POST['cname'];
    $Description = $_POST['Description'];
    $RegDueDate = $_POST['RegDueDate'];
    $SubDueDate = $_POST['SubDueDate'];
    $MAXSTU = $_POST['MAXSTU'];
	 $idval = $_POST['idval'];

    $query = "UPDATE contest SET ContestName='$cname',Description='$Description',RegDueDate='$RegDueDate',SubDueDate='$SubDueDate',MAxStu='$MAXSTU' WHERE id = $idval";
    //echo $query;
    $result = mysqli_query($con, $query);
    //$rowCount = mysqli_affected_rows($con);
    if($result)
    {
        header('Location:ManageContest.php');
    }
    else
    {
        $msg = "<span style='color:red'>Some problem occurred, please try again.</span>";
    }
}
else{
	
	$id = $_GET['id'];
$result = mysqli_query($con, "SELECT ID,ContestName, Description,RegDueDate,  SubDueDate,MAXSTU,STATUS FROM CONTEST where id =". $id);

if ($row = mysqli_fetch_array($result)) {
  
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
                  <a href="adminhomepage.php"> <img src="images/marsahll logo.PNG"/></a>
            </div>
        <div class="col-md-8" align="center">
 
 <h1>  HIGH SCHOOL PROGRAMMING CONTEST</h1>

        </div>
        <div class="col-md-2" style="padding-top:20px;">
           
               <p>Welcome <?php echo $_SESSION['usr_name']; ?></p>
              
                <p><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></p>
           
        </div>

    </div>

    <div class="row" style="background-color: #086435;border-color: #086435;">

        <div class="col-md-12">

            <div class="col-md-4" style="border-right:solid;border-color:white;">
                <h2 style="text-align: center;"><a href="managecontest.php" style="color:white;">MANAGE CONTEST</a></h2>
            </div>
            <div class="col-md-4" style="border-right:solid;border-color:white;">
                <h2 style="text-align: center;"><a href="ManageTeachers.php" style="color:white;">MANAGE TEACHER </a></h2>
            </div>
            <div class="col-md-4" >
                <h2 style="text-align: center;"><a href="adminjudgehomepage.php" style="color:white;">MANAGE JUDGE</a></h2>
            </div>
            

        </div>
        </div>
	  
        <div class="col-md-12 col-xs-12 "   style="margin-top:15px;">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="updateform"> 
		  <div class="col-md-10 col-xs-12 "    >
		 <label for="name">Contest Name</label>
						<input type="text" name="cname"  class="form-control"   value="<?php echo  $row['ContestName']; ?>"   /> 
		 		 
		  
		<br/>
		<label for="name">Description</label>
		<textarea type="text" name="Description" class="form-control"   >"<?php echo  $row['Description']; ?>"</textarea> 
		 
		 <input type="hidden" name ="idval" class="form-control" value="<?php echo   $_GET['id']; ?> "/>
		 
		 <br/> 
		<label for="name">Team Registration Due Date</label>
		<input type="text" name="RegDueDate"  class="form-control"   value="<?php echo  $row['RegDueDate']; ?>"   /> 
		
		 
		 <br/>
		  
		<label for="name">Project Submission Due Date</label>
		<input type="text" name="SubDueDate"  class="form-control"   value="<?php echo  $row['SubDueDate']; ?>"   /> 
		 
		 <br/> 
				<label for="name">Project Submission Due Date</label>
		<input type="text" name="MAXSTU"  class="form-control"    value="<?php echo  $row['MAXSTU']; ?>"   /> 
		   <br/> <br/>
		 
		 
		 <input type="submit" name="submit" value="Update" class="btn btn-primary">
		  

               
</div>	
</form>
	 <div class="col-md-12 col-xs-12 col-md-offset-8"   style="margin-top:15px;">			
   
			  
    </div>

        <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
        </script>
</body>

</html>
