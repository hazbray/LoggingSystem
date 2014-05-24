<?php
	//	error_reporting(0);
		if (isset($_POST['submit'])) {
			include_once("config.php");
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
				echo "<span id = \"warning\" style=\"margin:50px; color:red; 	\">Fill-up all required fields(*).</span>";
			}
		}
?>