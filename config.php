<?php
$connection = mysqli_connect("localhost","root","","loggingsystem") 
or die("ERROR");
@mysql_select_db("loggingsystem",$connection);
?>