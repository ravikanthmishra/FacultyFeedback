<!DOCTYPE.html>
<html>
    <head>
        <title>agrigation</title>
        <style>
                tr,th,td{border:1px solid black;border-collapse:collapse;height:50px;width:600px;border-width:3px;}
                table{margin-left:425px;margin-top:70px;border:1px solid black;border-collapse:collapse;height:50px;width:600px;border-width:3px;}
        </style>
    </head>
    <body style="background-color:rgb(245,245,245);">
            <div>
                <h1 style="margin-left:380px;margin-top:59px">Dhanekula Institute Of Engineering And Technology</h1>    
            </div>

            <div>
			<?php
			session_start();
			$course = $_POST['course'];
			$year = $_POST['year'];
			$batch = $_POST['batch'];
			$dept = $_POST['dept'];
			$sem = $_POST['sem'];
			$sec = $_POST['sec'];
			$i=0;

			
			
			$connect = mysqli_connect("localhost","root","","feedback") or die("cannot connect");
			$query = mysqli_query($connect," SELECT name,subject FROM faculty_teach WHERE year=$year AND sec='$sec' AND sem=$sem and dept='$dept' AND batch=$batch AND course='$course' ") or die("cannot process query");
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
			$query = mysqli_query($connect," SELECT name,sub,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10 FROM feedbackreport_theory WHERE year=$year AND sec='$sec' AND sem=$sem and dept='$dept' AND batch=$batch AND course='$course' and sub='$sub[$i]' ") or die("cannot process query");
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
			
                ?>
				
                <table>
                        <tr><th>S.No</th><th>Subject</th><th>Faculty Name</th> <th>Aggregates</th><th>Percentage</th></tr>
						<?php $i=0;
						while($i<$count){ ?>
							
                        <tr align='center'> <?php  $a=$i+1; echo '<td>'.$a.'</td>'.'<td>'.$sub[$i].'</td>'.'<td>'.$faculty1[$i].'</td>'.'<td>'.$avg[$i].'/5</td><td>'.$perc[$i].'/100% </td></tr>';
							$i=$i+1;} ?>
                        
                </table>
    </body>
</html>