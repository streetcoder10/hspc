 

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
                  <a href="Teacherhomepage.php"> <img src="images/marsahll logo.PNG"/></a>
            </div>
        <div class="col-md-8" align="center">
 
 <h1>  HIGH SCHOOL PROGRAMMING CONTEST</h1>

        </div>
        <div class="col-md-2" style="padding-top:20px;">
           
               <p>Welcome <?php echo $_SESSION['usr_name']; ?></p>
               <p><a href="teacherProfile.php"><span class="glyphicon glyphicon-log-in"></span> My profile</a></p>
                <p><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></p>
           
        </div>

    </div>

    <div class="row" style="background-color: #086435;border-color: #086435;">

        <div class="col-md-12">

            <div class="col-md-4" style="border-right:solid;border-color:white;">
                <h2 style="text-align: center;"><a href="Teacherhomepage.php" style="color:white;">HOME</a></h2>
            </div>
            <div class="col-md-4" style="border-right:solid;border-color:white;">
                <h2 style="text-align: center;"><a href="TeamManagement.php" style="color:white;">TEAM MANAGEMENT </a></h2>
            </div>
            <div class="col-md-4" >
                <h2 style="text-align: center;"><a href="archivedcontest.php" style="color:white;">ARCHIVED CONTEST</a></h2>
            </div>
            

        </div>
        </div>
		
		
		
	   <div class="col-md-12 col-xs-12 " align="center" style="margin-top:30px;">
            
          <table class="table table-bordered"> 
						 <TR><th>YEAR</th><th>CONTEST AND DESCRIPTION</th><th>TEAMS</th></TR>
						 <TR><TD> 2016 FALL </TD>
						 <TD> PHP WEB SERVER </TD>
						   <TD>TECHNOS</TD>
						 </TR>
						 <TR><TD> 2016 SPRING </TD>
						 <TD> PHP WEB SERVER </TD>
						   <TD>SPARKS</TD>
						 </TR>
						 <TR><TD> 2015 SPRING </TD>
						 <TD> JAVA APPLETE </TD>
						   <TD>TECHNOS</TD>
						 </TR>
						  
						 </table>
		 
		  

               

            
    </div>

        <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
        </script>
</body>

</html>
