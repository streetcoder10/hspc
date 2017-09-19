<?php
session_start();

include_once 'dbconnect.php';
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
	<style >
	.borderless td, .borderless th {
    border: none;
}
	</style>
  <script>
function pop_up(url){
window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no') 
}
</script>
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
                <h2 style="text-align: center;"><a href="managecontest.php" style="color:white;">MANAGE CONTEST</a></h2>
            </div>
            <div class="col-md-4" style="border-right:solid;border-color:white;">
                <h2 style="text-align: center;"><a href="manageteachers.php" style="color:white;">MANAGE TEACHERS </a></h2>
            </div>
            <div class="col-md-4" >
                <h2 style="text-align: center;"><a href="Adminjudgehomepage.php" style="color:white;">MANAGE JUDGE</a></h2>
            </div>
            

        </div>
        </div>
		
		
        <div class="col-md-12 col-xs-12">
            <div class="col-md-2">
                <div id="wrapper">
                    <!-- Sidebar -->
                    <div id="sidebar-wrapper" style="margin-top: 5px;position:fixed;">
                        <ul class="sidebar-nav">
                            <li class="sidebar-brand" style="border-bottom: solid white 1px;">
                                <a href="#" style="font-size: 35px;color: white;">
                                   QuickLaunch
                                </a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="judgemanagement.php" style="font-size: 16px;">JUDGE MANAGEMENT</a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="AssigningProjects.php" style="font-size: 16px;">ASSIGNING PROJECTS</a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="adminviewgrades.php" style="font-size: 16px;color:#fff;font-weight:bold;">VIEW GRADES</a>
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
 <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal" style="margin-top:20px;">Instructions</button>
            <div class="col-md-offset-1 col-md-8" style="margin-top:45px;border: solid 1px;border-color: #dddddd; height:325px;overflow: scroll; ">
			
              	
		<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
 
 
// Attempt select query execution
$sql = "SELECT  assignedjudges.teamid,teams.teamname,ROUND( AVG(avg),2) as grade  FROM assignedjudges INNER JOIN teams ON assignedjudges.teamid = teams.id INNER JOIN teamratings ON assignedjudges.id= teamratings.assignedjudgeid   GROUP BY teamid,teamname ";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
		
        echo "<table class='table table-responsive' >";
            echo "<tr>";
                 
                echo "<th>Team Name</th>";
                 echo "<th>Judge Name</th>";
				 echo "<th>View Valuation sheet</th>";
  				echo "<th>Grade</th>";
				echo "<th>Average </th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                $avgid=  $row['grade']; 
                echo "<td  style='vertical-align:middle;'>" . $row['teamname'] . "</td>";
                 
				 $sql2 = "SELECT assignedjudgeid,fname,ROUND(avg,2) as avg FROM teamratings where teamid=". $row['teamid'] ;
if($result2 = mysqli_query($con, $sql2)){
    if(mysqli_num_rows($result2) > 0){
        echo "<td colspan='3'>";
		 while($row = mysqli_fetch_array($result2)){
	  echo "<div class='col-md-4'> " . $row['fname']  ;
	echo "</div>";
		  echo "<div class='col-md-4'>  <a target='_blank' href='viewevaluationsheet.php?id=". $row['assignedjudgeid'] ."'  onclick='pop_up(this);' > Evaluation </a> </div>";
		
		 echo "<div class='col-md-4' style='text-align: right;margin-left: -15px;'>" . $row['avg'] . "</div>"; 
		//<table class='table' style='border:none;' >";
            
       
        }
        echo "</td>";
        // Free result set
        mysqli_free_result($result2);
    } else{
        echo "Grades not yet Given";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
  
echo "<td>". $avgid ."</td> ";
            echo "</tr>";
        }
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
//mysqli_close($con);
?>

<div class="col-md-12" style="text-align:right;"><button id="myBtnplb" class="btn btn-primary">Post Leaderboard</button></div>
<div class="col-md-12" style="display:none;">

<table class="table" >
    	<thead>
        	<th>Rank</th>
            <th>Team Name</th>
             
			<th>Grades</th>
        </thead>
        
        <tbody>
        	<?php
			$sql = "SELECT  assignedjudges.teamid,teams.teamname,ROUND( AVG(avg),2) as grade FROM assignedjudges INNER JOIN teams ON assignedjudges.teamid = teams.id INNER JOIN teamratings ON assignedjudges.id= teamratings.assignedjudgeid   GROUP BY teamid,teamname order by grade desc";
			if($result = mysqli_query($con, $sql)){
				$temp_var = 0;
				while($row = mysqli_fetch_array($result)){
						$temp_var++;
						if($temp_var<=3){
							echo "<tr><td>".$temp_var."</td>";
							echo "<td>".$row['teamname']."</td>";
							
							echo "<td>".$row['grade']."</td></tr>";
							}
					}
			}
			?>
        	
        </tbody>
    </table>
</div>

            </div>
            <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>•	This page displays the grades and evaluation sheet provided by the judges <br/>
		   •	To view the evaluation sheet, click “EVALUATION SHEET” link <br/>
		   •	To post the winners of the contest to the leaderboard, click “POST LEARDERBOARD” 
		</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <div class="col-md-2">
  <button type="button" class="btn btn-info btn-lg pull-right" style="    margin-top: 30px;" data-toggle="modal" data-target="#myModal">Open Modal</button>
  </div>
    </div>

        <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	$('#myBtnplb').click(function(){
		$(this).parent().next().toggle();
		});
        </script>
</body>

</html>
