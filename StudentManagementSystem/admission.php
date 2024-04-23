
<?php
session_start();
	if(!isset($_SESSION['username']))
	{
		header("location:login.php");
	}

	elseif($_SESSION['usertype']=='student')
	{
		header("location:login.php");
	}


	$host="localhost";
	$user="root";
	$password="";
	$db="worldbridge";

	$data=mysqli_connect($host,$user,$password,$db);

	$sql="SELECT * from admission";

	$result=mysqli_query($data,$sql);



?>




<!DOCTYPE html>
<html>
<head>
	<a href="adminhome.php" style="cursor: pointer;">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Admin Dashboard</title>
	</a>

	<?php

	include 'admin_css.php';
	?>

	
</head>
<body style="background-color: #FFFDD0;">

	<?php

	include 'admin_sidebar.php';
	?>


	<div class="content">
		<center>
		
		<h1>Applied For Admission</h1>

		<br><br>
		<table border="1px">
			<tr>
				<th style="padding:20px; font-size: 15px; background-color: skyblue;">Name</th>
				<th style="padding:20px; font-size: 15px; background-color: skyblue;">Email</th>
				<th style="padding:20px; font-size: 15px; background-color: skyblue;">Phone</th>
				<th style="padding:20px; font-size: 15px; background-color: skyblue;">Message</th>
			</tr>

			<?php


			while($info=$result->fetch_assoc())
			{
			?>




			<tr>
				<td style="padding: 20px; background-color: skyblue;">
					<?php
					echo "{$info['name']}";
					?>
				</td>
				<td style="padding: 20px; background-color: skyblue;">
					<?php
					echo "{$info['email']}";
					?>
				</td>
				<td style="padding: 20px; background-color: skyblue;">
					<?php
					echo "{$info['phone']}";
					?>
				</td>
				<td style="padding: 20px; background-color: skyblue;">
					<?php
					echo "{$info['message']}";
					?>
				</td>
			</tr>
			<?php
			 }
			?>



		</table>

		</center>

	</div>

</body>
</html>