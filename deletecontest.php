<?php
include('dbconnect.php');

$id = $_GET['id'];

$query = "DELETE FROM contest WHERE id = $id ";
$result = mysqli_query($con, $query);

if($result)
{
    header('Location: Managecontest.php');
}
else
{
    header('Location: Managecontest.php');
}