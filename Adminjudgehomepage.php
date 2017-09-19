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
                <h2 style="text-align: center;"><a href="adminjudgehomepage.php" style="color:white;">MANGE JUDGE</a></h2>
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
                                <a href="#" style="font-size: 35px;color: white;">Quicklaunch            </a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="judgemanagement.php" style="font-size: 16px;">JUDGE MANAGEMENT</a>
                            </li>
                            <li style="border-bottom: solid white 1px;">
                                <a href="assigningprojects.php" style="font-size: 16px;">ASSIGNING PROJECTS</a>
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

               <div  class="col-md-offset-3">
                   <img src="images\contest.jpg" class="img-responsive" width="500px" height="500px" />

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
