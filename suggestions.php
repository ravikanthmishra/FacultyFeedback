<html lang="en">
<head>
<link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
  <title>Suggestions/complaint page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<body>
<table>
		  <tr ><td colspan="2"><img src="diet.png" width="100%" height="60%" alt="college header"></td></tr>
		</table>
<?php
session_start();

if((!isset($_SESSION['course']))){
   header("location:index.php");
   }
   
  if((!isset($_SESSION['lab1']))){
   header("location:feedbackform_lab.php");
   }
   if((isset($_SESSION['suggestions']))){
   header("location:success.php");
   }
   
  $year = $_SESSION['year'];
  $batch = $_SESSION['batch'];
  $sec = $_SESSION['sec'];
  $sem = $_SESSION['sem'];
?>

<div class="container">

  <h2>Suggestions </h2>
  <table border="2" align="center" class="table table-bordered table-striped">
                <tr>
                    <td><b>Year-Semester:<?php echo $year.'-'.$sem?></b></td>
                    <td><b>Section:<?php echo $sec ?></b></td>
                    <td><b>Batch:<?php $next_batch=$batch+4; echo $batch.'-'.$next_batch; ?></b> </td>
                </tr>
            </table>
  <p></p>      
  <form action="process.php" method="POST" autocomplete = "false">  
  <table class="table">
    <thead>
      <tr>
        <th>S.no</th>
        <th>Suggestion/Complaint</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><input type = "text" class="form-control" name="0"></td>
      </tr>
      <tr>
        <td>2</td>
        <td><input type = "text" class="form-control" name="1"></td>
      </tr>
	  <tr>
        <td>3</td>
        <td><input type = "text" class="form-control" name="2"></td>
      </tr>
	  <tr>
        <td>4</td>
        <td><input type = "text" class="form-control" name="3"></td>
      </tr>
	  <tr>
        <td>5</td>
        <td><input type = "text" class="form-control" name="4"></td>
      </tr>
	  </tbody>
	    
  </table>
   <input type = "submit" name="suggestions" value="submit" class="btn btn-primary"/>
   <input type = "submit" name="more_suggestions" value="Add More Suggestions/complaint" class="btn btn-primary"/>
  </form>
</div>

</body>
</html>
