<html>
  <head>
    <title>Add subjects Page</title>
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
		</table>
    
	<div class="container-fluid">
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Center</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="mainpage.php">Home</a></li>
      <li class="active"><a href="subjects.php">Add Subjects</a></li>
      <li><a href="strength.php">Update Class Strength</a></li>
      <li><a href="addfaculty.php">Add Faculty</a></li>
	  </ul>
	  	<ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"> Logout</a></li>
    </ul>
    </ul>
  </div>
</nav>
<center><h3> Add Subjects</h3></center><br>
<div class="col-sm-1"></div> 	
    <div class="col-sm-6">
	
		<form action="" method="POST">
		<table border="0" align="center"  cellpadding="6" class="table">
			<tr><td align="center">Enter Faculty Ecap ID</td>
				<td align="center">:</td>
				<td><input type="text" class="form-control" name='ecapid' value="" required>
				</td></tr>
				<tr><td align="center">Select Salutation</td>
				<td align="center">:</td>
				<td><select class="form-control" name='salt' required>
				 <option value="">Select</option>
						  <option value="Mr">Mr</option>
						  <option value="Ms">Ms</option>
						  <option value="Dr">Dr</option>						  
						  
					</select></td></tr>
				<tr><td align="center">Enter Faculty Name</td>
				<td align="center">:</td>
				<td><input type="text" class="form-control" name='facultyname' value="" required>
				</td></tr>
				<tr><td align="center">Enter Subject Name</td>
				<td align="center">:</td>
				<td><input type="text" class="form-control" name='subname' value="" required>
				</td></tr>
				<tr><td align="center">Subject type</td>
				<td align="center">:</td>
				<td><select class="form-control" name='subtype' required>
				 <option value="">Select</option>
						  <option value="L">LAB</option>
						  <option value="T">THEORY</option>
					</select></td></tr>
			<tr><td align="center">Batch</td>
				<td align="center">:</td>
				<td><select class="form-control" name='batch' required>
				 <option value="">Select</option>
						  <option value="2014">2014</option>
						  <option value="2015">2015</option>
						  <option value="2016">2016</option>
						  <option value="2017">2017</option>
					<select></td></tr>
			<tr><td align="center">Branch</td>
				<td align="center">:</td>
				<td><select class="form-control" name='dept' required>
				 <option value="">Select</option>
						  <option value="CE">CE</option>
						  <option value="EEE">EEE</option>
						  <option value="ME">ME</option>						  
						  <option value="ECE">ECE</option>
						  <option value="CSE">CSE</option>
					</select></td></tr>
			<tr><td align="center">Year</td>
				<td align="center">:</td>
				<td><select class="form-control" name='year' required>
				 <option value="">Select</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
					</select></td></tr>
			<tr><td align="center">Semester</td>
				<td align="center">:</td>
				<td><select class="form-control" name='sem' required>
				 <option value="">Select</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
					</select></td></tr>
			<tr><td align="center">Section</td>
				<td align="center">:</td>
				<td><select class="form-control" name='sec' required>
				 <option value="">Select</option>
						  <option value="a">A</option>
						  <option value="b">B</option>
					</select></td></tr>
			
			<tr><td colspan="3" align="center"><input type="submit" class="btn btn-success" value="submit" name="addsubjects"/></td></tr>
			
		</table>
		</form>
	
	  <?php
	      if(isset($_POST['addsubjects'])){
			  $dept = $_POST['dept'];
			  $sec = $_POST['sec'];
			  if($dept == 'EEE' && $sec != 'a'){ ?>
				  	<div class="col-md-8 col-md-offset-4">
						<div class="alert alert-danger">
							<a class="close" data-dismiss="alert" href="#">×</a>
								EEE doesn't have B sec
						</div></div>
						<?php		  
			  }
			  else{
				  $connect = mysqli_connect("localhost","root","","feedback");
				  
				  $salt = $_POST['salt'];
				  $name = $_POST['facultyname'];
				  $subname = $_POST['subname'];
				  $batch = $_POST['batch'];
				  $ecapid = $_POST['ecapid'];
				  $year = $_POST['year'];
				  $sem = $_POST['sem'];
				  $subtype = $_POST['subtype'];
				  $facultyname = $salt.'.'.$name;
				  
				  
				  if( $subtype == 'T'){
				  $searchquery = mysqli_query($connect," SELECT * FROM faculty_teach WHERE  id='$ecapid' AND name='$facultyname' AND dept='$dept' AND year=$year AND sem=$sem AND subject='$subname' AND batch=$batch AND sec='$sec'") or die(mysqli_error($connect));
				  if(mysqli_num_rows($searchquery) > 0){ ?>
					  <div class="col-md-8 col-md-offset-4">
						<div class="alert alert-danger">
							<a class="close" data-dismiss="alert" href="#">×</a>
								SUBJECT ALREADY ENTERED
						</div></div> <?php
				  }
				  else{
					  
					  $insertquery = mysqli_query($connect," INSERT INTO faculty_teach VALUES('$ecapid','$facultyname','$dept',$year,$sem,'btech','$subname',$batch,'$sec') ") or die(mysqli_error($connect));
				       if($insertquery ==  true){ ?>
						  <div class="col-md-8 col-md-offset-4">
						<div class="alert alert-success">
							<a class="close" data-dismiss="alert" href="#">×</a>
								 SUBJECT ENTERED
						</div></div><?PHP
				  }
			  }
				  }
			  else{
				  $searchquery = mysqli_query($connect," SELECT * FROM faculty_lab WHERE  id='$ecapid' AND name='$facultyname' AND dept='$dept' AND year=$year AND sem=$sem AND lab='$subname' AND batch=$batch AND sec='$sec'") or die(mysqli_error($connect));
				  if(mysqli_num_rows($searchquery) > 0){ ?>
					  <div class="col-md-8 col-md-offset-4">
						<div class="alert alert-danger">
							<a class="close" data-dismiss="alert" href="#">×</a>
								LAB ALREADY ENTERED
						</div></div> <?php
				  }
				  else{
					  
					  $insertquery = mysqli_query($connect," INSERT INTO faculty_lab VALUES('$ecapid','$facultyname','$dept',$year,$sem,'btech','$subname',$batch,'$sec') ") or die(mysqli_error($connect));
					  if($insertquery ==  true){ ?>
						  <div class="col-md-8 col-md-offset-4">
						<div class="alert alert-success">
							<a class="close" data-dismiss="alert" href="#">×</a>
								LAB SUBJECT ENTERED
						</div></div><?PHP
						
					  }
				  }
			  }
		
		  }
		  }
			 	  ?>
	<script type="text/javascript">
	
  </div>
</body>
</html>