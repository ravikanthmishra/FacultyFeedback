<html>
<head>
<title>Report Success</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.css">
  
</head>
<body>
  <<table>
		  <tr ><td colspan="2"><img src="diet.png" width="100%" height="60%" alt="college header"></td></tr>
		</table><br><br>
	<div class="col-md-6 col-md-offset-3">
						<div class="alert alert-success">
							
							Thank You!
							Your Feedback Has been Submitted Succesfully
						</div></div>
	<?php
	session_start();
   $_SESSION['theory'] = true;
   $_SESSION['lab1'] = true;
   $_SESSION['suggestions'] = true;   
   
   exit;
   
	?>
</body>
<script type="text/javascript"> window.close()</script>
</html>	