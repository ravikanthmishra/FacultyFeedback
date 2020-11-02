<html>
<head>
  <title>Suggestions Page</title>
      <link rel="stylesheet" href="bootstrap.css">

</head>
<body>
<table>
		  <tr ><td colspan="2"><img src="diet.png" width="100%" height="60%" alt="college header"></td></tr>
		</table>
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Center</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="mainpage.php">Home</a></li>
      <li ><a href="Agrigate_theory.php">Theory Reports</a></li>
      <li ><a href="Agrigate_lab.php">Lab Reports</a></li>
      <li class="active"><a href="suggestions_reports.php">Suggestions Reports</a></li>
	  
    </ul>
  </div>
</nav>

<?php
	session_start();
			$year = $_SESSION['year'];
			$sem = $_SESSION['sem'];
			$batch = $_SESSION['batch'] ;
			$dept = $_SESSION['dept'] ;
			$date = $_SESSION['date'];
			$sec = $_SESSION['sec'];
			$connect = mysqli_connect("localhost","root","","feedback") or die("cannot connect");
			$query = mysqli_query($connect," SELECT suggestions FROM suggestions WHERE year=$year AND sec='$sec' AND sem=$sem and dept='$dept' AND batch=$batch  and date = '$date' ") or die("cannot process query");
			$i=0;
			while($row = mysqli_fetch_array($query)){
				
				$s[$i] = $row['suggestions'];
				$i = $i+1;
			}
			$count = $i;
			?>
			<div class="container">
			<table border="2" align="center" class="table table-bordered table-striped">
                <tr>
                    <td><b>Year-Semester:<?php echo $year.'-'.$sem?></b></td>
                    <td><b>Section:<?php echo $sec ?></b></td>
                    <td><b>Batch:<?php $next_batch=$batch+4; echo $batch.'-'.$next_batch; ?></b> </td>
					<td><b>Depatrment:<?php echo $dept;?></b> </td>
                </tr>
            </table>
			<h2> Suggestions</h2><hr>
			  <table class="table table-striped">
			    <tr>
					<th>S.no</th>
					<th>Suggestions</th>
				</tr>
				<?php
				$i=0;
				 while($i<$count){$a = $i+1;
				 ?>
				 <tr><td><?php echo $a; ?></td><td><?php echo $s[$i] ?></td></tr>
				 <?php
				 $i = $i+1;
				 }
				 ?>
				 </table>
				
				</div>
			
	