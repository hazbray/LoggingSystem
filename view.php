<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script>
$(document).ready(function(){
  $("#search").click(function(){
	var val =  $("#search").val();
	$("#search_box").prop("type","text");
	if(val != "def_search"){
		if(val == "dv_search")
			$("#search_box").prop("type","date");
	    $("#search_box").prop("disabled",false);
		 }
	else{
		$("#search_box").prop("disabled",true);
		$("#search_box").val("");
	}
  });
  
   /* $("#sort").click(function(){
	var val =  $("#sort").val();
	if(val != "def_sort")
		if(val != "def_sort")
		  
		 }
	else{
		$("#search_box").prop("disabled",true);
		$("#search_box").val("");
		
	}
  });*/
});
</script>
<body>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="form1" id="form1" >
	<label>Search:</label>
	<select id="search">
		<option value="def_search">-----------</option>
		<option value="ln_search">Last Name</option>
		<option value="fn_search">First Name</option>
		<option value="in_search">Institution Name</option>
		<option value="dv_search">Date of Visit</option>
	</select>
	<input type="text" disabled="true" id="search_box"/>
	<label>Sort by:</label>
	<select id="sort" name="sort">
		<option value="def_sort">-----------</option>
		<option value="vn_sort">Name of Visitor</option>
		<option value="in_sort">Institution Name</option>
		<option value="dv_sort">Date of Visit</option>
	</select>
	<input type="submit" name="go" value="Go"/>
	<br/>
	</form>

	<?php
		$queryA = "SELECT person.pid,person.lname, person.fname, person.occupation, institution.instaname, visit.date, visit.purpose FROM  person,institution, visit WHERE visit.person_id = person.pid AND person.institution_id = institution.iid ORDER BY ";
		$queryB = null;
		$query = null;
		$sort_value = null;
		//concatenation of query depending on type of sort
		if(isset($_POST['sort'])){
		  $sort_value = $_POST['sort'];
			if($sort_value == "def_sort"){
				$queryB = "visit.date DESC";
				$query = $queryA . $queryB;
				}
			else if($sort_value == "vn_sort"){
				$queryB = "person.lname ASC";
				$query = $queryA . $queryB;
				}
			else if($sort_value == "in_sort"){
				$queryB = "institution.instaname ASC";
				$query = $queryA . $queryB;
				}
			else{
				$queryB = "visit.date DESC";
				$query = $queryA . $queryB;
				}
		}
		else 
			$query = "SELECT person.pid,person.lname, person.fname, person.occupation, institution.instaname, visit.date, visit.purpose FROM  person,institution, visit WHERE visit.person_id = person.pid AND person.institution_id = institution.iid ORDER BY visit.date DESC";
		
		
	?>
<?php 
	echo "<table width='95%' border=1>";

	echo "<tr bgcolor='yellow'>";

	echo "<td align='center'>  <font color='RED' size=4> Last Name </font> </td>";
	echo "<td align='center'> <font color='BLUE' size=4> First Name </font> </td>";
	echo "<td align='center'> <font color='Green' size=4> Occupation </font></td>";
	echo "<td align='center'> <font color='Magenta' size=4> Institution Name </font></td>";
	echo "<td align='center'> <font color='Purple' size=4> Date of Visit </font></td>";
	echo "<td align='center'> <font color='Brown' size=4> Purpose of Visit </font></td>";
	echo "</tr>";

	
	$connection = mysqli_connect("localhost","root","","loggingsystem");
		
	//fetching data in descending order (lastest entry first)
	$result = mysqli_query($connection,$query);
	while ($res = mysqli_fetch_array($result,  MYSQLI_ASSOC)){
	 	echo "<tr>";
		echo "<td align='center'>".$res['lname']."</td>";
		echo "<td align='center'>".$res['fname']."</td>";
		echo "<td align='center'>".$res['occupation']."</td>";
		echo "<td align='center'>".$res['instaname']."</td>";
		echo "<td align='center'>".$res['date']."</td>";
		echo "<td align='center'>".$res['purpose']."</td>";	
		//echo "<td align='center'>".$res['pid']."</td>";	
		echo "<td><a href=\"delete.php?id=$res[pid]\">Delete</a></td></tr>";
	
	}			
?>
</body>
</html>