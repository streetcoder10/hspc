<?php
include('dbconnect.php');

$team_id = $_POST['team'];
$stu_name = $_POST['name'];
$stu_email = $_POST['email'];
$stu_gender = $_POST['gender'];
$stu_school = $_POST['school'];
$stu_grade = $_POST['grade'];


$query = "INSERT INTO students(stuname,Gender,school,grade,email,teamid) values('$stu_name', '$stu_gender', '$stu_school','$stu_grade', '$stu_email', '$team_id')";
$result = mysqli_query($con, $query);
$rowCount = mysqli_affected_rows($con);

if($rowCount > 0)
{
    //echo "ok";
    $query2 = "SELECT s.stuname,s.email,s.school,s.gender,s.grade,t.teamname,s.id FROM students s INNER JOIN teams t ON s.teamid = t.id WHERE t.id = $team_id";
    $result2 = mysqli_query($con, $query2);
    $team_students = array();
    while($row = mysqli_fetch_assoc($result2))
    {
        $team_students[] = $row;
    }

    if( ! empty($team_students) )
    {
        echo "<table class='table'  >";
        foreach($team_students as $each)
        {
            echo "<tr><td>".$each['stuname']."</td><td>".$each['email']."</td><td>".$each['school']."</td><td>".$each['grade']."</td><td><a href='updatestudent.php?id=". $each['id'] ."'>Edit</a>|<a href='deletestudent.php?id=". $each['id'] ."'>Delete</a></td></tr>";
			
        }
        echo '</table>';
    }
    else
    {
        echo '<ol><li></li></ol>';
    }
}
else
{
    echo "error";
}