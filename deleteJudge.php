<?php
include('dbconnect.php');

$id = $_GET['id'];

$query = "DELETE FROM users WHERE id = $id ";
$result = mysqli_query($con, $query);

if($result)
{
    header('Location: Judgemanagement.php');
}
else
{
    header('Location: judgemanagement.php');
}