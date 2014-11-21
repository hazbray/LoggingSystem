<!doctype html>
<html>
<head
<?php
	require_once dirname(__FILE__) . '/config.php';
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/datepicker.css">
<link rel="stylesheet" href="css/style.css" />	
<style>
header{ 
	background: #0c0051; /* Old browsers */
	background: -moz-linear-gradient(top,  #0c0051 1%, #252e8c 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#0c0051), color-stop(100%,#252e8c)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #0c0051 1%,#252e8c 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #0c0051 1%,#252e8c 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #0c0051 1%,#252e8c 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #0c0051 1%,#252e8c 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0c0051', endColorstr='#252e8c',GradientType=0 ); /* IE6-9 */

}
</style>

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/jqache-0.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/datepicker.js"></script>
<script>
 window.onload=function() {
   playOrPause();
   defaultRecord();
   }
   
</script>
 </head>
 <header>
	<div id="train"><a href="#"><img id="car"src="train.png"></a></div>
		<div id="building1"><img src="banner.png"></div>
        <div id="building2"><img src="banner.png"></div>
        <div id="building3"><img src="banner.png"></div>
</header><body>

<?php
require_once dirname(__FILE__) . '/config.php';
//for displaying data of this particular data

//getting id from url

$id = $_GET['id'];

	$query = "SELECT person.pid,person.lname, person.fname, person.occupation, person.contact_num,institution.iid,institution.instaname, visit.vid, visit.date, visit.purpose, visit.num_visit, visit.status FROM person,institution, visit WHERE visit.person_id = person.pid AND person.institution_id = institution.iid AND visit.vid = $id";

	$connection = mysqli_connect("localhost","root","","loggingsystem");
	
	$result = mysqli_query($connection,$query);
	while ($res = mysqli_fetch_array($result,  MYSQLI_ASSOC)){
		$institution_name = $res['instaname'];          
		$institution_id = $res['iid'];
        $occupation = $res['occupation'];
        $last_name = $res['lname'];
        $first_name = $res['fname'];
        $contact_num = $res['contact_num'];
		$visit_id = $res['vid'];
        $visit_date = $res['date'];
        $purpose_visit = $res['purpose'];
		$num_visitors =$res['num_visit'];
		$visit_status = $res['status'];

	}

?>
<body>
<a href="view.php">Home</a>
<br/><br/>
<div class="container">
    <div id="form">
    	    	<ul class="nav nav-pills" style="position:absolute;margin-left:40%">
						<li class="active"><a href="main.php">Home</a></li>
						<li class="active"><a href="signout.php">Sign Out</a></li>
 
					</ul>
	  	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal" role="form">
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="form-group">
							<label class="col-sm-6 control-label">*Name of Institution:</label>
							<div class="col-md-6">
								<select class = 'form-control' id='cbx_recent' name="instaName_1" value="<?php echo $institution_iid; ?>" >
									<option value = "def_value"></option>
								<?php
									require_once dirname(__FILE__) . '/config.php';
									//$connection = mysqli_connect("localhost","root","","loggingsystem");
									$query = "SELECT * FROM institution";
									//fetching data in descending order (lastest entry first)
									$result = mysqli_query($connection,$query);
									//manipulation of selected institution from recent institutions
									while ($res = mysqli_fetch_array($result,  MYSQLI_ASSOC)){ 
										echo '<option value="'.$res['iid'].'"' ;
										if ($res['iid'] == $institution_id) 
											echo 'selected>';
										else
											echo '>';	 
										echo $res['instaname'].'</option>';
									}                                       
								?>
									<option value="opt_new">--Enter a new one--</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label class="col-sm-6 control-label"> </label>
							<div class="col-md-6"><input type="text" class="form-control" name="instaName_2" id="txt_new" disabled></div>
						</div>
					</div>
					<div class="row">  
						<div class="form-group">
							<label class="col-sm-6 control-label">*Occupation:</label>
							<div class="col-md-6"><input type="text" class="form-control" name="occupation" value="<?php echo $occupation; ?>"></div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label class="col-sm-6 control-label">*Last Name:</label>
							<div class="col-md-6"><input type="text" class="form-control" name="lastName" value="<?php echo $last_name; ?>"></div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label class="col-sm-6 control-label">*First Name:</label>
							<div class="col-md-6"><input type="text" class="form-control" name="firstName" value="<?php echo $first_name; ?>"></div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-sm-6 control-label">*Contact Number:</label>
						<div class="col-md-6"><input type="text" class="form-control" name="contactNum" value="<?php echo $contact_num; ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-6 control-label">*Date of Visit:</label>
						<div class="col-md-6"><input class="form-control" name="visitDate" type="date" autocomplete="on" value="<?php echo $visit_date; ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-6 control-label">*Purpose of Visit:</label>
						<div class="col-md-6"><textarea name="purpose" class="form-control" rows="3"><?php echo $purpose_visit ?></textarea></div>
					</div>
					<div class="form-group">
						<label class="col-sm-6 control-label">*Number of Visitors:</label>
						<div class="col-md-6"><input type="text" class="form-control" name="visitorCount" value="<?php echo $num_visitors; ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-6 control-label">*Status:</label>
						<div class="col-md-6">
							<select class="form-control" name="status">
								<option value="def_value" <?php if ($visit_status == "def_value") echo 'selected'; ?>></option>
								<option value="n/a" <?php if ($visit_status == "n/a") echo 'selected'; ?>>n/a</option>
								<option value="pending" <?php if ($visit_status == "pending") echo 'selected'; ?>>pending</option
								><option value="approved" <?php if ($visit_status == "approved") echo 'selected'; ?>>approved</option>
							 </select>
						</div>
					</div>
				</div>
			</div>
			<?php
			  if (isset($_POST['update'])) {
							if ( $_POST['instaName_1'] == "opt_new")
                           		 $institution_name = strtoupper($_POST['instaName_2']);
							else 
								 $institution_name = strtoupper($_POST['instaName_1']);
                           
						    
                            $occupation = strtolower($_POST['occupation']);
                            $last_name = strtolower($_POST['lastName']);
                            $first_name = strtolower($_POST['firstName']);
                            $contact_num = $_POST['contactNum'];
                            $visit_date = $_POST['visitDate'];
                            $purpose_visit = strtolower($_POST['purpose']);
							$num_visitors = $_POST['visitorCount'];
							$status = $_POST['status'];
							$res2 = null;
                            
                            if( $institution_name == "def_value"  | empty($occupation) | empty($last_name) | empty($first_name) | empty($contact_num)| empty($visit_date) | empty($purpose_visit) | empty($num_visitors) | $status == "def_value" | ($_POST['instaName_1'] == "opt_new" & $institution_name == null | $institution_name == ' ')) {
                                echo "<script>
										alert('Fill-up all required fields(*)')
										window.location.href = 'view.php'
										</script>";
							}
                            else{
                                //insert data to database	
									if ( $_POST['instaName_1'] == "opt_new"){
										 $query1 = "INSERT INTO institution (instaname) VALUES ('$institution_name')";
										  mysqli_query($connection,$query1);
									}
									$query2a = "SELECT * FROM institution";
									$result2 = mysqli_query($connection,$query2a);
									while ($query2aa = mysqli_fetch_array($result2,  MYSQLI_ASSOC)){
										if($query2aa['iid'] == $institution_name | $query2aa['instaname'] == $institution_name){
											$res2 = $query2aa['iid'];
											break;
											 }
									}	
									$query3a = "SELECT * FROM person";  
									$result3 = mysqli_query($connection,$query3a);
									while ($query3aa = mysqli_fetch_array($result3,  MYSQLI_ASSOC)){
										 if($query3aa['contact_num'] == $contact_num){
										 $res3 = $query3aa['pid'];
										 break;
										 }
									}	
									$query4a = "UPDATE person SET lname='$last_name', fname='$first_name',occupation='$occupation',institution_id=$res2 WHERE pid=$res3";
									mysqli_query($connection,$query4a) or
										 die('Query "' . $query4a . '" failed: ' . mysqli_error($connection));	
									
		
									$query5a = "UPDATE visit SET date='$visit_date',purpose='$purpose_visit',person_id=$res3,num_visit=$num_visitors, status='$status' WHERE person_id=$res3";
									mysqli_query($connection,$query5a) or
										die('Query "' . $query5a . '" failed: ' . mysqli_error($connection));							
											
                            //display success message
                                echo "<font color='green'>Data added successfully.";									
								echo "<script>window.location.href = 'view.php'</script>";
									
                                }
                            }
                        ?>
                        <!-- end of PHP Script -->
			<div id="func-buttons">
                        <input type="submit" name="update" value="Update" class="btn btn-success" id="btn_update" >
			<a href="view.php" class="btn btn-primary">Cancel</a>
                        <input type="reset" value="Clear" class="btn btn-danger" id="btn_clear">

            </div>
		</form>
	</div>
</div>
	
</body>
</html>