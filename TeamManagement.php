  
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
    <style>
    	#student input[readonly]{border:0 !important;}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Marshall</title>
   <script>
function pop_up(url){
window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no') 
}
</script>
</head>
<body  style="font-family:verdana;">
    <div class="topnav row">

        <div class="col-md-2" style=" padding: 25px;">
                  <a href="teacherhomepage.php"><img  src="images/marsahll logo.PNG"/></a>
            </div>
        <div class="col-md-8" align="center">
             <h1 style="margin-top:25px;">  HIGH SCHOOL PROGRAMMING CONTEST</h1>

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
		<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal1">Instructions</button>
		
		</div>
		</div>
		
		<!--<h2 class="text-center">Create student and assign to a team</h2>-->
		<hr/>
		
		
		<script>
		function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
}
		</script>
		
		<div class="col-md-12">
		<div class="col-md-6" style="margin-top:15px";>
		
		
		<input type="button" class="btn btn-success btn-lg" name="answer" value="Create team" href="#"  data-toggle="modal" data-target="#myModal" />

		</div>
		
		</div>
		
		<div id="myModal" class="modal fade in" role="dialog" style=" padding-right: 17px;">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Instructions</h4>
              </div>
              <div class="modal-body">
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
			
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
		 
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
			<div class="col-md-12">
			
			
			
			</div>
	



</div>
		
		</div>
	
		
		
		<div class="col-md-12">
		<form name="student" id="student">
		<div class="col-md-12">
		<div class="col-md-2">
		<div class="form-group">
		 <label for="pwd">Select Team to add student:</label>
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
                <label for="pwd">Name:</label>
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
			 	<label>Gender:</label>
                <input type="radio" name="gender" value="male" id="m"><label for="m">Male
                <input type="radio" name="gender" value="female" id="f"><label for="f">Female
            </div>
			</div>
			<div class="col-md-2">
			 <div class="form-group">
                <label for="school">School:</label>
                 <input type="text" class="form-control" name="school" placeholder="Your school" id="school">
            </div>
			</div>
			<div class="col-md-2">
			 <div class="form-group">
                <label for="grade">Grade Level:</label>
                <select class="form-control" name="grade">
                	<option value="Fresher">Fresher</option>
                    <option value="Junior">Junior</option>
                    <option value="Sophomore">Sophomore</option>
                    <option value="Senior">Senior</option>
                </select>
                 <!--input type="text" class="form-control" name="grade" placeholder="Freshmen/Junior/Sophomore/Senior" id="grade"-->
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

 <table class="table table-bordered" style="background-color: white;">
 	<thead class="thead-inverse">
    <b>Team Name:</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" readonly name="teamNameTxt" class="<?=$team_id;?>" id="teamNameTxt" value = "<?php echo $each_team['teamname'];?>">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
    <!--<a target='_blank' href='viewevaluationsheet.php?id=". $row['assignedjudgeid'] ."'  onclick='pop_up(this);' ><td style='vertical-align:middle;'>--> 
    <!--<input type="button" value="View Uploaded File" style="background: #fff;border: none;color: #337ab7;outline:none;" onClick="viewFile(<?=$team_id;?>,this)" id="viewUpload"/>&nbsp; -->
    <a target='_blank'  href="viewUploads.php?id=<?=$team_id;?>" onclick='pop_up(this);'>View Uploaded Files</a> |
	<a href="updateProject.php?id=<?=$team_id;?>">Upload</a> | <a href="deleteTeam.php?id=<?=$team_id;?>">Delete</a> | <a class='edit_all'>Edit</a>
    <div class="edit_all_none" style="display:none;">  <a class="cancel_all">Save and Close</a></div>
    <br><br>
      <tr>
        <!--<th>Student Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;      School  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Grade Level</th>-->
        <th>Student Name</th>
        <th>Email</th>
        <th>School</th>
        <th>Grade Level</th>	 
        <th>Action</th>
      </tr>
</thead>
<tbody>
 <!--tr>
    <td colspan="5">
        <!--<div id="<?=$each_team['id'];?>">
            <table class='table' >-->
                 
            <?php
                if( ! empty($astudents) ) {
                    foreach($astudents as $each){
            ?>

            <tr style="background-color: white;">
                <td style="border-top: 0px;"><input type="hidden" name="idTxt" id="idTxt" value="<?=$each['id'];?>"><input tyle="text" readonly name="stunameTxt" id="stunameTxt" value = "<?php echo $each['stuname'];?>"> </td>
				 <td style="border-top: 0px;"> <input type="text" readonly name="emailTxt" id="emailTxt" value = "<?php echo $each['email'];?>"></td>
				 <td style="border-top: 0px;"> <input type="text" readonly name="schoolTxt" id="schoolTxt" value = "<?php echo $each['school'];?>"></td>
				 <td style="border-top: 0px;"> <input type="text" readonly name="gradeTxt" id="gradeTxt" value = "<?php echo $each['grade'];?>"></td>
				  
                <td style="border-top: 0px;"> 
                    <a href="deleteStudent.php?id=<?=$each['id'];?>" onClick="return confirm_delete()">Delete</a></td>
            </tr>
    	<?php } } ?>
 
   

    </td>
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
                    location.href="TeamManagement.php";
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
    $('.edit_all').click(function(){
    	$(this).next().show().next().next().next('table').find('input').attr('readonly',false);
        $(this).parent().find('#teamNameTxt').attr('readonly',false);
        
       // $(this).next().next().next('table').next().show();
    });
    $('.cancel_all').click(function(){
    	$(this).parent().hide().next().next().next('table').find('input').attr('readonly',true);
        $(this).parent().parent().find('#teamNameTxt').attr('readonly',true);
    });
    $('.save_all').click(function(){
    console.log($(this).parent().next().next().next('table').find('tbody tr'));
    var data = [];
    	$(this).parent().next().next().next('table').find('tbody tr').each(function(){
        	
            data.push({'id':$(this).find('#idTxt').val(),'stuname':$(this).find('#stunameTxt').val(),'email':$(this).find('#emailTxt').val(),'school':$(this).find('#schoolTxt').val(),'grade':$(this).find('#gradeTxt').val()});
        });
        var teamName = $($(this).parent().prev().prev().prev().prev().prev()[0]).val();
        var teamID = $($(this).parent().prev().prev().prev().prev().prev()[0]).attr('class');
        $.ajax({url:"updateStudNew.php",
			data: {"content": data,"TeamID": teamID,"TeamName": teamName},
			method:"POST",
			success:function(result){

	   			alert("Updation Success");
				location.href="TeamManagement.php";
	
	 	}});
    });
    function viewFile(e,ele){
    	$.ajax({url:"getFilePath.php",
			data: {"data": e},
			method:"POST",
			success:function(result){
            
            	if(result != 'NotFound'){
                    location.href=result;
                }else{
                	$(ele).val("Not Found!");
                }
	
	 	}});
    }
        </script>
</body>

</html>
