<html>
  <head>
    <title> ::Feedback ::</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	  .thq{
		  padding: 10px;
		  width: 150px;
		 
	  }
	  </style>
  </head>

    <body>	<br>
	<?php
	
	ob_start();
	  session_start();
	   if(!isset($_SESSION['username'])){
		   header("Location:index.php");
	   }
	
	$username = $_SESSION['username'];
	?>
	 <table >
		  <tr ><th colspan="2"><img src="diet.png" width="100%" height="60%" alt="college header"></th></tr>
		</table >
		
		<div class="container-fluid">
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Center</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="mainpage.php">Home</a></li>
	  <?php
	    if($username == 'principal'){ ?>
	  <li  class="active"><a href="collegereport.php">Overall Reports</a></li>
	  <?php
		}
	  ?>
	   <?php
	    if($username != 'principal'){ ?>
      <li><a href="subjects.php">Add Subjects</a></li>
      <li><a href="strength.php">Update Class Strength</a></li>
      <li><a href="addfaculty.php">Add Faculty</a></li>
	  <?php
		}
		?>
    </ul>
		<ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"> Logout</a></li>
    </ul>
  </div>
</nav>
<h3 align="center" >Dhanekula Feedback Reports Portal</h3><br>
		<div class="col-sm-2">
		 </div>
		 <div class="col-sm-9 ">
		 <center><p style="text-decoration:underline"><b> Overall Theory Reports</b></p></center>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Batch</th>
						<th>Dept</th>
						<th>Year</th>
						<th>Sem</th>
						<th>Sec</th>
						<th>Sub Name</th>
						<th>%</th>
						<th>Date</th>
					</tr>
					<?php
					$connect = mysqli_connect("localhost","root","","feedback") or die("cannot connect");
					$query = mysqli_query($connect,"SELECT * FROM overallreport ORDER BY per desc") or mysqli_error($connect);
					while($row = mysqli_fetch_array($query)){
				?>
					<tr>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['batch']; ?></td>
						<td><?php echo $row['branch']; ?></td>
						<td><?php echo $row['year']; ?></td>
						<td><?php echo $row['sem']; ?></td>
						<td><?php echo $row['sec']; ?></td>
						<td><?php echo $row['subject']; ?></td>
						<td><?php echo round($row['per'],2); ?></td>
						<td><?php echo $row['date']; ?></td>
					</tr>
					<?php
					}
					?>
				</table>
				 <center><p style="text-decoration:underline"><b> Overall Lab Reports</b></p></center>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Batch</th>
						<th>Dept</th>
						<th>Year</th>
						<th>Sem</th>
						<th>Sec</th>
						<th>Sub Name</th>
						<th>%</th>
						<th>Date</th>
					</tr>
					<?php
					$connect = mysqli_connect("localhost","root","","feedback") or die("cannot connect");
					$query = mysqli_query($connect,"SELECT * FROM overallreport_lab ORDER BY per ASC") or mysqli_error($connect);
					while($row = mysqli_fetch_array($query)){
				?>
					<tr>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['batch']; ?></td>
						<td><?php echo $row['branch']; ?></td>
						<td><?php echo $row['year']; ?></td>
						<td><?php echo $row['sem']; ?></td>
						<td><?php echo $row['sec']; ?></td>
						<td><?php echo $row['lab']; ?></td>
						<td><?php echo round($row['per'],2); ?></td>
						<td><?php echo $row['date']; ?></td>
					</tr>
					<?php
					}
					?>
				</table>
				
			</div>
			</body>