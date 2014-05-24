<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
//including the database connection file
//include_once("config.php");
$connection = mysqli_connect("localhost","root","","loggingsystem");
if(isset($_POST['update']))
{
	//here the id that we post is the same id that we get from url
	//id indicates the id of this data which we are editing
	//id is unique and a particular id is associated with particular data	
	
	$id = $_POST['pid'];
	
	$name=$_POST['name'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$civil=$_POST['civil'];
	$email=$_POST['email'];  
	
			
	//updating the table
		 $query = "UPDATE users SET name='$name' , age='$age',
		                gender='$gender' , civil='$civil',
					     email='$email' WHERE id=$id";
 
mysql_query($query) or
 die('Query "' . $query . '" failed: ' . mysql_error());  
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	
}
?>
<?php
//for displaying data of this particular data

//getting id from url

$id = $_GET['id'];

//selecting data associated with this particular id
$result=mysql_query("select * from users where id=$id");

while($res=mysql_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$gender=$res['gender'];
	$civil=$res['civil'];
	$email = $res['email'];
}
?>
<html>
<title>Edit Data</title>
<body>
<a href="view.php">Home</a>
<br/><br/>
<form name="form1" method="post" action="edit.php">
<table border="0">
   <tr> 
    <td>Name</td>
    <td>
        <input type="text" name="name" value=<?php echo $name;?> size="50">  </td>
  </tr>
  <tr> 
      <td>Gender</td>
      <td>
	<input type="text" name="gender"  value="<?php echo $gender; ?>">
  
      </td>
    </tr>

	<tr> 
<td>Civil Status </td>      
       <td >
      <input type="text" name="civil"  value="<?php echo $civil; ?>">
      </td>
    </tr>

  
  <tr> 
    <td>Age</td>
    <td>
        <input type="text" name="age" value=<?php echo $age;?> size="3">     </td>
  </tr>
  
<tr> 
    <td>Email</td>
    <td>
        <input type="text" name="email" value=<?php echo $email;?> size="50"> 
		</td>
  </tr>
<tr>
    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>>    </td>
    <td><input type="submit" name="update" value="Update"></td>
  </tr>
</table>
</form>
</body>
</html>