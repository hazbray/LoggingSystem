<!doctype html>
<html>
<head>
<?php require_once dirname(__FILE__) . '/config.php'; ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>View Table</title>

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
<script type="text/javascript" src="js/viewScript.js"></script>
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
</header>

<body>
    <div class="container">
      <div id="margin1">
		<form method="post" class="form-horizontal" role="form">
					<div class="form-group"><br/>
						<div class="col-md-1"><label>Search by:</label></div>
						<div class="col-md-2">
							<select class="form-control" name="search" id="search" onChange="defaultRecord()">
							 <option value="default"></option>
							 <option value="ln_search">Last Name</option>
							 <option value="fn_search">First Name</option>
							 <option value="in_search">Institution Name</option>
							 <option value="dv_search">Date of Visit</option>
							</select>
						</div>
						<div class="col-md-2"> 
							<input type="text" class="form-control" disabled="true" name="search_box" id="search_box" onKeyUp="searchRecord()"/>
						</div>
			
						<div class="col-md-1"><label>Sort by:</label></div>
						<div class="col-md-2">
							<select class="form-control" name="sort" id="sort" onChange="sortRecord(this.value)">
							 <option value="default">
							 <option value="vn_sort">Name of Visitor</option>
							 <option value="in_sort">Institution Name</option>
							 <option value="dv_sort">Date of Visit</option>
							</select>
						</div>	
						<div class="pull-right">
							<ul class="nav nav-pills" id="account">
								<li class="active"><a href="main.php">Home</a></li>
								<li class="active"><a href="signout.php">Sign Out</a></li>
							</ul>
						</div>	
				  </div>
		<br/>
		</form>
		<div class='table-responsive' id='tableDisplay'>
				<!-- AJAX and PHP code goes here  :) -->
		
		</div>
	
		<div id="func-buttons">
			<a href="add.php" class="btn btn-primary" id="btn_add" >Add a new entry</a>
			<a href="#" class="btn btn-primary" id="btn_edit">Edit or Delete a record</a>
			<a href="convert.php" class="btn btn-primary" id="btn_print">Save to Excel</a>
		</div>
	</div>
</div>
</body>
</html>