<html>
  <head>
    <title> Add Faculty</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>‌​
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <head>
  <body>
  	<?php
	  session_start();
	   if(!isset($_SESSION['username'])){
		   header("Location:index.php");
	   }
	
	
	?>
	<table>
		  <tr ><td colspan="2"><img src="diet.png" width="100%" height="60%" alt="college header"></td></tr>
		</table >
   
	<div class="container-fluid">
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Center</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="mainpage.php">Home</a></li>
      <li ><a href="subjects.php">Add Subjects</a></li>
      <li ><a href="strength.php"> Update Class Strength</a></li>
      <li class="active"><a href="addfaculty.php">Add Faculty</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav> <center><h3> Add New Faculty</h3></center><br>
<div class="col-sm-1"></div> 	
    <div class="col-sm-6">
	
		<form action="" method="POST">
		<table border="0" align="center"  cellpadding="6" class="table">
		<tr><td align="center">Select Salutation</td>
				<td align="center">:</td>
				<td><select class="form-control" name='salt' required>
				 <option value="">Select</option>
						  <option value="Mr">Mr</option>
						  <option value="Ms">Ms</option>
						  <option value="Dr">Dr</option>						  
						  
					</select></td></tr>
			<tr><td align="center">Enter Ecap ID</td>
				<td align="center">:</td>
				<td><input type="text" class="form-control" name='ecapid' value="" required>
				</td></tr>
				<tr><td align="center">Enter Faculty Name</td>
				<td align="center">:</td>
				<td><input type="text" class="form-control" name='facultyname' value="" required>
				</td></tr>
				<tr><td align="center">Select Department</td>
				<td align="center">:</td>
				<td><select class="form-control" name='dept' required>
				 <option value="">Select</option>
						  <option value="CE">CE</option>
						  <option value="EEE">EEE</option>
						  <option value="ME">ME</option>						  
						  <option value="ECE">ECE</option>
						  <option value="CSE">CSE</option>
						  <option value="SNH">SNH</option>
					</select></td></tr>
					<tr><td colspan="3" align="center"><input type="submit" class="btn btn-success" value="Add" name="addfaculty"/></td></tr>
			</table>
			</form>
			<?php
			   if(isset($_POST['addfaculty'])){
				   $connect = mysqli_connect("localhost","root","","feedback");
				   $salt = $_POST['salt'];
				   $ecapid = $_POST['ecapid'];
				   $name = $_POST['facultyname'];
				   $dept = $_POST['dept'];
				   $facultyname = $salt.'.'.$name;
				   
				   
				   $insertquery = mysqli_query($connect,"INSERT INTO faculty VALUES('$ecapid','$facultyname','$dept' ) ");
				  if($insertquery == true){?>
				  <div class="col-md-8 col-md-offset-4">
				  <div class="alert alert-success">
							<a class="close" data-dismiss="alert" href="#">×</a>
								<center>FACULTY ADDED</center>
						</div></div>
				   <?PHP
				  }
				  else{ ?>
				  <div class="col-md-8 col-md-offset-4">
				 <div class="alert alert-danger">
							<a class="close" data-dismiss="alert" href="#">×</a>
								<center>FACULTY ALREADY EXISTS</center>
						</div></div>
						<?php
				  }
				    
			   }
			
			
			?>