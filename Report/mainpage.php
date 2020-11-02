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
		  width: 150px;
		 
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
      <li class="active"><a href="#">Home</a></li>
	  <?php
	    if($username == 'principal'){ ?>
	 <li><a href="subjectwiseavgreport.php">Subject Wise Reports</a></li>
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
      
	  <li><a href="passcode.php">Generate Passcode</a></li>
	   <li><a href="semwisereport.php">Sem Wise Report</a></li>
	  <?php
		}
		?>
    </ul>
		<ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"> Logout</a></li>
    </ul>
  </div>
</nav>
<?php
	if(!isset($_GET['run']))
		$choice = '';
	else{
		$choice = $_GET['run'];
		switch($choice){
		case 'passcodeGenerate' : passcodeGenerate($connect);
								  break;
		}
	}

?>


<h3 align="center" >Dhanekula Feedback Reports Portal</h3><br>
		
		<div class="col-sm-3">
		 </div>
		 <div class="col-sm-5 ">
		<form action="" method="POST" autocomplete="off">
		<table cellpadding="6" class="">
			
			<tr><td class = "tdq" align="center"><b>Batch</b></td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='batch' id="batch" required>
						  <option value="">Select</option>
						  <option value="2015">2015</option>
						  <option value="2016">2016</option>
						  <option value="2017">2017</option>
						  <option value="2018">2018</option>
					</select></td></tr>
					<?php
					    if($_SESSION['usertype'] == 0){ ?>
			<tr><td class = "tdq" align="center"><b>Branch</b></td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='dept' id="dept" required>
						<option value="">Select</option>
						  <option value="CE">CE</option>
						  <option value="EEE">EEE</option>
						  <option value="ME">ME</option>						  
						  <option value="ECE">ECE</option>
						  <option value="CSE">CSE</option>
					</select></td></tr>
					<tr><td class = "tdq" align="center"><b>Year</b></td>
				<td  class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='year' id="year" required>
						<option value="">Select</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
					</select></td></tr>
					<?php
						}
					?>
						<?php
					    if($_SESSION['usertype'] == 1){ ?>
			<tr><td class = "tdq" align="center"><b>Branch</b></td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><input type="text" class="form-control" name='dept' id="dept" value="CE" readonly>
						</td></tr>
			<tr><td class = "tdq" align="center"><b>Year</b></td>
				<td  class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='year' id="year" required>
						<option value="">Select</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
					</select></td></tr>
					<?php
						}
					?>
					<?php
					    if($_SESSION['usertype'] == 2){ ?>
			<tr><td class = "tdq" align="center"><b>Branch</b></td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><input type="text" class="form-control" name='dept' id="dept" value="EEE" readonly>
						</td></tr>
						<tr><td class = "tdq" align="center"><b>Year</b></td>
				<td  class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='year' id="year" required>
						<option value="">Select</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
					</select></td></tr>
					<?php
						}
					?>
					<?php
					    if($_SESSION['usertype'] == 3){ ?>
			<tr><td class = "tdq" align="center"><b>Branch</b></td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><input type="text" class="form-control" name='dept' id="dept" value="ME" readonly>
						</td></tr>
						<tr><td class = "tdq" align="center"><b>Year</b></td>
				<td  class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='year' id="year" required>
						<option value="">Select</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
					</select></td></tr>
					<?php
						}
					?>
					<?php
					    if($_SESSION['usertype'] == 4){ ?>
			<tr><td class = "tdq" align="center"><b>Branch</b></td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><input type="text" class="form-control" name='dept' id="dept" value="ECE" readonly>
						</td></tr>
						<tr><td class = "tdq" align="center"><b>Year</b></td>
				<td  class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='year' id="year" required>
						<option value="">Select</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
					</select></td></tr>
					<?php
						}
					?>
					<?php
					    if($_SESSION['usertype'] == 5){ ?>
			<tr><td class = "tdq" align="center"><b>Branch</b></td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><input type="text" class="form-control" name='dept' id="dept" value="CSE" readonly>
						</td></tr>
						<tr><td class = "tdq" align="center"><b>Year</b></td>
				<td  class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='year' id="year" required>
						<option value="">Select</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
					</select></td></tr>
					<?php
						}
					?>
			
					<?php if($_SESSION['usertype'] == 6){ ?>
					
						<tr><td class = "tdq" align="center"><b>Branch</b></td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='dept' id="dept" required>
						<option value="">Select</option>
						  <option value="CE">CE</option>
						  <option value="EEE">EEE</option>
						  <option value="ME">ME</option>						  
						  <option value="ECE">ECE</option>
						  <option value="CSE">CSE</option>
					</select></td></tr>
					<tr><td class = "tdq" align="center"><b>Year</b></td>
				<td  class = "tdq" align="center">:</td>
				<td class = "tdq"><input type="text" class="form-control" name='year' id="year" value="1" required>
						</td></tr><?php
					}?>
			<tr><td class = "tdq" align="center"><b>Semester</b></td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='sem' id="sem" required>
						<option value="">Select</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
					</select></td></tr>	
					<tr><td class = "tdq" align="center"><b>Section</b></td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='sec' id="sec" required>
						  <option value="">Select</option>
						  <option value="A">A</option>
						  <option value="B">B</option>
					</select></td></tr>
					<tr><td class = "tdq" align="center"><b>Elective</b></td>
				<td align="center">:</td>
				<td class = "tdq" ><select class="form-control" id="elec" name='elec' required>   
						<option value="0">0</option>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>

				</select></td></tr>
			<tr><td class = "tdq" align="center"><b>Date</b></td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><select name="date" id="date" class="form-control" required >
					</select>
				</td></tr>	
							
			<tr><td colspan="3" align="center"><input type="submit" class="btn btn-success" value="submit" name="submit"/></td></tr>
		</table>
		</form>
		</div>
		</div>
		
		<?php
		if(isset($_POST['submit'])){
			//session_start();
			
			$batch = $_POST['batch'];
			$year = $_POST['year'];
			$sem = $_POST['sem'];
			$dept = $_POST['dept'];
			$sec = $_POST['sec'];
			$date = $_POST['date'];
			$elective = $_POST['elec'];
			  
		    $connect = mysqli_connect("localhost","root","","feedback");
			/*$query = mysqli_query($connect, "SELECT * FROM regulation WHERE batch=$batch AND regulation='$reg'") or mysqli_error($connect);
			if( mysqli_num_rows($query) == 1){
				$rollquery = mysqli_query($connect," SELECT * FROM coo_reports WHERE rollno='$rollno' ") or mysqli_error($connect);
				if(mysqli_num_rows($rollquery) > 0){?>
					<div class="col-md-6 col-md-offset-3">
						<div class="alert alert-danger">
							<a class="close" data-dismiss="alert" href="#">×</a>
							student with given Roll number had already submitted
						</div></div>
				<?php*/
				
				//else{
				
				$_SESSION['batch'] = $batch;
				
				$_SESSION['year'] = $year;
				$_SESSION['sem'] = $sem;
				$_SESSION['sec'] = $sec;
				$_SESSION['dept'] = $dept;
				$_SESSION['date'] = $date;
				$_SESSION['elective'] = $elective;
				
	
				header("Location:Agrigate_theory.php");
			}

if(isset($_POST['dept']) && isset($_POST['batch'])){
	//echo '<script>window.alert("enterd");</script>';
  $connect = mysqli_connect("localhost","root","","feedback") or die("cannot connect");;
  $batch = $_POST['batch'];
  $dept = $_POST['dept'];
  $sec = $_POST['sec'];
  $sem = $_POST['sem'];
  $year = $_POST['year'];
  $elective = $_POST['elec'];
  //echo '<script>window.alert('.$dept.');</script>';
  $output1='';
  	  $datelist = mysqli_query($connect,"SELECT DISTINCT(date) FROM feedbackreport_theory WHERE batch = $batch AND dept = '$dept'  AND year=$year AND sem=$sem AND sec='$sec' AND elective=$elective ") or die(mysqli_error($connect));
 
  $output1 = '<option value=""> Select Date</option>';
	  while($row = mysqli_fetch_array($datelist)){
		  $output1.= '<option value="'.$row['date'].'">'.$row["date"].'</option>'; 
		  
	  }
  echo $output1;
}

 function passcodeGenerate($connect){ ?>
	<div class="col-sm-3">
		 </div>
		 <div class="col-sm-5 ">
		 <form name="passcodeForm" method="POST" action="">
			<?php
			  $fetchpassquery = mysqli_query($connect,"SELECT passcode FROM passcode") or die("passcode error");
			  $fetchpass = mysqli_fetch_array($fetchpassquery);
			  ?>
			<input type="text" name="prepass" value="<?php echo $fetchpass[0]; ?>" class="form-control" />
			<input type="submit" name="generate" value="Generate New Passcode" class="btn btn-success" />
		 </form>
		 </div><?php
 }
 if(isset($_POST['generate'])){
	 $newcode = mt_rand(6,7);
	 $updatequery = mysqli_query($connect,"UPDATE passcode SET passcode=$newcode ") or die("updatequery error");
	 echo '<script> alert("Updated Passcode is '.$newcode.'");</script>';
 }
	 
 
		?>
		<script src="jquery.js"></script>
   <script type="text/javascript">
   
  $(document).ready(function(){
	$('#batch,#dept,#sec,#year,#sem,#elec').on('change',function(){
		var dept = document.getElementById("dept").value;
		var batch = document.getElementById("batch").value;
		var sec = document.getElementById("sec").value;
		var sem = document.getElementById("sem").value;
		var year = document.getElementById("year").value;
		var elec = document.getElementById("elec").value;
		
		if( dept != '' && batch != '' && sec != '' && sem != '' && year != '' && elec != ''){
			
		$.ajax({
			url : "",
			method : "POST",
			data : {dept:dept,batch:batch,year:year,sec:sec,sem:sem,elec:elec},
			dataType : "text",
			success : function(data){
				$("#date").html(data);
			}
		});
		}
		
	});
});


 /*$(document).ready(function(){
	$('#elec').on('change',function(){
		var dept = document.getElementById("dept").value;
		var batch = document.getElementById("batch").value;
		var sec = document.getElementById("sec").value;
		var sem = document.getElementById("sem").value;
		var year = document.getElementById("year").value;
		var elec = document.getElementById("elec").value;
		
		if( dept != '' && batch != '' && sec != '' && sem != '' && year != '' && elec != '' ){
			
		$.ajax({
			url : "",
			method : "POST",
			data : {dept:dept,batch:batch,year:year,sec:sec,sem:sem,elec:elec},
			dataType : "text",
			success : function(data){
				$("#date").html(data);
			}
		});
		}
		
	});
}); */
</script>
  </body>
 
</html>