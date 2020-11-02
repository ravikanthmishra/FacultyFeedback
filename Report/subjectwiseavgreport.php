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
		
			
			
			
		
			  
		    $connect = mysqli_connect("localhost","root","","feedback");
			$sql1="SELECT DISTINCT(date) FROM `feedbackreport_theory` where batch=$batch and year=$year and sem=$sem and dept='$dept' and sec='$sec'";
			echo $sql1;
			$i=0;
			$datequery = mysqli_query($connect,$sql1) or die(mysqli_error($connect));
			if(mysqli_num_rows($datequery) ==2){
				while($row1 = mysqli_fetch_array($datequery)){
							$date[$i]=$row1['date'];
							$i=$i+1;
						}
			}	
			
			echo $date[0].'.<br>.';
			echo $date[1].'.<br>.';
			
			
			$query = mysqli_query($connect," SELECT name,subject FROM faculty_teach WHERE year=$year AND sec='$sec' AND sem=$sem and dept='$dept' AND batch=$batch ") or die("cannot process query");
			$i=0;
			while($row = mysqli_fetch_array($query)){
				
				$faculty[$i] = $row['name'];
				$sub[$i] = $row['subject'];
				$i = $i+1;
			}
			$count = $i;
			$_SESSION['count'] = $count;
			$_SESSION['sub']=$sub;
			$_SESSION['faculty']=$faculty;
			$i=0;
			
				
					
				
			
			while($i<$count){
			$query = mysqli_query($connect," SELECT name,sub,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10 FROM feedbackreport_theory WHERE year=$year AND sec='$sec' AND sem=$sem and dept='$dept' AND batch=$batch and sub='$sub[$i]' and date = '$date' AND elective=$elective ") or die("cannot process query");
			$j=0;
			while($row = mysqli_fetch_array($query)){
				
				$faculty1[$i] =  $row['name'];
				$subject[$i] = $row['sub'];
				$q1[$i][$j]  = (int)$row['q1'];
				//echo $q1[$i][$j].'   ';
				$q2[$i][$j]  = $row['q2'];
				//echo $q2[$i][$j].'   ';
				$q3[$i][$j]  = $row['q3'] ;
				//echo $q3[$i][$j].'   ';
				$q4[$i][$j]  = $row['q4'];
				//echo $q4[$i][$j].'   ';
				$q5[$i][$j]  = $row['q5'];
				//echo $q5[$i][$j].'   ';
				$q6[$i][$j]  = $row['q6'];
				//echo $q6[$i][$j].'   ';
				$q7[$i][$j]  = $row['q7'];
				//echo $q7[$i][$j].'   ';
				$q8[$i][$j]  = $row['q8'];
				//echo $q8[$i][$j].'   ';
				$q9[$i][$j]  = $row['q9'];
				//echo $q9[$i][$j].'   ';
				$q10[$i][$j]  = $row['q10'];
				//echo $q10[$i][$j].'<br>   ';
				$j = $j+1;
				
				
			}
			$i=$i+1;	
		}
		$i=0;
					
		$c1=$j;
		$i=0;
		$q1=$q1;	
		while($i<$count){
			$j=0;
			while($j<$c1){
			if($j==0 ){
				$tot1[$i] = (int)$q1[$i][$j];
				$tot2[$i] = (int)$q2[$i][$j];
				$tot3[$i] = $q3[$i][$j];
				$tot4[$i] = $q4[$i][$j];
				$tot5[$i] = $q5[$i][$j];
				$tot6[$i] = $q6[$i][$j];
				$tot7[$i] = $q7[$i][$j];
				$tot8[$i] = $q8[$i][$j];
				$tot9[$i] = $q9[$i][$j];
				$tot10[$i] = $q10[$i][$j];
				$j=$j+1;
			}
				
				else{
	 			$tot1[$i] = (int)$q1[$i][$j]+(int)$tot1[$i];
				$tot2[$i] = (int)$q2[$i][$j]+(int)$tot2[$i];
				$tot3[$i] = (int)$q3[$i][$j]+(int)$tot3[$i];
				$tot4[$i] = (int)$q4[$i][$j]+(int)$tot4[$i];
				$tot5[$i] = (int)$q5[$i][$j]+(int)$tot5[$i];
				$tot6[$i] = (int)$q6[$i][$j]+(int)$tot6[$i];
				$tot7[$i] = (int)$q7[$i][$j]+(int)$tot7[$i];
				$tot8[$i] = (int)$q8[$i][$j]+(int)$tot8[$i];
				$tot9[$i] = (int)$q9[$i][$j]+(int)$tot9[$i];
				$tot10[$i] = (int)$q10[$i][$j]+(int)$tot10[$i];
				$j=$j+1;
				}
			}
			$avg[$i]=($tot1[$i]+$tot2[$i]+$tot3[$i]+$tot4[$i]+$tot5[$i]+$tot6[$i]+$tot7[$i]+$tot8[$i]+$tot9[$i]+$tot10[$i])/($c1*10);
			$total[$i]=((int)$tot1[$i]+(int)$tot2[$i]+(int)$tot3[$i]+(int)$tot4[$i]+(int)$tot5[$i]+(int)$tot6[$i]+(int)$tot7[$i]+(int)$tot8[$i]+(int)$tot9[$i]+(int)$tot10[$i]);
			$perc[$i] = $total[$i]/($c1*50);
			$perc[$i]=$perc[$i]*100;
			$i=$i+1;
		}
		$sql10="SELECT DISTINCT(strength) FROM feedbackreport_theory WHERE year=$year AND sec='$sec' AND sem=$sem and dept='$dept' AND batch=$batch AND elective=$elective";
		
		$strengthquery = mysqli_query($connect,$sql10) or die("cannot process query");
		$row = mysqli_fetch_array($strengthquery);
		$strength = $row['strength'];
				$numrows = mysqli_num_rows($query);
		
			$_SESSION['tot1'] = $tot1;
			$_SESSION['avg'] = $avg;
			$_SESSION['tot2'] = $tot2;
			$_SESSION['tot3'] = $tot3;
			$_SESSION['tot4'] = $tot4;
			$_SESSION['tot5'] = $tot5;
			$_SESSION['tot6'] = $tot6;
			$_SESSION['tot7'] = $tot7;
			$_SESSION['tot8'] = $tot8;
			$_SESSION['tot9'] = $tot9;
			$_SESSION['tot10'] = $tot10;
			$_SESSION['c1'] = $c1;
			$_SESSION['perc'] = $perc;
			$_SESSION['strength'] = $strength;
			//echo "strength1=".$strength;
			$_SESSION['numrows'] = $numrows;
                ?>
			
			

            <div class="container">
			<table class="table table-bordered">
				<tr>
				  
				  <td>Dept:<b><?php echo $dept?></b></td>
				  <td>Year:<b><?php echo $year?></b></td>
				  <td>Sem:<b><?php echo $sem?></b></td>
				  <td>Sec:<b><?php echo $sec?></b></td>
				  
				  
				</tr>
			</table>	
			
				
                <table class="table table-striped">
                        <tr><th><center>S.No</center></th><th><center>Subject</center></th><th><center>Faculty Name</center></th> <th><center>Aggregates</center></th><th><center>Percentage</center></th></tr>
						<?php $i=0;
						while($i<$count){ ?>
							
                        <tr align='center'> <?php  $a=$i+1;?><td><?php echo $a; ?></td><td><?php echo $sub[$i]; ?></td><td><?php echo $faculty1[$i]; ?></td><td><?php echo round($avg[$i],2); ?>/5</td><td><?php echo round($perc[$i],2)?>% </td><td><a id="pp" class="btn btn-success" target="_blank" href=" parameters_theory.php?pp=<?php echo $i; ?> " >View Details</a></td></tr>
							<?php 
							$i=$i+1;
							} ?>
                        
                </table>
				<a href="print_theory.php" target="_blank" class="btn btn-link">PRINT</a>
				<table class="table table-striped">
				  <tr><td><b> Total No of Students</b></td><td><?php echo $strength; ?></td><td><b>No of Students Participated</b></td><td><?php echo $numrows; ?></td><td><b>Percentage of Participation</b></td><td><?php $pperc = (mysqli_num_rows($query)/$strength) * 100; echo round($pperc,2).'%' ; ?></td></tr>
				  </table>
				
				</div>
			</body>
			</html>
	