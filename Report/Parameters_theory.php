<!DOCTYPE.html>
<html>
<head>
    <title>
            Parameters
    </title>
   <link rel="stylesheet" href="bootstrap.css">
</head> 

<body style="background-image:url(/home/changemaker/Desktop/dhan.jpg);background-repeat:no-repeat;background-position:center;background-attachment:fixed">  <div>
        <table>
		  <tr ><td colspan="2"><img src="diet.png" width="100%" height="60%" alt="college header"></td></tr>
		</table>
		<h3><center> Feedback Analysis Report-- Individual Faculty(Theory)</center></h3><br><br>
        </div>    
		<?php
		session_start();
		 $tot1 = $_SESSION['tot1'];
			 $tot2 = $_SESSION['tot2'];
			  $tot3 = $_SESSION['tot3'];
			  $tot4 = $_SESSION['tot4'];
			 $tot5 = $_SESSION['tot5'];
			$tot6 = $_SESSION['tot6'] ;
			 $tot7 = $_SESSION['tot7'];
			 $tot8 = $_SESSION['tot8'];
			 $tot9 = $_SESSION['tot9'];
			 $tot10 = $_SESSION['tot10'];
		 $c1 = $_SESSION['c1'] ;
		 $faculty = $_SESSION['faculty'];
		 $sub = $_SESSION['sub'];
		 $year = $_SESSION['year'];
		 $sem = $_SESSION['sem'];
		 $dept = $_SESSION['dept'];
		 $sec = $_SESSION['sec'];
		 $perc = $_SESSION['perc'];
		
		 
		
			 $i = $_GET['pp'];
		 
			$j=0;
			
				$t1=$tot1[$i]/$c1;
				$t2=$tot2[$i]/$c1;
				$t3=$tot3[$i]/$c1;
				$t4=$tot4[$i]/$c1;
				$t5=$tot5[$i]/$c1;
				$t6=$tot6[$i]/$c1;
				$t7=$tot7[$i]/$c1;
				$t8=$tot8[$i]/$c1;
				$t9=$tot9[$i]/$c1;
				$t10=$tot10[$i]/$c1;
				
				$t1 = ($t1/5)*100;
				$t2 = ($t2/5)*100;
				$t3 = ($t3/5)*100;
				$t4 = ($t4/5)*100;
				$t5 = ($t5/5)*100;
				$t6 = ($t6/5)*100;
				$t7 = ($t7/5)*100;
				$t8 = ($t8/5)*100;
				$t9 = ($t9/5)*100;
				$t10 = ($t10/5)*100;
				
				
				
				
				
			
		
		?>
		<div class="container">
		<table class="table table-bordered">
				<tr>
				  <td><b>Faculty Name</b> :<?php echo $faculty[$i]?></td>
				  <td><b>Dept:</b><?php echo $dept?></td>
				  <td><b>Subject:</b><?php echo $sub[$i]?></td>
				  <td><b>Year:</b><?php echo $year?></td>
				  <td><b>Sem:</b><?php echo $sem?></td>
				  <td><b>Sec:</b><?php echo $sec?></td>
				
				  
				</tr>
			</table>		
        
        <div>
            <table class="table table-striped">
                        <tr><th class="cs1">S.no</th>   <th class="cs2">Parameters</th> <th class="cs1">Score</th></tr>
                        <tr><td class="cs1">1</td>   <td class="cs2">Lectures were well prepared & Organized?</td>   <td class="cs1"><?php echo round($t1,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">2</td>   <td class="cs2">Blakboard writing/visual aids are clear & organized?</td>   <td class="cs1"><?php echo round($t2,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">3</td>   <td class="cs2">Lectures deleivered with emphasis on fundamental concepts, examples?</td>   <td class="cs1"><?php echo round($t3,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">4</td>   <td class="cs2">Teachers engages classes regularly & maintains discipline?</td>   <td class="cs1"><?php echo round($t4,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">5</td>   <td class="cs2">Difficult topics were taught with adequate attention & ease?</td>   <td class="cs1"><?php echo round($t5,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">6</td>   <td class="cs2">Faculty able to deliver lectures with good communication skills?</td>   <td class="cs1"><?php echo round($t6,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">7</td>   <td class="cs2">Students are encouraged to ask questions, to make lectures interactive & lively?</td>   <td class="cs1"><?php echo round($t7,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">8</td>   <td class="cs2">Teacher is effective in preparing students for exams?</td>   <td class="cs1"><?php echo round($t8,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">9</td>   <td class="cs2">Evaluation is fair and impartial & helping you to improve?</td>   <td class="cs1"><?php echo round($t9,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">10</td>   <td class="cs2">Faculty is accessible to students for guidance & solving queries?</td>   <td class="cs1"><?php echo round($t10,2).'%'; ?></td></tr>        
						 <tr><td class="cs1"></td>   <td class="cs2" style="float:right">  Total Percentage :</td>  <td class="cs1"><?php echo round($perc[$i],2).'%'; ?></td></tr>
            </table>
        </div>
		</div>
</body>
</html>
