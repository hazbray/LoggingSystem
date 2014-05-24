<?php
//including the database connection file
$connection = mysqli_connect("localhost","root","","loggingsystem");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$query1 = "DELETE FROM visit where visit.person_id = $id";
$result1 = mysqli_query($connection,$query1);

$query2 = "DELETE FROM person where person.pid = $id";
$result2 = mysqli_query($connection,$query2);

//redirecting to the display page (index.php in our case)
header("Location:view.php");
?>

