<html>
	<head>
		<title>:: Feedback System:: </title>
		
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	  tr,td,table{
		  padding: 10px;
	  }
	  body{
		  background-color: 	rgb(204, 230, 255);
	  }
	  h1{
		  font-family: "Canterbury","serif";
		  color: black;
		  letter-spacing: 3px;
		  font-size: 55px;;
	  }
	td{
		font-family; "BatmanForeverAlternate";
	}
	</style>
	<script type="text/javascript">
			function preventBack(){
				window.history.forward();
			}
			setTimeout("preventBack()",0);
			window.onunload=function(){null};
			
			document.onkeydown = function (e) 
			{
				if(e.which == 9){
					return false;
				}
			}
		</script>
</head>

	<body>	<br>
	
		<h1 align="center" >Dhanekula Student Feedback System</h1><br><br>
		<div class="container">
		<div class="col-sm-7">
		 <img src="1.jpg" alt="feedback img" style="width:100%;height:90%;margin-top:-60px;"></div>
		 <div class="col-sm-5 ">
		<form action="" method="POST">
		<table border="0" align="center"  cellpadding="6" class="table">
			<tr><td align="center">Course</td>
				<td align="center">:</td>
				<td><input type="text" class="form-control" name='course' value="btech" readonly required>
						 
					</td></tr>
			<tr><td align="center">Batch</td>
				<td align="center">:</td>
				<td><select class="form-control" id="batch" name='batch' required>
				 <option value="">Select</option>
						  <option value="2014">2014</option>
						  <option value="2015">2015</option>
						  <option value="2016">2016</option>
						  <option value="2017">2017</option>
					<select></td></tr>
			<tr><td align="center">Branch</td>
				<td align="center">:</td>
				<td><select class="form-control" id="dept" name='dept' required>
				 <option value="">Select</option>
						  <option value="CE">CE</option>
						  <option value="EEE">EEE</option>
						  <option value="ME">ME</option>						  
						  <option value="ECE">ECE</option>
						  <option value="CSE">CSE</option>
					</select></td></tr>
			<tr><td align="center">Year</td>
				<td align="center">:</td>
				<td><select class="form-control" id="year" name='year' required>
				 <option value="">Select</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
					</select></td></tr>
			<tr><td align="center">Semester</td>
				<td align="center">:</td>
				<td><select class="form-control" id="sem" name='sem' required>
				 <option value="">Select</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
					</select></td></tr>
			<tr><td align="center">Section</td>
				<td align="center">:</td>
				<td><select class="form-control"  id="sec" name='sec' required>
				 <option value="">Select</option>
						  <option value="A">A</option>
						  <option value="B">B</option>
					</select></td></tr>
					<tr><td align="center">Elective</td>
				<td align="center">:</td>
				<td><select class="form-control" id="ele" name='elec' required>
				      <option value="0">0</option>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>

   				  </select></td></tr>
			
			<tr><td colspan="3" align="center"><input type="submit" class="btn btn-success" value="submit" name="submit"/></td></tr>
			
		</table>
		</form>
		
		
		<?php
		session_start();
		if(isset($_SESSION['success'])){
		 header("Location:success.php");
	 }
		if(isset($_POST['submit'])){
			
			
			$connect = mysqli_connect("localhost","root","","feedback") or die("cannot connect");
			
			$course = $_POST['course'];
			$year = $_POST['year'];
			$batch = $_POST['batch'];
			$dept = $_POST['dept'];
			$sem = $_POST['sem'];
			$sec = $_POST['sec'];
			$elective = $_POST['elec'];
			
			$i=0;
			
			
			$_SESSION['course']=$course;
			$_SESSION['year']=$year ;
			$_SESSION['batch']=$batch; 
			$_SESSION['dept']=$dept; 
			$_SESSION['sem']=$sem ;
			$_SESSION['sec']=$sec; 
			$_SESSION['elective']=$elective;
			$_SESSION['success'] = true;
			$query = mysqli_query($connect," SELECT subject FROM faculty_teach WHERE year=$year AND sec='$sec' AND sem=$sem and dept='$dept' AND batch=$batch AND course='$course' AND (elective=$elective OR elective=0) ") or die("cannot process query");
			if(mysqli_num_rows($query) == 0){?>
				<div class="col-md-8 col-md-offset-4">
						<div class="alert alert-danger">
							<a class="close" data-dismiss="alert" href="#">×</a>
							Subjects are not available for the selected details
						</div></div><?php
			}
			else{
			header("Location:feedbackform.php");
			}
		}
		
				/*if(isset($_POST['dept']) || isset($_POST['batch'])){
	//echo '<script>window.alert("enterd");</script>';
  $connect = mysqli_connect("localhost","root","","feedback") or die("cannot connect");
  $batch = $_POST['batch'];
  $dept = $_POST['dept'];
  $sec = $_POST['sec'];
  $sem = $_POST['sem'];
  $year = $_POST['year'];
 // echo '<script>window.alert("enterd");</script>';
  $output='';
  	  $electivelist = mysqli_query($connect,"SELECT elective FROM faculty_teach WHERE batch = $batch AND dept = '$dept'  AND year=$year AND sem=$sem AND sec='$sec' ") or die(mysqli_error($connect));
 
  $output= '<option value=""> Select Elective</option>';
	  while($row1 = mysqli_fetch_array($electivelist)){
		  $output.= '<option value="'.$row1['elective'].'">'.$row1["elective"].'</option>'; 		  
	  }
	   //echo '<script>window.alert("completed");</script>';
  echo $output;
				}*/
		?>
		</div>
		</div>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
			<script src="jquery.js"></script>
   <script type="text/javascript">
   
 /* $(document).ready(function(){
	$('#batch,#dept,#sec,#year,#sem').on('change',function(){
		var dept = document.getElementById("dept").value;
		var batch = document.getElementById("batch").value;
		var sec = document.getElementById("sec").value;
		var sem = document.getElementById("sem").value;
		var year = document.getElementById("year").value;
		
		if( dept != '' && batch != '' && sec != '' && sem != '' && year != ''){
			
		$.ajax({
			url : "",
			method : "POST",
			data : {dept:dept,batch:batch,year:year,sec:sec,sem:sem},
			dataType : "text",
			success : function(data){
				$("#ele").html(data);
			}
		});
		}		
	});
}); */
</script>
	</body>
</html>