<?php
include('dbconnect.php');

$id = $_GET['id'];

$query = "DELETE FROM students WHERE id = $id ";
$result = mysqli_query($con, $query);

if($result)
{
    header('Location: TeamManagement.php');
}
else
{
    header('Location: TeamManagement.php');
}