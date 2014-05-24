<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LogIn</title>
<link rel="stylesheet" href="style.css" />

<script type="text/javascript">
  var m=0;
  var n=1000;
  var o=1500;
  var speed=0;
function scrollPics() {
 //    document.getElementById('train').style.right=m+'px';
     document.getElementById('building1').style.left=m+'px';
	 document.getElementById('building2').style.left=n+'px';
	 document.getElementById('building3').style.left=o+'px';
	 
	 m--;
   n--;
if(m==-500) {
   m=0;
 }
if(n==500) {
   n=1000;
 }
 if(o==1000) {
   n=1500;
 }
setTimeout('scrollPics()',speed);
 } 
window.onload=function() {
   scrollPics();
 }
</script>

</head>
<header>
		<div id="train"><img src="train.png"></div>
		<div id="building1"><img src="banner.png"></div>
        <div id="building2"><img src="banner.png"></div>
        <div id="building3"><img src="banner.png"></div>
</header>
<body>
    <center>
    <div id="form">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="form1" id="form1" >
        <table>
			<tr>
				<td><label>Name of Institution:</label></td>
				<td><input type="text" name="instaName"></td>
			</tr>
			<tr>
				<td><label>Type of Institution:</label></td>
				<td>
					<select name="instaType">
						<option value="none"></option>
						<option value="school">school</option>
						<option value="company">company</option>
					</select>
				</td>
			</tr>	
			<tr>
				<td><label>Occupation:</label></td>
				<td><input type="text" name="occupation"></td>
			</tr>
			<tr>
				<td><label>Last Name:</label></td>
				<td><input type="text" name="lastName"></td>
			</tr>
			<tr>
				<td><label>First Name:</label></td>
				<td><input type="text" name="firstName"></td>
			</tr>
			<tr>
				<td><label>Contact Number:</label></td>
				<td><input type="text" name="contactNum"></td>
			</tr>
			<tr>
				<td><label>Date of Visit:</label></td>
				<td><input name="visitDate" type="date" autocomplete="on"></td>
			</tr>
			<tr>
				<td><label>Purpose of Visit:</label></td>
				<td><textarea name="purpose"></textarea></td>
			</tr>
		</table>
			
				<!-- PHP Script -->
					<?php
				//	error_reporting(0);
				//	include("config.php") ;
				$connection = mysqli_connect("localhost","root","","loggingsystem");
					if (isset($_POST['submit'])) {
						$institution_name = $_POST['instaName'];
						$institution_type = $_POST['instaType'];
						$occupation = $_POST['occupation'];
						$last_name = $_POST['lastName'];
						$first_name = $_POST['firstName'];
						$contact_num = $_POST['contactNum'];
						$visit_date = $_POST['visitDate'];
						$purpose_visit = $_POST['purpose'];
						
						if(empty($institution_name) | empty($institution_type) | empty($occupation) | empty($last_name) | empty($first_name) | empty($contact_num)| empty($visit_date) | empty($purpose_visit)){ 
						/*	if(empty($institution_name))
								echo "Empty1";
							if( $institution_type == "none") 
								echo "Empty2";
							if(empty($occupation))
								echo "Empty3";
							if(empty($last_name))
								echo "Empty4";
							if(empty($first_name))
								echo "Empty5";
							if(empty($contact_num))
								echo "Empty6";
							if(empty($visit_date))
								echo "Empty7";
							if(empty($purpose_visit))
								echo "Empty8";
							//$msg = "Welcome $first_name $last_name so you are from $institution_name a $institution_type. We are glad that a $occupation like you visited today $visit_date because you have $purpose_visit. We will contact you next time here $contact_num. Thank You!";
							//echo $msg;
						*/
							echo "<span id = \"warning\" style=\"margin:50px; color:red; font-style:italic;	\">Fill-up all required fields(*).</span>";
						}
						else{
							//insert data to database	
  							$query1 = "INSERT INTO institution (instaname,instatype)
							VALUES ('$institution_name','$institution_type')";
							mysqli_query($connection,$query1) or
								 die('Query "' . $query1 . '" failed: ' . mysqli_error($connection));  
								 
 							$query2a = "SELECT * FROM institution";
							$result2 = mysqli_query($connection,$query2a);
							while ($query2aa = mysqli_fetch_array($result2,  MYSQLI_ASSOC)){
								 if($query2aa['instaname'] == $institution_name){
								 $res2 = $query2aa['iid'];
								 break;
								 }
							}
							$query2b = "INSERT INTO person (lname,fname,occupation,contact_num,institution_id)
							VALUES ('$last_name','$first_name','$occupation','$contact_num','$res2')";
							mysqli_query($connection,$query2b) or
								 die('Query "' . $query2b . '" failed: ' . mysqli_error($connection));	
							
						    $query3a = "SELECT * FROM person";  
							$result3 = mysqli_query($connection,$query3a);
							while ($query3aa = mysqli_fetch_array($result3,  MYSQLI_ASSOC)){
								 if($query3aa['contact_num'] == $contact_num){
								 $res3 = $query3aa['pid'];
								 break;
								 }
							}			
							$query3b = "INSERT INTO visit (date,purpose,person_id)
							VALUES ('$visit_date','$purpose_visit','$res3')";					
							mysqli_query($connection,$query3b) or
								die('Query "' . $query3b . '" failed: ' . mysqli_error($connection));							
									
						//display success message
							echo "<font color='green'>Data added successfully.";
							echo "<br/><a href='view.php'>View Result</a>";
							}
						}
					?>
					<!-- end of PHP Script -->
        <div id="func-buttons">
        	<input type="submit" name="submit" value="Submit" >
        	<input type="button" value="Clear">
        </div>

	</form>	
    </div>
	</center>
</body>
</html>
