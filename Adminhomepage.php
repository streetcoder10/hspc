 

<?php
session_start();
include_once 'dbconnect.php';

$result = mysqli_query($con, "SELECT ID,ContestName, Description,DATE_FORMAT(REGDUEDATE,'%W, %d %M %Y') as RegDueDate,DATE_FORMAT(SubDueDate,'%W, %d %M %Y') as SubDueDate,MAXSTU,STATUS FROM CONTEST where subduedate > DATE(CURDATE()) ORDER BY id DESC");

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

        <div class="col-md-2">
                  <a href="adminhomepage.php"> <img src="images/marsahll logo.PNG"/></a>
        </div>
        <div class="col-md-8" align="center">
             
 <h1>  HIGH SCHOOL PROGRAMMING CONTEST</h1>

        </div>
        <div class="col-md-2" style="padding-top:20px;">
           
               <p>Welcome <?php echo $_SESSION['usr_name']; ?></p>
               <p><a href="#"><span class="glyphicon glyphicon-log-in"></span> My profile</a></p>
                <p><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></p>
           
        </div>

    </div>

    <div class="row" style="background-color: #086435;border-color: #086435;">

        <div class="col-md-12">

            <div class="col-md-4" style="border-right:solid;border-color:white;">
                <h2 style="text-align: center;"><a href="managecontest.php" style="color:white;">MANAGE CONTEST</a></h2>
            </div>
            <div class="col-md-4" style="border-right:solid;border-color:white;">
                <h2 style="text-align: center;"><a href="manageteachers.php" style="color:white;">MANAGE TEACHER </a></h2>
            </div>
            <div class="col-md-4" >
                <h2 style="text-align: center;"><a href="adminjudgehomepage.php" style="color:white;">MANAGE JUDGE</a></h2>
            </div>
            

        </div>
        </div>
	  
        <div class="col-md-12 col-xs-12 ">
            
<div class="col-md-offset-10" style="margin-top:15px";> 
		<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal1">Instructions</button>
		
		</div>
            
                
                   		 
		 
		<div class="col-md-6 col-xs-12"  style="margin-top:15px;">
		 
		
		<h2  >Contest Name</h2>
		<p><?php echo  $row['ContestName']; ?></p>
		 
		 
		<br/>
		<h4>Description</h4>
		<p><?php echo $row['Description']; ?></p>
		 
		</div>
		<div class="col-md-4 col-xs-12 col-md-offset-2">
		 <br/><br/><br/> 
		<h4>Team Registration Due Date</h4>
		<p><?php echo  $row['RegDueDate']; ?></p>
		 <br/>
		 <br/>
		<h4>Project Submission Due Date</h4>
		<p><?php echo  $row['SubDueDate']; ?></p>
		 <br/><br/>
				<h4>Max Students In a Team</h4>
		<p><?php echo  $row['MAXSTU']; ?></p>
		 
		</div>
		
		 
		 <div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Instructions</h4>
      </div>
      <div class="modal-body">
        <p><ul>
		<li>Admin home page</li>
<li>To create a new contest, edit current contest information go to “MANAGE CONTEST” page</li>
<li>To send an invitation to a teacher, view registered teams go to “MANAGE TEACHERS” page</li>
<li>To send login credentials, view judge details go to “MANAGE JUDGE” page
</li><br>
<li>Manage contest</li>
<li>To create a new contest, click “create contest”</li>
<li>To edit current contest details, click “edit”</li>
<li>To delete current contest, click “delete”</li>
<li>To view a previous contest, click “ARCHIVE”</li><br>

<li>Manage teachers</li>
<li>To send an invitation to a teacher to register to the contest, click “send invitation”</li>
<li>To approve the registration of the teacher, click “approve”</li>
<li>This page displays the details of the approved registered teams</li><br>

<li>Manage judge</li>
<li>To add new judges, edit judge details or delete judge from contest, go to “JUDGE MANAGEMENT” page</li>
<li>To select required judges according to the current contest, assign judges to teams go to “ASSIGN PROJECTS” page</li>
<li>To view grades and evaluation sheets provided by the judges to teams, post leaderboard, go to “VIEW GRADES” page</li><br>

<li>Judge management</li>
<li>To register to new judge (send automatic generated code as password), click “add judge”</li>
<li>To enter the judge details, enter manually</li>
<li>To edit or delete judge details, click “edit”, “delete”</li><br>

<li>Assign projects</li>
<li>To select required judges from the registered judges, click “JUDGE NAME” followed by “->”</li> 
<li>To remove judge from the selected judges, click “JUDGE NAME” followed by “<- “</li>
<li>To assign teams to each judge, click the “CHECK BOX” under the team name</li>
<li>To reassign teams to the judges, click “EDIT” followed by “SAVE”</li><br>



</ul></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> 

               

            
    </div>

        <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
        </script>
</body>

</html>
