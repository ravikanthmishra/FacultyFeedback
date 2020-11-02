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
		<h3><center> Feedback Analysis Report-- Individual Faculty(Lab)</center></h3><br><br>
        </div>    
		<?php
		session_start();
		 $ltot1 = $_SESSION['ltot1'];
			 $ltot2 = $_SESSION['ltot2'];
			  $ltot3 = $_SESSION['ltot3'];
			  $ltot4 = $_SESSION['ltot4'];
			 $ltot5 = $_SESSION['ltot5'];
			$ltot6 = $_SESSION['ltot6'] ;
			 $ltot7 = $_SESSION['ltot7'];
			 $ltot8 = $_SESSION['ltot8'];
			 $ltot9 = $_SESSION['ltot9'];
			 $ltot10 = $_SESSION['ltot10'];
		 $c = $_SESSION['c'] ;
		 $l_faculty = $_SESSION['l_faculty'];
		 $lab = $_SESSION['lab'];
		 $year = $_SESSION['year'];
		 $sem = $_SESSION['sem'];
		 $dept = $_SESSION['dept'];
		 $sec = $_SESSION['sec'];
		
		 
		
			 $i = $_GET['pp'];
		 
			$j=0;
			
				$t1=$ltot1[$i]/$c;
				$t2=$ltot2[$i]/$c;
				$t3=$ltot3[$i]/$c;
				$t4=$ltot4[$i]/$c;
				$t5=$ltot5[$i]/$c;
				$t6=$ltot6[$i]/$c;
				$t7=$ltot7[$i]/$c;
				$t8=$ltot8[$i]/$c;
				$t9=$ltot9[$i]/$c;
				$t10=$ltot10[$i]/$c;
				
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
				
				$lperc = $_SESSION['lperc'];
			
		
		?>
		<div class="container">
<table class="table table-bordered">
				<tr>
				  <td><b>Faculty Name</b> :<?php echo $l_faculty[$i]?></td>
				  <td><b>Dept:</b><?php echo $dept?></td>
				  <td><b>Subject:</b><?php echo $lab[$i]?></td>
				  <td><b>Year:</b><?php echo $year?></td>
				  <td><b>Sem:</b><?php echo $sem?></td>
				  <td><b>Sec:</b><?php echo $sec?></td>
				  
				  
				</tr>
			</table>		
        
        <div>
            <table class="table table-striped">
                        <tr><th class="cs1">S.no</th>   <th class="cs2">Parameters</th> <th class="cs1">Percentage</th></tr>
                        <tr><td class="cs1">1</td>   <td class="cs2">Was the selection of experiment commensurate with the theory</td>   <td class="cs1"><?php echo round($t1,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">2</td>   <td class="cs2">Was the experiment leading towards proper conclusions/interpretations</td>   <td class="cs1"><?php echo round($t2,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">3</td>   <td class="cs2">Whether lab instructor helped you in understanding the experimental observations, Outcome and explaninig the difficulties raised while performing the experiment</td>   <td class="cs1"><?php echo round($t3,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">4</td>   <td class="cs2">Whether the experiments trigger you for any creative idea</td>   <td class="cs1"><?php echo round($t4,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">5</td>   <td class="cs2">Whether experimental set-up was well maintained, fully operational & adequate</td>   <td class="cs1"><?php echo round($t5,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">6</td>   <td class="cs2">Whether precise, updated & self explanatory lab manulas were provided</td>   <td class="cs1"><?php echo round($t6,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">7</td>   <td class="cs2">Whether submission of experimental write-up was routine & repetitive</td>   <td class="cs1"><?php echo round($t7,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">8</td>   <td class="cs2">Whether lab instructor does assesssment of experiment regularly and gives feedback</td>   <td class="cs1"><?php echo round($t8,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">9</td>   <td class="cs2">Whether the entire lab session was useful in clarifying you knowledge of the theory</td>   <td class="cs1"><?php echo round($t9,2).'%'; ?></td></tr>        
                        <tr><td class="cs1">10</td>   <td class="cs2">Whether you are confident with the use of the concepts, instruments and their</td>   <td class="cs1"><?php echo round($t10,2).'%'; ?></td></tr>        
						 <tr><td class="cs1"></td>   <td class="cs2" style="float:right">Total Percentage :</td>   <td class="cs1"><?php echo round($lperc[$i],2).'%'; ?></td></tr> 
            </table>
        </div>
		</div>
</body>
</html>
