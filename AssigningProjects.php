<?php
session_start();

 

include_once 'dbconnect.php';


$query = "SELECT * FROM teams";
$result = mysqli_query($con, $query);
$teams = array();
while($row = mysqli_fetch_assoc($result))
{
	$teams[] = $row;
}
$query2 = "SELECT id,fname FROM users WHERE roleid=3 AND id IN (SELECT judgeid AS id FROM assignedjudges INNER JOIN teams ON assignedjudges.teamid = teams.id INNER JOIN users ON assignedjudges.judgeid = users.id)";
$query3 = "SELECT id,fname FROM users WHERE roleid=3 AND id NOT IN (SELECT judgeid AS id FROM assignedjudges INNER JOIN teams ON assignedjudges.teamid = teams.id INNER JOIN users ON assignedjudges.judgeid = users.id)";
$query4 = "SELECT * FROM teams";
$result2 = mysqli_query($con, $query2);
$result3 = mysqli_query($con, $query3);
$result4 = mysqli_query($con, $query4);
$judges = array();
$teams = array();
$all_judges = array();

while($row = mysqli_fetch_assoc($result2))
{
	$judges[] = $row;
}

while($row = mysqli_fetch_assoc($result3))
{
	$all_judges[] = $row;
}
while($row = mysqli_fetch_assoc($result4))
{
	$teams[] = $row;
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
    	#judgeList .form-control,#judgeList2 .form-control{margin-top:15px;}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Marshall</title>
  
</head>
<body>
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
                <h2 style="text-align: center;"><a href="managecontest.php" style="color:white;">Manage contest</a></h2>
            </div>
            <div class="col-md-4" style="border-right:solid;border-color:white;">
                <h2 style="text-align: center;"><a href="manageteachers.php" style="color:white;">ManageTeacher </a></h2>
            </div>
            <div class="col-md-4" >
                <h2 style="text-align: center;"><a href="Adminjudgehomepage.php" style="color:white;">ManageJudge</a></h2>
            </div>
            

        </div>
        </div>
        <div class="col-md-12 col-xs-12">
            <div class="col-md-2">
                <div id="wrapper">
                    <!-- Sidebar -->
                    <div id="sidebar-wrapper" style="margin-top: 5px;">
                        <ul class="sidebar-nav">
                            <li class="sidebar-brand" style="border-bottom: solid white 1px;">
                                <a href="#" style="font-size: 35px;color: white;adding-left: 50px;">
                                   QuickLaunch
                                </a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="judgemanagement.php" style="font-size: 16px;">JUDGE MANAGEMENT</a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="AssigningProjects.php" style="font-size: 16px;color:#fff;font-weight:bold;">ASSIGNING PROJECTS</a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="adminviewgrades.php" style="font-size: 16px;">VIEW GRADES</a>
                            </li>
                            <!--<li style="border-bottom: solid white 1px;">
                                <a href="#">Events</a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="#">About</a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="#">Services</a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="#">Contact</a>
                            </li>-->
                        </ul>
                    </div>
                   
                   
                </div>

        </div>

            <div class="col-md-10" style="margin-top:5px;">
<div class="col-md-2">
<h4>Registered Judges</h4> 
<!--<ul class="list-group" id="judgeList">-->
<select multiple id="judgeList2" name="judgeList2" class="form-control" style="border: 0 !important;">

<?php if( ! empty($all_judges) ) {
	foreach($all_judges as $each){
	?>	
    <option class="form-control" value="<?=$each['id'];?>"><?php echo $each['fname'];?></option>
    <!--<li class="list-group-item" id="<?=$each['id'];?>"> <?php echo $each['fname'];?></li>-->
    <?php } } ?>
   </select>
   </div>
   
   <div class="col-md-1"> 
   		<div style="    margin-top: 50px;"><a class="remove_judge"><img height="40" src="images/left.png"></a></div>
        <div><a class="add_judge"><img height="40" src="images/right.png"></a></div>
   </div>
    
                <div class="col-md-2"> 
                <h4>Selected Judges</h4>
<!--<ul class="list-group" id="judgeList">-->
<select multiple id="judgeList" name="judgeList" class="form-control" style="border: 0 !important;">
<?php if( ! empty($judges) ) {
	foreach($judges as $each){
	?>	
    <option class="form-control" value="<?=$each['id'];?>"><?php echo $each['fname'];?></option>
    <!--<li class="list-group-item" id="<?=$each['id'];?>"> <?php echo $each['fname'];?></li>-->
    <?php } } ?>
</select>
</div>


<div class="col-md-7" style="    overflow-x: scroll; overflow-y: scroll; max-height: 60%;">
	<h4>Assign List</h4>
    <table class="table" id="addedList">
    	<thead>
        	<th>Name</th>
            <?php if( ! empty($teams) ) {
			foreach($teams as $each){
			?>	
			<th id="<?=$each['id'];?>"><?php echo $each['teamname'];?></th>
			<?php } } ?>
        </thead>
        <tbody>
        	<?php if( ! empty($judges) ) {
			foreach($judges as $each){
				$judgeid=$each['id'];
			?>	
            	<tr>
            	<td id="<?=$each['id'];?>"><?php echo $each['fname'] ." ". $judgeid;?></td>
				<?php if( ! empty($judges) ) {
                foreach($teams as $each){ 
				$teamid=$each['id'];
				$query9 = "SELECT * FROM assignedjudges where judgeid=". $judgeid ." and teamid =" . $teamid;
$result9 = mysqli_query($con, $query9);
$check = "false";
while($row = mysqli_fetch_assoc($result9))
{
	 $check = "true";
}
//echo '<script>alert("' .$query9 .' check value ='. $check .'")</script>';
if($check == "true"){
	  //	echo '<script>alert(true)</script>';
        echo       " <td style='text-align:center;' ><input type='checkbox' checked='true' ></td> ";
 }
else { 
//echo '<script>alert(false)</script>';
echo       " <td style='text-align:center;' ><input type='checkbox'   ></td> ";
 } ?>
				
                 <?php } } ?>
                </tr>
			<?php } } ?>
        </tbody>
    </table>
    <div class="col-md-12"><button id="myBtnSave" class="btn btn-primary">Save</button></div>
</div>




</div>


            </div>
              </div>

        <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	
	$('.add_judge').click(function(){
		if($('#judgeList2').val() == ""){alert("Select Judge In the Box1");}
		else{
			var temp = $('#judgeList2').find("option[value='"+$('#judgeList2').val()+"']");
			var temp_val = $('#judgeList2').val();
			$('#judgeList2').find("option[value='"+$('#judgeList2').val()+"']").remove();
			$('#judgeList').append(temp);
			update(true,temp_val);
		}
	});
	$('.remove_judge').click(function(){
		if($('#judgeList').val() == ""){alert("Select Judge In the Box1");}
		else{
			var temp = $('#judgeList').find("option[value='"+$('#judgeList').val()+"']");
			var temp_val = $('#judgeList').val();
			$('#judgeList').find("option[value='"+$('#judgeList').val()+"']").remove();
			$('#judgeList2').append(temp);
			update(false,temp_val);
		}
		
	});
	
	function update(ele,val){
		if(ele){
			
				var temp ="<tr>";
				 temp+= "<td id='"+val+"'>"+$('#judgeList').find("option[value='"+val+"']").text()+"</td>";
				$('#addedList').find('th').each(function(index,value){
					 if(index != 0)
					 temp+="<td style='text-align:center;'><input type='checkbox'></td>";
				});
				temp+="<tr>";
				$('#addedList tbody').append(temp);
				
			
			}else{
			if($('#judgeList option').length < 1 ){
					$('#addedList tbody').find('tr').remove();
				}else{
					$('#addedList tr td#'+val).parent().remove();
				}
		}
	}
	
	$('#myBtnSave').click(function(){
		var data = [];
		$('#addedList tbody tr :checked').each(function() {
		   data.push({"judgeId":$(this).parent().parent().find('td').eq(0).attr('id'),"teamId":$('#addedList tr').find('th').eq($(this).parent().index()).attr('id')});
		});
		console.log(data);
		$.ajax({url:"update.php",
			data: {"data": data},
			method:"POST",
			success:function(result){

	   			alert("Updation Success");
				//location.href="AssigningProjects.php";
	
	 	}});
	});
	
        </script>
</body>

</html>
