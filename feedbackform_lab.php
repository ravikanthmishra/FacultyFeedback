<html>
    <head>
        <title>:: Dhanekula Feedback System ::</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="bootstrap.css">

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

</script>
    </head>
    <body>
	<table>
		  <tr ><td colspan="2"><img src="diet.png" width="100%" height="60%" alt="college header"></td></tr>
		</table>
	<?php 
	session_start();
	 if(!isset($_SESSION['theory'])){
		 header("Location:feedbackform.php");
	 }
	 if(!isset($_SESSION['theory'])){
		 header("Location:feedbackform.php");
	 }
	 if(isset($_SESSION['lab1']) && (!isset($_SESSION['suggestions']))){
		 header("Location:suggestions.php");
	 }
	 else if(isset($_SESSION['lab1'])){
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
			
			$query = mysqli_query($connect," SELECT name,lab FROM faculty_lab WHERE year=$year AND sec='$sec' AND sem=$sem and dept='$dept' AND batch=$batch AND course='$course' AND (elective=$elective OR elective=0) ") or die("cannot process query");
			$i=0;
			
			while($row = mysqli_fetch_array($query)){
				
				$l_faculty[$i] = $row['name'];
				$lab[$i] = $row['lab'];
				$i = $i+1;
			}
			$count = $i;
			$_SESSION['l_faculty'] = $l_faculty;
			$_SESSION['lab'] = $lab;
			$_SESSION['lcount']= $count;
			?>
       
		<div class="container">
          <h3 align="center" > <u> DHANEKULA FEEDBACK SYSTEM </u> </h3>
		<?php
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
            <table border="2" align="center" class="table table-bordered table-striped">
                <tr>
                    <td><b>Year-Semester:<?php echo $year.'-'.$sem?></b></td>
                    <td><b>Section:<?php echo $sec ?></b></td>
                    <td><b>Batch:<?php $next_batch=$batch+4; echo $batch.'-'.$next_batch; ?></b> </td>
                </tr>
            </table>
            <br>
            <table border="2" align="center" class="table table-bordered ">
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
            <h4 align="center"><i>student feedack on Lab Courses </i></h4>
            <table border="2" align="center" class="table table-bordered table-striped">
               <tr>
                    <td colspan="2">Name of the Laboratory</td>
					<?php
					  $i = 0;
					  while($i<$count){?>
					  <td><b><?php echo $lab[$i];   ?></b></td><?php $i = $i+1;}
					  $i=0;
					  ?>
                    
                </tr>
                <tr>
                    <td>S.No</td>
                    <td>Faculty Name/Parameters</td>
                    <?php
					  while($i<$count){?>
					  <td><b><?php echo $l_faculty[$i]   ?></b></td><?php $i = $i+1;}
					  $i = 0;
					  ?>
                </tr>
                <tr>
                    <td>
                        1.
                    </td>
                    <td>
                        <p>Was the selection of experiment commensurate with the theory</p>
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
                        <p>Was the experiment leading towards proper conclusions/interpretations</p>
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
                        <p>Whether lab instructor helped you in understanding the experimental observations, Outcome and explaninig the difficulties raised while performing the experiment</p>
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
                        <p>Whether the experiments trigger you for any creative idea</p>
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
                        <p>Whether experimental set-up was well maintained, fully operational & adequate</p>
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
                        <p>Whether precise, updated & self explanatory lab manulas were provided</p>
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
                        <p>Whether submission of experimental write-up was routine & repetitive</p> 
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
                        <p>Whether lab instructor does assesssment of experiment regularly and gives feedback</p>
                    </td>
                     <?php
					 $i=0;
					  while($i<$count){?>
                    <td>
                        <?php
                           	print '<select  class="form-control" required name='.$j.$i.'>';
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
                        <p>Whether the entire lab session was useful in clarifying you knowledge of the theory</p>
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
                        <p>Whether you are confident with the use of the concepts, instruments and their</p>
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
            </table>
           <center>  <input class="btn btn-primary" type="submit"  value="Submit" name="lab_submit"/></center>
   
        </form>
		</div>
    </body>
</html>
