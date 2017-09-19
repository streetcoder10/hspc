<?php
include('dbconnect.php');

$id = $_GET['id'];

$query = "DELETE FROM teams WHERE id = $id ";
$result = mysqli_query($con, $query);

if($result)
{
    header('Location: TeamManagement.php');
}
else
{
    header('Location: TeamManagement.php');
}