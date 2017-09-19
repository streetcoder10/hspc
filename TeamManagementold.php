  
<?php
session_start();
include_once 'dbconnect.php';
$query = "SELECT * FROM teams where   teacherid ='". $_SESSION['usr_id'] ."' ";
$result = mysqli_query($con, $query);
$teams = array();
while($row = mysqli_fetch_assoc($result))
{
	$teams[] = $row;
}
 
$query2 = "SELECT id,fname FROM users WHERE roleid=3 AND id NOT IN (SELECT judgeid AS id FROM assignedjudges INNER JOIN teams ON assignedjudges.teamid = teams.id INNER JOIN users ON assignedjudges.judgeid = users.id)";
 
$result2 = mysqli_query($con, $query2);
$judges = array();
while($row = mysqli_fetch_assoc($result2))
{
	$judges[] = $row;
}
//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$tname = mysqli_real_escape_string($con, $_POST['tname']);
	 
	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$tname)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}
	 
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO teams(teamname,teacherid) VALUES('" . $tname . "','" . $_SESSION['usr_id'] . "')")) {
			$successmsg = "Successfully Created!  ";
			 header('Location: TeamManagement.php');
		} else {
			$errormsg = "Error in registering...Please try again later!";
		}
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
                  <a href="home.php"> <img src="images/marsahll logo.PNG"/></a>
            </div>
        <div class="col-md-8" align="center">
            <h1> MARSHALL UNIVERSITY</h1>
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
		<script>
		function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
}
		</script>
		
		<div class="col-md-12">
		<!--<div class="col-md-6" style="margin-top:15px";>
		
		
		<input type="button" class="btn btn-success btn-lg" name="answer" value="Create team" onclick="showDiv()" />

		</div>-->
		<div class="col-md-offset-10" style="margin-top:15px";> 
		<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Instructions</button>
		
		</div>
		</div>
		
		<h2 class="text-center">Create student and assign to a team</h2>
		<hr/>
		
		
		<script>
		function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
}
		</script>
		
		<div class="col-md-12">
		<div class="col-md-6" style="margin-top:15px";>
		
		
		<input type="button" class="btn btn-success btn-lg" name="answer" value="Create team" onclick="showDiv()" />

		</div>
		
		</div>
		
		<div class="col-md-12 col-xs-12 answer_list" id="welcomeDiv" style="display:none;margin-top: 60px;">
		 
		<div class="col-md-10 col-xs-12">



		<div class="col-md-offset-2 col-md-9   well">
		<h2 style="text-align:center;">Team  Creation</h2>
		<hr/>
		 <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					

					<div class="form-group">
						<label for="name">Team Name</label>
						<input type="text" name="tname" placeholder="Enter Team Name"  class="form-control" />
						 
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					
					 

					<div class="form-group">
						<input type="submit" name="signup" value="Submit"   style=" background-color: #086435;" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
			<div class="col-md-12">
			
			
			
			</div>
		  </div>
	



</div>
		
		</div>
	
		
		
		<div class="col-md-12">
		<form name="student" id="student">
		<div class="col-md-12">
		<div class="col-md-2">
		<div class="form-group">
		 <label for="pwd">STUDENT:</label>
                <select id="teamList" name="team" class="form-control">
                <option value="">--Select Team--</option>
                <?php if( ! empty($teams) ) {
                    foreach($teams as $each){
                    ?>
                    <option value="<?=$each['id'];?>"> <?php echo $each['teamname'];?></option>
                    <?php } } ?>

                </select>
            </div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
                <label for="pwd">STUDENT:</label>
                <input type="text" name="name" placeholder="Your Student Name" required class="form-control" />
            </div>
		</div>
		<div class="col-md-2">
		
			<div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" placeholder="Your Email" id="email">
            </div>
			</div>
			<div class="col-md-2" style=" padding-top: 26px;">
			 <div class="form-group">
                <input type="radio" name="gender" value="male" id="m"><label for="m">Male</label>
                <input type="radio" name="gender" value="female" id="f"><label for="f">Female</label>
            </div>
			</div>
			<div class="col-md-2">
			 <div class="form-group">
                <label for="school">school</label>
                 <input type="text" class="form-control" name="school" placeholder="Your school" id="school">
            </div>
			</div>
			<div class="col-md-2">
			 <div class="form-group">
                <label for="grade">Grade</label>
                 <input type="text" class="form-control" name="grade" placeholder="Your grade" id="grade">
            </div>
			</div>
			<div class="col-md-3-offset-9" padding-top: 36px;">
		
		<div class="form-group">
                <button type="button" name="submit" class="btn btn-primary"    style=" background-color: #086435;" id="assign-student">Assign</button>
            </div>
		</div>
		</div>
		<hr/>
		<div class="col-md-12" style="margin-top:30px;">
		 <table class="table table-bordered" style="background-color: white;">
    <thead>
      <tr>
        <th>Team Name</th>
        <th>Student Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;     School  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Grade</th>
		 
		 
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      	
<?php
foreach($teams as $each_team){
	$team_id = $each_team['id'];
$query3 = "SELECT s.stuname,s.gender,s.email,s.school,s.grade, t.teamname,s.id as id from students s inner join teams t on s.teamid=t.id WHERE t.id='$team_id' and teacherid='" . $_SESSION['usr_id'] ."'";
$result3 = mysqli_query($con, $query3);
$astudents = array();
while($row = mysqli_fetch_assoc($result3))
{
    $astudents[] = $row;
}
?>
<tr> <td  style='vertical-align:middle;'> <?php echo $each_team['teamname'];?> </td>
    <td colspan="2">
        <div id="<?=$each_team['id'];?>">
            <table class='table' >
                 
            <?php
                if( ! empty($astudents) ) {
                    foreach($astudents as $each){
            ?>

            <tr style="background-color: white;">
                <td style="border-top: 0px;"> <?php echo $each['stuname'];?></td>
				 <td style="border-top: 0px;"> <?php echo $each['email'];?></td>
				 <td style="border-top: 0px;"> <?php echo $each['school'];?></td>
				 <td style="border-top: 0px;"> <?php echo $each['grade'];?></td>
				  
                <td style="float: right;border-top: 0px;"> <a href="updateStudent.php?id=<?=$each['id'];?>">Edit</a> |
                    <a href="deleteStudent.php?id=<?=$each['id'];?>" onclick="return confirm_delete()">Delete</a></td>
            </tr>
    	<?php } } ?>
            </table>
        </div>

    </td>
<td style='vertical-align:middle;'> <a href="updateProject.php?id=<?=$team_id;?>">Upload</a> | <a href="deleteTeam.php?id=<?=$team_id;?>">Delete</a></td>
		<?php } ?>
		
		 
</tr>
 </tbody>
 </table>
		
		
		</div>
		</div>
		</form>
		
		  

 <div width="100%" align="center">

 <table class="table-responsive"  align="center">


<tr>
<td class="pull-right">

    
       

        <div class="col-xs-12 judge-list">

            
            
          
   
</div>

<div class="col-xs-4 a-judge-list">
<!--<ul class="list-group" id="assignedJudgeList">-->
    

</div>
</td><td></td></tr>





</td><td  width="1%">  </td></tr></table>

 </div>
		  </div>
			 

        <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
        </script>
		<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

		<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Instructions</h4>
      </div>
      <div class="modal-body">
        <p><ul>
		<li>To create a new team with student details, click “CREATE TEAM”</li>

<li>To edit student details or team detail, click “EDIT”</li>

<li>To delete team, click “DELETE”</li>
<li>To upload source code, click “UPLOAD” followed by “SUBMIT”</li>
</ul></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

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
$(document).ready(function(){

    $('#assign-student').click(function(){
        //alert(1);
		var teamid = $('#teamList').val();
		var judges = $('#judgeList').val();
		//alert(teamid);
		//alert(judges);
        var data = $('#student').serialize();
        //alert(data);
		$.ajax({
			url:'assignStudent.php',
			type:'post',
			data:data,
			success:function(response){
				//alert(response);
				if(response == 'error')
                {
                    alert('some problem occurred, please try again.');
                }
                else
                {
                    $('#'+teamid).html(response);
                    $('#student')[0].reset();
                }
			}
		});
	});
});
</script>


        <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
        </script>
</body>

</html>
