<!DOCTYPE html>

<html>
    <head>
        <title>:: Dhanekula Feedback System ::</title>
		<link rel="stylesheet" href="bootstrap.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
	
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
    <body bgcolor="#ffffff" onload="preventBack();">
	
	  <?php
			session_start();
			if(isset($_SESSION['theory']) && (!isset($_SESSION['lab1']))){
		 header("Location:feedbackform_lab.php");
	 }
	 if(isset($_SESSION['theory']) && (!isset($_SESSION['suggestions']))){
		 header("Location:suggestions.php");
	 }
	 else if(isset($_SESSION['theory'])){
		 header("Location:success.php");
	 }
			$course = $_SESSION['course'];
			$year = $_SESSION['year'];
			$batch = $_SESSION['batch'];
			$dept = $_SESSION['dept'];
			$sem = $_SESSION['sem'];
			$sec = $_SESSION['sec'];
			$elective = $_SESSION['elective'];
			
			
			
			
			$connect = mysqli_connect("localhost","root","","feedback") or die("cannot connect");
			
			$query = mysqli_query($connect," SELECT name,subject FROM faculty_teach WHERE year=$year AND sec='$sec' AND sem=$sem and dept='$dept' AND batch=$batch AND course='$course' AND (elective=$elective OR elective=0)") or die("cannot process query");
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
	
			$i = 0;
			
	  ?>
		<table>
		  <tr ><td colspan="2"><img src="diet.png" width="100%" height="60%" alt="college header"></td></tr>
		</table>
		<div class="container">
        <h3 align="center" > <u> DHANEKULA FEEDBACK SYSTEM </u> </h3><?php 
		if($dept == 'cse'){
        echo '<h4 align="center">DEPARTMENT OF COMPUTER SCIENCE & ENGINEERING</h4> ' ;
		}
		else if($dept == 'ce'){
				        echo '<h4 align="center">DEPARTMENT OF CIVIL ENGINEERING</h4> ' ;
		}
		else if($dept =='me'){
			        echo '<h4 align="center">DEPARTMENT OF MECHANICAL ENGINEERING</h4> ' ;
		}
		else if ($dept == 'ece'){
			        echo '<h4 align="center">DEPARTMENT OF ELECTRONICS COMMUNICATION AND ENGINEERING</h4> ' ;
		}
		else if($dept == 'eee'){
				        echo '<h4 align="center">DEPARTMENT OF ELECTRICAL AND ELECTRONICS ENGINEERING</h4> ' ;
		} ?>
        <form action="process.php" method="POST">
            <table border="2" align="center" style="border-collapse:collapse;">
                <tr>
                    <td>Year-Semester:<?php echo $year.'-'.$sem?></td>
                    <td>Section:<?php echo $sec ?></td>
                    
                    <td>Batch:<?php $next_batch=$batch+4; echo $batch.'-'.$next_batch; ?> </td>
                </tr>
            </table>
            <br>
            <table border="2" align="center" class="table table-bordered" width=50%>
                <tr>
                    <td>Excellent</td>
                    <td>Very Good</td>
                    <td>Good</td>
                    <td>Satisfactory</td>
                    <td>Poor</td>
                </tr>
		<tr>
                    <td>5</td>
                    <td>4</td>
                    <td>3</td>
                    <td>2</td>
                    <td>1</td>
                </tr>
            </table>
            <h4 align="center"><b>student feedack on Theory Courses </b></h4>
            <table border="2" align="center" class="table table-bordered table-striped">
				<tr>
                    <td colspan="2"><b>Name of the Subject</b></td>
					<?php
					  while($i<$count){?>
					  <td><b><?php echo $sub[$i]   ?></b></td><?php $i = $i+1;}
					  $i=0;
					  ?>
                    
                </tr>
             <tr>
                    <td><b>S.No</b></td>
                    <td><b>Faculty Name/Parameters</b></td>
                    <?php
					  while($i<$count){?>
					  <td><?php echo '<b>'. $faculty[$i].'</b>'   ?></td><?php $i = $i+1;}
					  $i = 0;
					  ?>
                </tr>
                <tr>
                    <td>
                        1.
                    </td>
                    <td>
                        <p>Lectures were well prepared & Organized</p>
                    </td>
					<?php 
					 $j=0;
					  while($i<$count){?>
					  
                    <td>
                      
                           	<?php
                           	print '<select class="form-control" required name='.$j.$i.' >';
							 ?>
							 
                            <option value="">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
					
					<?php 
					
					$i = $i+1;}
					   $j = $j+1;
					  ?>
                </tr>
                <tr>
                    <td>
                        2.
                    </td>
                    <td>
                        <p>Blakboard writing/visual aids are clear & organized</p>
                    </td>
                    <?php
					 $i=0;
					  while($i<$count){?>
                    <td>
                       
                          <select class="form-control" required <?php print 'name='.$j.$i ?> >
					
					
                            <option value="">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td><?php 
					
					$i = $i+1;}
					   $j = $j+1;
					  ?>
                </tr>
               <tr>
                    <td>
                        3.
                    </td>
                    <td>
                        <p>Lectures deleivered with emphasis on fundamental concepts, examples</p>
                    </td>
                     <?php
					 $i=0;
					  while($i<$count){?>
                    <td>
                        <?php
                           	print '<select class="form-control" required name='.$j.$i.'>';
							 ?>
                            <option value="">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td><?php 
					
					$i = $i+1;}
					   $j = $j+1;
					  ?>
                </tr>
                <tr>
                    <td>
                        4.
                    </td>
                    <td>
                        <p>Teachers engages classes regularly & maintains discipline</p>
                    </td>
                    <?php
					 $i=0;
					  while($i<$count){?>
                    <td>
                        <?php
                           	print '<select class="form-control" required name='.$j.$i.'>';
							 ?>
                            <option value="">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td><?php 
					
					$i = $i+1;}
					   $j = $j+1;
					  ?>
                </tr>
                <tr>
                    <td>
                        5.
                    </td>
                    <td>
                        <p>Difficult topics were taught with adequate attention & ease</p>
                    </td>
                     <?php
					 $i=0;
					  while($i<$count){?>
                    <td>
                        <?php
                           	print '<select class="form-control" required name='.$j.$i.'>';
							 ?>
                            <option value="">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td><?php 
					
					$i = $i+1;}
					   $j = $j+1;
					  ?>
                </tr>
                <tr>
                    <td>
                        6.
                    </td>
                    <td>
                        <p>Faculty able to deliver lectures with good communication skills</p>
                    </td>
                     <?php
					 $i=0;
					  while($i<$count){?>
                    <td>
                        <?php
                           	print '<select class="form-control" required name='.$j.$i.'>';
							 ?>
                            <option value="">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td><?php 
					
					$i = $i+1;}
					   $j = $j+1;
					  ?>
                </tr>
                <tr>
                    <td>
                        7.
                    </td>
                    <td>
                        <p>Students are encouraged to ask questions, to make lectures interactive & lively</p> 
                    </td>
                    <?php
					 $i=0;
					  while($i<$count){?>
                    <td>
                        <?php
                           	print '<select class="form-control" required name='.$j.$i.'>';
							 ?>
                            <option value="">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td><?php 
					
					$i = $i+1;}
					   $j = $j+1;
					  ?>
                </tr>
                <tr>
                    <td>
                        8.
                    </td>
                    <td>
                        <p>Teacher is effective in preparing students for exams</p>
                    </td>
                     <?php
					 $i=0;
					  while($i<$count){?>
                    <td>
                        <?php
                           	print '<select class="form-control" required name='.$j.$i.'>';
							 ?>
                            <option value="">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td><?php 
					
					$i = $i+1;}
					   $j = $j+1;
					  ?>
                </tr>
                <tr>
                    <td>
                        9.
                    </td>
                    <td>
                        <p>Evaluation is fair and impartial & helping you to improve</p>
                    </td>
                     <?php
					 $i=0;
					  while($i<$count){?>
                    <td>
                        <?php
                           	print '<select class="form-control" required name='.$j.$i.'>';
							 ?>
                            <option value="">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td><?php 
					
					$i = $i+1;}
					   $j = $j+1;
					  ?>
                </tr>
                <tr>
                    <td>
                        10.
                    </td>
                    <td>
                        <p>Faculty is accessible to students for guidance & solving queries</p>
                    </td>
                     <?php
					 $i=0;
					  while($i<$count){?>
                    <td>
                        <?php
                           	print '<select class="form-control" required name='.$j.$i.'>';
							 ?>
                            <option value="">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td><?php 
					
					$i = $i+1;}
					   $j = $j+1;
					  ?>
                </tr>
            </table><br><br>
 
                      <center>  <input class="btn btn-primary" type="submit"  value="Submit" name="theory_submit"/></center>
   
        </form>
		
		</div>
    </body>
</html>
