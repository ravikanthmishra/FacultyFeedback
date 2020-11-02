<html>
  <head>
    <title> ::Feedback System::</title>
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
	<?php
	ob_start();
	  session_start();
	?>
<h1 align="center" >Dhanekula Student Feedback System</h1><br><br>
		<div class="container">
		<div class="col-sm-7">
		 <img src="1.jpg" alt="feedback img" style="width:100%;height:90%;margin-top:-60px;"></div>

		
		<div class="col-sm-3">
		 </div>
		 <div class="col-sm-5 ">
		<form action="" method="POST" autocomplete="off">
		<table border="0" align="center"  cellpadding="6" class="table">
			<tr><td align="center">Course</td>
				<td align="center">:</td>
				<td><input type="text" class="form-control" name='course' value="btech" readonly required></tr>
			<tr><td class = "tdq" align="center">Batch</td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='batch' id="batch" required>
						  <option value="">Select</option>
						  <option value="2015">2015</option>
						  <option value="2016">2016</option>
						  <option value="2017">2017</option>
						  <option value="2018">2018</option>
						 
					</select></td></tr>
					
			<tr><td class = "tdq" align="center">Branch</td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='dept' id="dept" required>
						<option value="">Select</option>
						  <option value="CE">CE</option>
						  <option value="EEE">EEE</option>
						  <option value="ME">ME</option>						  
						  <option value="ECE">ECE</option>
						  <option value="CSE">CSE</option>
					</select></td></tr>
					
			<tr><td class = "tdq" align="center">Year</td>
				<td  class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='year' id="year" required>
						<option value="">Select</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
					</select></td></tr>
			<tr><td class = "tdq" align="center">Semester</td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='sem' id="sem" required>
						<option value="">Select</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
					</select></td></tr>	
					<tr><td class = "tdq" align="center">Section</td>
				<td class = "tdq" align="center">:</td>
				<td class = "tdq"><select class="form-control" name='sec' id="sec" required>
						  <option value="">Select</option>
						  <option value="A">A</option>
						  <option value="B">B</option>
					</select></td></tr>
					
			<tr><td class = "tdq" align="center">Elective</td>
				<td class = "tdq" align="center">:</td>
				<td class = ""><select name="elec" id="elec" class="form-control" required >
					</select>
				</td></tr>	
			<tr><td class = "tdq" align="center">Passcode</td>
				<td class = "tdq" align="center">:</td>
				<td class = ""><input type="text" name="pass" id="pass" class="form-control" required >
				</td></tr>
							
			<tr><td colspan="3" align="center"><input type="submit" class="btn btn-success" value="submit" name="submit"/></td></tr>
		</table>
		</form>
		</div>
		</div>
		
		<?php
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
			$pass = $_POST['pass'];
			
			$i=0;
			
			
			$_SESSION['course']=$course;
			$_SESSION['year']=$year ;
			$_SESSION['batch']=$batch; 
			$_SESSION['dept']=$dept; 
			$_SESSION['sem']=$sem ;
			$_SESSION['sec']=$sec; 
			$_SESSION['elective']=$elective;
			
			$q11=" SELECT subject FROM faculty_teach WHERE year=$year AND sec='$sec' AND sem=$sem and dept='$dept' AND batch=$batch AND course='$course' AND elective=$elective";
			$query = mysqli_query($connect,$q11) or die("cannot process query");
			$passquery = mysqli_query($connect,"SELECT passcode FROM passcode") or die("wrong passcode");
			$passn = mysqli_num_rows($passquery);
			$realpass = mysqli_fetch_array($passquery);
			if($pass == $realpass[0]){
			if(mysqli_num_rows($query) == 0){?>
				<div class="col-md-8 col-md-offset-4">
						<div class="alert alert-danger">
							<a class="close" data-dismiss="alert" href="#">×</a>
							Subjects are not available for the selected details
						</div></div><?php
			}
			else{
				$_SESSION['success'] = true;
			header("Location:feedbackform.php");
			}
		}
		else{
			?>
				<div class="col-md-8 col-md-offset-4">
						<div class="alert alert-danger">
							<a class="close" data-dismiss="alert" href="#">×</a>
							The Entered Passcode is Wrong
						</div></div><?php
		}
		}
			
			


if(isset($_POST['dept']) && isset($_POST['batch'])){
	//echo '<script>window.alert("enterd");</script>';
  $connect = mysqli_connect("localhost","root","","feedback") or die("cannot connect");;
  $batch = $_POST['batch'];
  $dept = $_POST['dept'];
  $sec = $_POST['sec'];
  $sem = $_POST['sem'];
  $year = $_POST['year'];
  //echo '<script>window.alert('.$dept.');</script>';
  $output1='';
  	  $datelist = mysqli_query($connect,"SELECT DISTINCT(elective) FROM faculty_teach WHERE batch = $batch AND dept = '$dept'  AND year=$year AND sem=$sem AND sec='$sec' ORDER BY elective ASC") or die(mysqli_error($connect));
		$n=mysqli_num_rows($datelist);
  $output1 = '<option value=""> Select Elective</option>';
	  while($row = mysqli_fetch_array($datelist)){
		  $r= (int)$row['elective'];
		  if($n>1 && $r==0){
				continue;
		  }
		  $output1.= '<option value="'.$row['elective'].'">'.$row["elective"].'</option>'; 
		  
	  }
  echo $output1;
}
		?>
		<script src="jquery.js"></script>
   <script type="text/javascript">
   
  $(document).ready(function(){
	$('#batch,#dept,#sec,#year,#sem').on('change',function(){
		var dept = document.getElementById("dept").value;
		var batch = document.getElementById("batch").value;
		var sec = document.getElementById("sec").value;
		var sem = document.getElementById("sem").value;
		var year = document.getElementById("year").value;
		
		if( dept != '' && batch != '' && sec != '' && sem != '' && year != '' ){
			
		$.ajax({
			url : "",
			method : "POST",
			data : {dept:dept,batch:batch,year:year,sec:sec,sem:sem},
			dataType : "text",
			success : function(data){
				$("#elec").html(data);
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