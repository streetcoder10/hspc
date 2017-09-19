 

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
	<style>
          
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
</head>
<body style="font-size:">
       <div class="topnav row">

        <div class="col-md-2" style=" padding: 25px;">
                  <a href="judgehomepage.php"> <img src="images/marsahll logo.PNG"/></a>
            </div>
        <div class="col-md-8" align="center">
 
 <h1>  HIGH SCHOOL PROGRAMMING CONTEST</h1>

        </div>
        <div class="col-md-2" style="padding-top:20px;">
           
               <p>Welcome <?php echo $_SESSION['usr_name']; ?></p>
               <p><a href="judgeprofile.php"><span class="glyphicon glyphicon-log-in"></span> My profile</a></p>
                <p><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></p>
           
        </div>

    </div>
       
 
 
 <div class="row" style="background-color: #086435;border-color: #086435;">
      
          <div class="col-md-12">

              <div class="col-md-3" style="border-right:solid;border-color:white; ">
                  <h2 style="text-align: center;"><a href="Judgehomepage.php" style="color:white;font-size: 22px;">Home </a></h2>
              </div>
              <div class="col-md-2"  style="border-right:solid;border-color:white; ">
                  <h2 style="text-align: center;"><a href="assignedprojects.php" style="color:white;font-size: 22px;"> Assigned Projects </a></h2>
              </div>
              <div class="col-md-2"  style="border-right:solid;border-color:white; ">
                  <h2 style="text-align: center;"><a href="judgegrades.php" style="color:white;font-size: 22px;">Grades</a></h2>
              </div>
              <div class="col-md-2" style="border-right:solid;border-color:white; ">
                  <h2 style="text-align: center;"><a href="contactadmin.php" style="color:white;font-size: 22px;">Contact Admin</a></h2>
              </div>
			  <div class="col-md-3 "   style="border-right:solid;border-color:white; ">
			     
				<h2 style="text-align: center;"><a href="judgearchivedcontetst.php" style="color:white;font-size: 22px;">Archived Contest</a></h2>
					 
				  
				  
              </div>
			

          </div>
      </div>

  
   <div class="col-md-12" style="margin-top:40px;">
            
<div class="col-md-offset-10" style="margin-top:15px";> 
		<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal1">Instructions</button>
		
		</div>
   <div class="col-md-offset-2 col-md-8" style="border:solid;">
   <h2  align="center">CONTEST INFO </h2>
    <br/>
		<h4>Contest Name</h4>
		<p><?php echo  $row['ContestName']; ?></p>
		 
		 
		<br/>
		<h4>Description</h4>
		<p><?php echo $row['Description']; ?></p>
		 
		 
		 <br/> 
		<h4>Team Registration Due Date</h4>
		<p><?php echo  $row['RegDueDate']; ?></p>
		 <br/>
		
		<h4>Project Submission Due Date</h4>
		<p><?php echo  $row['SubDueDate']; ?></p>
		 <br/> 
				<h4>Max Students In a Team</h4>
		<p><?php echo  $row['MAXSTU']; ?></p>
   </div>
   </div>



   <div class="col-md-12 col-xs-12">
    <div class="row" style="background-color:#101010;margin-top: 40px;">
        <div class="copyright">
            <div class="container">
                <div class="col-md-12" style="padding-top: 4px;color:white;">
                    <p style="text-align:center; ">© 2017 - All Rights with Marshall University</p>
                </div>
                
            </div>
        </div>
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
		<li>Judge homepage</li>
<li>To view assigned projects, download source code, go to “ASSIGNED PROJECTS” page</li>
<li>To upload grades, fill evaluation sheets of teams, go to “GRADES” page</li>
<li>To contact admin, go to “CONTACT ADMIN” page</li>
<li>To view previous contest the judge evaluated, go to CONTEST -> ARCHIVE</li>
<br>

<li>Assigned projects</li>
<li>To download source code manually, click on “DOWNLOAD” button</li>
<br>

<li>Grades</li> 
<li>To upload grades, click “EVALUATION SHEET”, followed by “SUBMIT”. This will display the total grade allotted in the evaluation sheet of the respected team</li>
<li>To edit grades, click “EDIT” followed by “SAVE”</li>
<br>

<li>Contact admin</li>
<li>To send a mail to the administrator of the website, type in the subject and body and click “SEND”</li>
<br>


</ul></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> 
	</div>
   
   
</body>
</html>
