<?php
		session_start();
		$connect = mysqli_connect("localhost","root","","feedback") or die("cannot connect");
		
	
		if(isset($_POST['theory_submit'])){
		$year = $_SESSION['year'];
		$sem = $_SESSION['sem'];
		$sub = $_SESSION['sub'];
		$course = $_SESSION['course'];
		$dept = $_SESSION['dept'];
		$sec = $_SESSION['sec'];
		$batch = $_SESSION['batch'];
		$faculty = $_SESSION['faculty'];
		$elective = $_SESSION['elective'];
		$_SESSION['theory'] = true;
		
		$strengthquery = mysqli_query($connect,"SELECT DISTINCT(strength) FROM students_count WHERE department='$dept' AND batch=$batch and year=$year and sem=$sem AND sec='$sec' AND elective=$elective") or die("cannot process query");
		while($row = mysqli_fetch_array($strengthquery)){
			$strength = $row['strength'];
		}
				$i = 0;
				$j = 0;
				 while($i<$_SESSION['count']){
					 $x = (string)$i;
					 while($j<10){
						 $y = (string)$j;
						 $m = $y.$x;
						 $q[$j] = $_POST[$m];
						 $j = $j+1;
					}
					$j = 0;
					$insertquery = mysqli_query($connect,"INSERT INTO feedbackreport_theory VALUES('$sub[$i]', '$faculty[$i]','$course','$dept',$batch,$year,$sem,'$sec',$q[0],$q[1],$q[2],$q[3],$q[4],$q[5],$q[6],$q[7],$q[8],$q[9],CURDATE(),$strength,$elective)") or mysqli_error($connect);
				   $i = $i+1;
				 }
				/* if($year == 4 && $sem ==2){
					 header("Location:suggestions.php");
				 }else{*/
				header("Location:feedbackform_lab.php"); 
				 }
			
		
		if(isset($_POST['lab_submit'])){
				$lab = $_SESSION['lab'];
				$l_faculty = $_SESSION['l_faculty'];
				$year = $_SESSION['year'];
				$sem = $_SESSION['sem'];
				$course = $_SESSION['course'];
				$dept = $_SESSION['dept'];
				$sec = $_SESSION['sec'];
				$batch = $_SESSION['batch'];
				$elective = $_SESSION['elective'];
				$_SESSION['lab1'] = true;
				$i = 0;
				$j = 0;
				$strengthquery = mysqli_query($connect,"SELECT DISTINCT(strength) FROM students_count WHERE department='$dept' AND batch=$batch AND sec='$sec' AND elective=$elective ") or die("cannot process query");
		while($row = mysqli_fetch_array($strengthquery)){
			$strength = $row['strength'];
		}
		
				 while($i<$_SESSION['lcount']){
					 $x = (string)$i;
					 while($j<10){
						 $y = (string)$j;
						 $m = $y.$x;
						 $q[$j] = $_POST[$m];
						 $j = $j+1;
					}
					$j = 0;
					$insertquery = mysqli_query($connect,"INSERT INTO feedbackreport_lab VALUES('$lab[$i]', '$l_faculty[$i]','$course','$dept',$batch,$year,$sem,'$sec',$q[0],$q[1],$q[2],$q[3],$q[4],$q[5],$q[6],$q[7],$q[8],$q[9],CURDATE(),$strength,$elective)") or mysqli_error($connect);
				   $i = $i+1;
				 }
				 header("Location:suggestions.php"); 
		}
		
		if(isset($_POST['suggestions'])){
			$_SESSION['suggestions'] = true;
			$course = $_SESSION['course'];
			$year = $_SESSION['year'];
			$batch = $_SESSION['batch'];
			$dept = $_SESSION['dept'];
			$sem = $_SESSION['sem'];
			$sec = $_SESSION['sec'];
			
			
			$i = 0;
			while($i<5){
				$s = (string)$_POST[(string)$i];
				if($s != ''){
				$sugquery = mysqli_query($connect, "INSERT INTO suggestions VALUES($year,$sem,$batch,'$course','$dept','$sec','$s',CURDATE()) ") or mysqli_error($connect);
				}
				$s=(string)null;
				$i = $i+1;
				
			}
			 header("Location:success.php"); 
		}
		if(isset($_POST['more_suggestions'])){
			$course = $_SESSION['course'];
			$year = $_SESSION['year'];
			$batch = $_SESSION['batch'];
			$dept = $_SESSION['dept'];
			$sem = $_SESSION['sem'];
			$sec = $_SESSION['sec'];
			$mid = $_SESSION['mid'];
			
			$i = 0;
			while($i<5){
				$s = (string)$_POST[(string)$i];
				if($s != ''){
				$sugquery = mysqli_query($connect, "INSERT INTO suggestions VALUES($year,$sem,$batch,'$course','$dept','$sec','$s',CURDATE()) ") or mysqli_error($connect);
				}
				$s=(string)null;
				$i = $i+1;
				
			}
			header("Location:suggestions.php"); 
		}
		
		?>