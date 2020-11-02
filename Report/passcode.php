<html>
  <head>
    <title> Feedback</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	  .tdq{
		  padding: 10px;
		  width: 350px;
		 
	  }
	

	</style>
  </head>

    <body>	<br>
	<?php
	 $connect = mysqli_connect("localhost","root","","feedback") or die("cannot connect");
	
	ob_start();
	  session_start();
	   if(!isset($_SESSION['username'])){
		   header("Location:index.php");
	   }
	
	$username = $_SESSION['username'];
	?>
	 <table >
		  <tr ><td colspan="2"><img src="diet.png" width="100%" height="60%" alt="college header"></td></tr>
		</table >
		
		<div class="container-fluid">
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Center</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Home</a></li>
	  <?php
	    if($username == 'principal'){ ?>
	  <li><a href="collegereport.php">Overall Reports</a></li>
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
	  if($username == 'admin'){ ?>
	  <li class="active"><a href="passcode.php">Generate Passcode</a></li>
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
		
		<div class="col-sm-3">
		 </div>
		 <div class="col-sm-5 ">
		<form action="" method="POST" autocomplete="off">
		<table cellpadding="8" class="">
			<?php
			  $fetchpassquery = mysqli_query($connect,"SELECT passcode FROM passcode") or die("passcode error");
			  $fetchpass = mysqli_fetch_array($fetchpassquery);
			  ?>
			<tr><td class = "tdq" align="center"><b>Passcode</b></td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><input type="text"  class="form-control" name='' id="pass" value="<?php echo $fetchpass[0]; ?>" required>
			</td></tr>
							
			<tr><td colspan="3" align="center"><input type="submit" class="btn btn-success" value="Generate Passcode" name="generate"/></td></tr>
		</table>
		</form>
		</div>
		</div>
		<?php
	
 if(isset($_POST['generate'])){
	 $newcode = mt_rand(1000,9999);
	 $updatequery = mysqli_query($connect,"UPDATE passcode SET passcode=$newcode ") or die("updatequery error");
	 if($updatequery){
		 echo '<script> document.getElementById("pass").value='.$newcode.'; </script>';
	 }
 }
	 
?>
  </body>
 
</html>