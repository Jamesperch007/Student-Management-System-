<?php
session_start();
	if(!isset($_SESSION['username']))
	{
		header("location:login.php");
	}


	elseif($_SESSION['usertype']=='admin')
	{
		header("location:login.php");
	}






?>










<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Dashboard</title>

	<?php

	include 'student_css.php';

	?>

</head>
<body style="background-color: #FFFDD0;">

	<?php

	include 'student_sidebar.php';
	
	?>


	<div class="content">
		
		<h1>Student Dashboard</h1>

	</div>

</body>
</html>