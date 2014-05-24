<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Record</title>
</head>

<body>
<h2>Record Test</h2>
<?php
$institution_name = $_POST['instaName'];
$institution_type = $_POST['instaType'];
$occupation = $_POST['occupation'];
$last_name = $_POST['lastName'];
$first_name = $_POST['firstName'];
$contact_num = $_POST['contactNum'];
$visit_date = $_POST['visitDate'];
$purpose_visit = $_POST['purpose'];

//will create more echoes if this format is done.
/*echo 'Thanks for submitting the form ' . $first_name .' ' .$last_name .'. <br>';*/

//double quote is needed to make this type of format work
$msg = "Welcome $first_name $last_name so you are from $institution_name a $institution_type. We are glad that a $occupation like you visited today $visit_date because you have $purpose_visit. We will contact you next time here $contact_num. Thank You!";
echo $msg;

/*$to = 'hazbray@yahoo.com';
$from = 'hazbray@gmail.com';
$subject = 'Hi there';
mail($to, $subject, $msg);*/
?>
</body>
</html>