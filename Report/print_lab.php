<!DOCTYPE.html>
<html>
    <head>
        <title>agrigation</title>
        <link rel="stylesheet" href="bootstrap.css">
		<style>
		  
		
		</style>
    </head>
    <body onload="window.print()">
            <table>
		  <tr ><td colspan="2"><img src="diet.png" width="100%" height="60%" alt="college header"></td></tr>
		</table>

            <div>
			<?php
			session_start();
			
			
			$year = $_SESSION['year'];
			$batch = $_SESSION['batch'];
			$dept = $_SESSION['dept'];
			$sem = $_SESSION['sem'];
			$sec = $_SESSION['sec'];
			$strength = $_SESSION['strength'];
			$elective = $_SESSION['elective'];		
			
			$connect = mysqli_connect("localhost","root","","feedback") or die("cannot connect");
			$query = mysqli_query($connect," SELECT name,lab FROM faculty_lab WHERE year=$year AND sec='$sec' AND sem=$sem and dept='$dept' AND batch=$batch AND (elective=$elective OR elective=0) ") or die("cannot process query");
			$i=0;
			while($row = mysqli_fetch_array($query)){
				
				$l_faculty[$i] = $row['name'];
				$lab[$i] = $row['lab'];
				$i = $i+1;
			}
			$count = $i;
			$lperc1 = $_SESSION['lperc'];
			$avg1 = $_SESSION['lavg'] ;
			$_SESSION['count'] = $count;
			$_SESSION['lab']=$lab;
			$_SESSION['l_faculty']=$l_faculty;
			$i=0;
					
			while($i<$count){
			$query = mysqli_query($connect," SELECT name,lab,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10 FROM feedbackreport_lab WHERE year=$year AND sec='$sec' AND sem=$sem and dept='$dept' AND batch=$batch and lab='$lab[$i]' AND elective=$elective ") or die("cannot process query");
			$j=0;
			while($row = mysqli_fetch_array($query)){
				
				$faculty1[$i] =  $row['name'];
				$lab[$i] = $row['lab'];
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
					
		$c=$j;
		$i=0;
		$q1=$q1;	
		while($i<$count){
			$j=0;
			while($j<$c){
			if($j==0 ){
				$ltot1[$i] = (int)$q1[$i][$j];
				$ltot2[$i] = (int)$q2[$i][$j];
				$ltot3[$i] = $q3[$i][$j];
				$ltot4[$i] = $q4[$i][$j];
				$ltot5[$i] = $q5[$i][$j];
				$ltot6[$i] = $q6[$i][$j];
				$ltot7[$i] = $q7[$i][$j];
				$ltot8[$i] = $q8[$i][$j];
				$ltot9[$i] = $q9[$i][$j];
				$ltot10[$i] = $q10[$i][$j];
				$j=$j+1;
			}
				
				else{
	 			$ltot1[$i] = (int)$q1[$i][$j]+(int)$ltot1[$i];
				$ltot2[$i] = (int)$q2[$i][$j]+(int)$ltot2[$i];
				$ltot3[$i] = (int)$q3[$i][$j]+(int)$ltot3[$i];
				$ltot4[$i] = (int)$q4[$i][$j]+(int)$ltot4[$i];
				$ltot5[$i] = (int)$q5[$i][$j]+(int)$ltot5[$i];
				$ltot6[$i] = (int)$q6[$i][$j]+(int)$ltot6[$i];
				$ltot7[$i] = (int)$q7[$i][$j]+(int)$ltot7[$i];
				$ltot8[$i] = (int)$q8[$i][$j]+(int)$ltot8[$i];
				$ltot9[$i] = (int)$q9[$i][$j]+(int)$ltot9[$i];
				$ltot10[$i] = (int)$q10[$i][$j]+(int)$ltot10[$i];
				$j=$j+1;
				}
			}
			$avg[$i]=($ltot1[$i]+$ltot2[$i]+$ltot3[$i]+$ltot4[$i]+$ltot5[$i]+$ltot6[$i]+$ltot7[$i]+$ltot8[$i]+$ltot9[$i]+$ltot10[$i])/($c*10);
			$total[$i]=((int)$ltot1[$i]+(int)$ltot2[$i]+(int)$ltot3[$i]+(int)$ltot4[$i]+(int)$ltot5[$i]+(int)$ltot6[$i]+(int)$ltot7[$i]+(int)$ltot8[$i]+(int)$ltot9[$i]+(int)$ltot10[$i]);
			$perc[$i] = $total[$i]/($c*50);
			$lperc[$i]=$perc[$i]*100;
			$i=$i+1;
		}
		 
			
			$lnumrows = $_SESSION['lnumrows'];
			$lstrength = $_SESSION['lstrength'];
			
                ?>
				<div class="container">
				<table class="table table-bordered">
				<tr>
				 
				  <td><b>Dept:</b><?php echo $dept?></td>
				  
				  <td><b>Year:</b><?php echo $year?></td>
				  <td><b>Sem:</b><?php echo $sem?></td>
				  <td><b>Sec:</b><?php echo $sec?></td>
				 
				  
				</tr>
			</table>	
                <table class="table table-striped">
                        <tr><th><center>S.No</center></th><th><center>Subject</center></th><th><center>Faculty Name</center></th> <th><center>Aggregates</center></th><th><center>Percentage</center></th></tr>
						<?php $i=0;
						while($i<$count){ ?>
							
                        <tr align='center'> <?php  $a=$i+1;?><td><?php echo $a; ?></td><td><?php echo $lab[$i]; ?></td><td><?php echo $l_faculty[$i]; ?></td><td><?php echo round($avg1[$i],2); ?>/5</td><td><?php echo round($lperc1[$i],2); ?>% </td></tr>
							<?php 
							$i=$i+1;
							} ?>
                        
                </table>
				<table class="table table-striped">
				  <tr><td><b> Total No of Students</b></td><td><?php echo $lstrength; ?></td><td><b>No of Students Participated</b></td><td><?php echo $lnumrows; ?></td><td><b>Percentage of Participation</b></td><td><?php $pperc = round(($lnumrows/$lstrength) * 100,2); echo round($pperc,2).'%' ; ?></td></tr>
				  </table>
				
				</div>
				
				<center><textarea name="" rows="5" cols="150" placeholder="" style="border: 1px solid black"></textarea></center>
				<br><br><br><br><br><br><br>
				<table  style="border:0px;width:100%;">
					<tr>
					  <td> <center>Signature of Head of the Department</center></td><td style="margin-right:130px;float:right"> Signature of Principal</td>
					</tr>
				</table>

				
				
				</body>
				</html>
    </body>
</html>