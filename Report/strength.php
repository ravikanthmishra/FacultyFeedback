<html>
  <head>
    <title> Update Class Strength </title>
	 <link rel="stylesheet" href="bootstrap.css">
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
      <li class="active"><a href="strength.php"> Update Class Strength</a></li>
      <li><a href="addfaculty.php">Add Faculty</a></li>
    </ul>
		<ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
<h3><center> Update Class Strength</h3></center><br>
<div class="col-sm-1"></div> 	
    <div class="col-sm-6">.<form action="" method="POST">
		<table border="0" align="center"  cellpadding="6" class="table">
			<tr><td align="center">Batch</td>
				<td align="center">:</td>
				<td><select class="form-control" name='batch' required>
				 <option value="">Select</option>
						  <option value="2014">2014</option>
						  <option value="2015">2015</option>
						  <option value="2016">2016</option>
						  <option value="2017">2017</option>
					<select></td></tr>
					<tr><td align="center">Elective</td>
				<td align="center">:</td>
				<td><select class="form-control" name='elective' required>
				 <option value="">Select</option>
						  <option value="0">0</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
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
			<tr><td align="center">Section</td>
				<td align="center">:</td>
				<td><select class="form-control" name='sec' required>
				 <option value="">Select</option>
						  <option value="A">A</option>
						  <option value="B">B</option>
					</select></td></tr>
					<tr><td align="center">Strength</td>
				<td align="center">:</td>
				<td><input type="text" class="form-control" name='strength' value="" required>
				</td></tr>
			<tr><td colspan="3" align="center"><input type="submit" class="btn btn-success" value="Add New Strength" name="addclass"/></td>
			<td colspan="3" align="center"><input type="submit" class="btn btn-success" value="Update" name="update"/></td></tr>
			
		</table>
		</form>
	
	    <?php
		  if(isset($_POST['update'])){
			 
			  $connect = mysqli_connect("localhost","root","","feedback");
			   $batch = $_POST['batch'];
			    $dept = $_POST['dept'];
			  $sec = $_POST['sec'];
			  $strength = $_POST['strength'];
			  $elective = $_POST['elective'];
			  $searchquery = mysqli_query($connect," SELECT * FROM students_count WHERE   department='$dept' AND  batch=$batch AND sec='$sec' AND elective=$elective ") or die(mysqli_error($connect));
			  if(mysqli_num_rows($searchquery) == 0){ ?>
				  <div class="col-md-8 col-md-offset-4">
						<div class="alert alert-danger">
							<a class="close" data-dismiss="alert" href="#">×</a>
								STUDENTS COUNT NOT OBTAINED PLEASE SELECT ADD OPTION
						</div></div><?php
			  }
			  $updatequery = mysqli_query($connect,"update students_count set strength = $strength WHERE batch=$batch AND department='$dept' AND sec='$sec' AND elective=$elective ") or die(mysqli_error($connect));
				if($updatequery ==  true) { ?>
				    <div class="col-md-8 col-md-offset-4">
						<div class="alert alert-success">
							<a class="close" data-dismiss="alert" href="#">×</a>
								STRENGTH UPDATED 
						</div></div><?php
				}
	  }
		  if(isset($_POST['addclass'])){
			 
			  $connect = mysqli_connect("localhost","root","","feedback");
			   $batch = $_POST['batch'];
			    $dept = $_POST['dept'];
			  $sec = $_POST['sec'];
			  $strength = $_POST['strength'];
			  $searchquery = mysqli_query($connect," SELECT * FROM students_count WHERE   department='$dept' AND  batch=$batch AND sec='$sec' AND elective=$elective") or die(mysqli_error($connect));
				  if(mysqli_num_rows($searchquery) > 0){?>
				     <center><div class="col-md-8 col-md-offset-4">
						<div class="alert alert-danger">
							<a class="close" data-dismiss="alert" href="#">×</a>
								<center>CLASS ALREADY ADDED PLEASE SELECT UPDATE OPTION</center>
						</div></div></center>
						<?php
				  }
					else{
				  
			  $insertquery = mysqli_query($connect,"INSERT INTO students_count VALUES('$dept',$batch,'$sec',$strength,$elective ) ") or die(mysqli_error($connect));
				if($insertquery ==  true) { ?>
				    <div class="col-md-8 col-md-offset-4">
						<div class="alert alert-success">
							<a class="close" data-dismiss="alert" href="#">×</a>
								NEW CLASS WITH GIVEN STRENGTH ADDED 
						</div></div><?php
				}
				}
	  }
		  
		
		
		?>
	    </div>
	  </body>
	  
	  </html>
	  
	  