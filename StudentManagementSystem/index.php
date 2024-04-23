<?php

	error_reporting(0);
	session_start();
	session_destroy();

	if($_SESSION['message'])
	{
		$message=$_SESSION['message'];

		echo"<script type='text/javascript'>
			
			alert('$message');

		</script>";
	}


	$host="localhost";
	$user="root";
	$password="";
	$db="worldbridge";

	$data=mysqli_connect($host,$user,$password,$db);

	$sql="SELECT * FROM teacher";
	
	$sql1="SELECT * FROM course";

	$result=mysqli_query($data,$sql);

	$result1=mysqli_query($data,$sql1);


?>






<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body style="background-color: #FFFDD0;">


	<nav>
		<a href="index.php" style="cursor: pointer;">
		<label class="logo" style="color: limegreen;">WORLD</label>
		<label class="logo1">BRIDGE</label>
		</a>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="index.php/#admission">Admission</a></li>
			<li><a href="login.php" class="btn btn-success">Login</a></li>
		</ul>

	</nav>


	<div class="section1">
		
		<label class="img_text">TrustWorthy Gateway For Japan</label>
		<img class="main_img" src="japan2.jpg">
	</div>


	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<img class="welcome_img" src="3333.jpg">
				
			</div>

			<div class="col-md-8">

				<h1>Welcome to WorldBridge</h1>

				<p>
					We are a team of educational consultants specialized in overseas Education and Immigration services. Our specialist have been counseling students for their further and higher education plans abroad. We are directly connected to and representing many universities and colleges in Japan. We have a branch office in Japan that makes us easier to send and settle our students when they go to Japan. Some of our team members are graduated from Japan as well that is helping us to facilitate situation of Japanese educational institutes. We are here to guide you all the way from confirmation of university admissions through successful visa interviews and enrolment at the college of your choice.
				</p>
				
			</div>
			

		</div>
		

	</div>


	<center>
		<h1>Our Teachers</h1>
	</center>


	<div class="container">

		<div class="row">
			<?php

				while($info=$result->fetch_assoc())
				{
			?>

			<div class="col-md-4">
				<?php
			$txt =$info["image"];
			?>
				<img class="teacher" src="<?php echo $txt ?>">
				
				

				<h3><?php echo "{$info['name']}" ?></h3>

				<h5><?php echo "{$info['description']}" ?></h5>
				
			</div>
			<?php

				}
			?>

			
			

		</div>
		

	</div>






	<center>
		<h1>Our Courses</h1>
	</center>


	<div class="container">

		<div class="row">

			

			<?php

				while($info1=$result1->fetch_assoc())
				{
			?>

			<div class="col-md-4">
				<?php
			$txt =$info1["image"];
			?>
				<img class="course" src="<?php echo $txt ?>">
				
				

				<h3><?php echo "{$info1['name']}" ?></h3>

				<h5><?php echo "{$info1['description']}" ?></h5>
				
			</div>
			<?php

				}
			?>
			

		</div>
		

	</div>


	<center>
		<h1 class="adm" id="admission">Admission Form</h1>

	</center>


	<div align="center" class="admission_form">

		<form action="data_check.php"method="POST">
			
		<div class="adm_int">
			<label class="label_text">Name</label>
			<input class="input_deg" type="text" name="name" style="padding-left: 20px;">
		</div>

		<div class="adm_int">
			<label class="label_text">Email</label>
			<input class="input_deg" type="text" name="email" style="padding-left: 20px;">
		</div>

		<div class="adm_int">
			<label class="label_text">Phone</label>
			<input class="input_deg" type="text" name="phone" style="padding-left: 20px;">
		</div>
		<div class="adm_int">
			<label class="label_text">Message</label>
			<textarea class="input_txt" name="message" style="padding: 20px;"></textarea>
		</div>

		<div class="adm_int" >
			
			
			<input class="btn btn-primary" id="submit" type="submit" value="Apply" name="apply" style="padding-left: 20px;" >
			
		</div>


		</form>
		
	</div>


	<footer>
		<center>
		<p class="credit"> &copy; copyright  @ <?php echo date('Y'); ?> by <span> World Bridge Educational Consultancy </span> </p>
		</center>
	</footer>


</body>
</html>