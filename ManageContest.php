 

<?php
session_start();
include_once 'dbconnect.php';

$result = mysqli_query($con, "SELECT ID,ContestName, Description,DATE_FORMAT(REGDUEDATE,'%W, %d %M %Y') as RegDueDate,DATE_FORMAT(SubDueDate,'%W, %d %M %Y') as SubDueDate,MAXSTU,STATUS FROM CONTEST ORDER BY id DESC");

if ($row = mysqli_fetch_array($result)) {
  
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
	  
        <div class="col-md-12 col-xs-12 " style="margin-top:15px;">
             
		  <div class="col-md-offset-1 col-md-10 col-xs-12">
		 <h2>Current Contest </h2>
		  
		 		<p><strong>Contest Name </strong>: <?php echo  $row['ContestName']; ?></p>
		  
		<br/>
		<div class="col-md-12">
		<p><strong>Description</strong> :<?php echo $row['Description']; ?></p>
		 
		
		 <br/> 
		
		<p><strong>Team Registration Due Date</strong> :<?php echo  $row['RegDueDate']; ?></p>
		 <br/>
		  
		
		<p><strong>Project Submission Due Date</strong> :<?php echo  $row['SubDueDate']; ?></p>
		 <br/> 
				
		<p><strong>Max Students In a Team</strong> :<?php echo  $row['MAXSTU']; ?></p></div>
		  <br/> <br/> 
		 <div class="col-md-offset-4 col-md-10 col-xs-12">
		 <div class="col-md-2" style="border-right:solid;border-color:white;background-color:#086435;">
                <h3 style="text-align: center;"><a href="editcontest.php?id=<?php echo  $row['ID']; ?>" style="color:white;">EDIT </a></h3>
            </div> 
			<div class="col-md-2" style="background-color:#086435;border-right:solid;border-color:white;">
                <h3 style="text-align: center;"><a href="deletecontest.php?id=<?php echo  $row['ID']; ?>" onclick="return confirm_delete()" style="color:white;">  DELETE</a></h3>
            </div>
		 </div>
		  

               
</div>	
	 <div class="col-md-8 col-xs-12" style="margin-top:15px;">			
 <div class="col-md-3" style="border-right:solid;border-color:white;background-color:#086435;">
                <h3 style="text-align: center;"><a href="createnewcontest.php" style="color:white;">CREATE NEW CONTEST </a></h3>
            </div> 
			 <div class="col-md-2" hidden="true" style="border-right:solid;border-color:white;background-color:#086435;">
                <h3	 style="text-align: center;"><a href="#" style="color:white;">ARCHIVED CONTEST </a></h3>
            </div> 
    </div>

        
		<script type="text/javascript">
    function confirm_delete()
    {
        if(confirm('Do you want to delete?'))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
        </script>
</body>

</html>
