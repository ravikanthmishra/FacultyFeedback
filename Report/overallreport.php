<?php
	session_start();
	$faculty = $_SESSION['faculty'];
	$batch = $_SESSION['batch'];
	$year = $_SESSION['year'];
	$count = $_SESSION['count'];
	$sem = $_SESSION['sem'];
	$sec = $_SESSION['sec'];
	$sub = $_SESSION['sub'];
	$perc = $_SESSION['perc'];
	$dept = $_SESSION['dept'];
	$lcount = $_SESSION['lcount'];
	$lab = $_SESSION['lab'];
	$lfaculty = $_SESSION['l_faculty'];
	$lperc = $_SESSION['lperc'];
	$date = $_SESSION['date'];
	//print $faculty[0].''.$batch.''.$year.''.$sem.''.$dept.''.$sec.''.$sub[0].''.$perc[0].''.$lcount.''.$lab[0].''.$lfaculty[0].''.$lperc[0].''.$date;
  $connect = mysqli_connect("localhost","root","","feedback") or die("cannot connect");
  $i=0;
  while($i<$count){
	  $sql = "INSERT INTO overallreport VALUES('$faculty[$i]',$batch,'$dept',$year,$sem,'$sec','$sub[$i]',$perc[$i],'$date' )";
	  //echo $sql;
	  $query = mysqli_query($connect,$sql) or mysqli_error($connect);
	  $i = $i+1;
  }
  $i=0;
  while($i<$lcount){
	  $query1 = mysqli_query($connect,"INSERT INTO overallreport_lab VALUES('$lfaculty[$i]',$batch,'$dept',$year,$sem,'$sec','$lab[$i]',$lperc[$i],'$date')") or mysqli_error($connect);
	  $i = $i+1;
  }
  
  header("Location:agrigate_lab.php");

?>