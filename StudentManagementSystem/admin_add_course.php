
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

	if (isset($_POST['add_course'])) {
	
		$c_name=$_POST['name'];

		$c_description=$_POST['description'];

		$file=$_FILES['image']['name'];

		$dst="./image/".$file;

		$dst_db="image/".$file;

		move_uploaded_file($_FILES['image']['tmp_name'],$dst);

		$sql="INSERT INTO course (name,description,image) VALUES('$c_name','$c_description','$dst_db')";

		$result=mysqli_query($data,$sql);

		if($result)
		{
			header('location:admin_add_course.php');
		}

	}



?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>

	<style type="text/css">
		
		.div_deg
		{
			background-color: skyblue;
			padding-top: 70px;
			padding-bottom: 70px;
			width: 500px;
		}



	</style>

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
		
		<h1>Add Course</h1> <br><br>
		<div class="div_deg">
			
			<form action="#" method="POST" enctype="multipart/form-data">
				
				<div>
					<label>Course Name :</label>
					<input type="text" name="name">
				</div>

				<br>

				<div>
					<label>Description :</label>
					<textarea name="description"></textarea>
				</div>
				<br>

				<div>
					<label>Image :</label>
					<input type="file" name="image">
				</div>
				<br>

				<div>
					
					<input type="submit" name="add_course" value="Add Course" class="btn btn-primary">
				</div>
			</form>
		</div>

		</center>

	</div>

</body>
</html>