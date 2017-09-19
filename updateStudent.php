<?php
include('dbconnect.php');

$id = $_GET['id'];

$query2 = "SELECT * FROM teams";
$result2 = mysqli_query($con, $query2);
$teams = array();
while($team_row = mysqli_fetch_assoc($result2))
{
    $teams[] = $team_row;
}

$query = "SELECT * FROM students WHERE id=$id";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit']))
{
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
    $team_id = $_POST['team'];
    $stu_name = $_POST['name'];
    $stu_email = $_POST['email'];
    $stu_gender = $_POST['gender'];
    $stu_school = $_POST['school'];
	$stu_grade =  $_POST['grade'];

    $query = "UPDATE students SET stuname='$stu_name',Gender='$stu_gender',school='$stu_school',grade='$stu_grade',email='$stu_email',teamid='$team_id' WHERE id = $id";
    //echo $query;
    $result = mysqli_query($con, $query);
    //$rowCount = mysqli_affected_rows($con);
    if($result)
    {
        header('Location:TeamManagement.php');
    }
    else
    {
        $msg = "<span style='color:red'>Some problem occurred, please try again.</span>";
    }
}

//echo "<pre>";
//print_r($row);
//echo "</pre>";

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
               <p><a href="#"><span class="glyphicon glyphicon-log-in"></span> My profile</a></p>
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
		
		<div class="col-md-12 col-xs-12 col-md-offset-10" style="margin-top:15px";> 
		 
		
		</div>
		 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
 

  </div>
</div>
        <div class="col-md-12 col-xs-12 "  align="center">
		<h2>  Update Student  </h2>
            

            
                
                   		 
 <?php if(isset($msg)){
        echo '<div>'.$msg.'</div>';
    }?>
    <form name="student" id="student" method="post">
        <div class="col-md-6 team-list">

            <div class="form-group">
                <select id="teamList" name="team" class="form-control" readonly>
                    <option value="">--Select Team--</option>
                    <?php if( ! empty($teams) ) {
                        foreach($teams as $each){
                            if($row['teamid'] == $each['id'])
                            {
                                $selected = 'selected';
                            }
                            else
                            {
                                $selected = '';
                            }
                            ?>
                            <option value="<?=$each['id'];?>" <?php echo $selected;?> > <?php echo $each['teamname'];?></option>
                        <?php } } ?>

                </select>
            </div>
        </div>

        <div class="col-md-6 judge-list">

            <div class="form-group">
                <label for="pwd">STUDENT:</label>
                <input type="text" class="form-control" name="name" placeholder="Your Student Name" value="<?=$row['stuname'];?>" required />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" placeholder="Your Email" id="email" value="<?=$row['email'];?>" >
            </div>
            <div class="form-group">
                <input type="radio" name="gender" <?php if($row['Gender']=='male'){ echo 'checked';} ?> value="male" id="m"><label for="m">Male</label>
                <input type="radio" name="gender" value="female" <?php if($row['Gender']=='female'){ echo 'checked';} ?> id="f"><label for="f">Female</label>
            </div>
            <div class="form-group">
                <label for="school">School</label>
                 <input type="text" class="form-control" name="school" placeholder="Your School Name" value="<?=$row['school'];?>" required />
            </div>
			<div class="form-group">
                <label for="school">Grade</label>
                 <input type="text" class="form-control" name="grade" placeholder="Your Grade Name" value="<?=$row['grade'];?>" required />
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Update" class="btn btn-primary" id="update-student">
            </div>

    </form>               

            
    </div>
 
        <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
        </script>
</body>

</html>
