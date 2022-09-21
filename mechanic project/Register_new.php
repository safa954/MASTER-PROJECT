<?php 



?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v3 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php include 'include/style.php' ?> 
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/logreg.css">
	</head>

	<body>

	<!-- Header -->
	<?php include 'include/header.php' ?> 

	<!-- Cart -->
	<?php include 'include/smal_cart.php'; ?> 

		<div class="wrapper" style="background-image: url('images/bg-registration-form-3.jpg'); margin-top: 70px;">
			<div class="inner">
				<form action="" method="post">
					<h3>Registration Form</h3>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="" name="username">Username:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-account-o"></i>
								<input type="text" class="form-control">
								<span><?php if(empty($_POST['username'])){ echo "please fill the username ";}?></span>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="" name="email">Email:</label>
							<div class="form-holder">
								<i style="font-style: normal; font-size: 15px;">@</i>
								<input type="text" name="email" class="form-control">
								<span><?php if(empty($_POST['email'])){ echo "please fill the email ";}?></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Password:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-lock-outline"></i>
								<input type="password" name="pass1" class="form-control" placeholder="********">
								<span><?php if(empty($_POST['pass1'])){ echo "please fill the password ";}?></span>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Repeat Password:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-lock-outline"></i>
								<input type="password" name="pass2"  class="form-control" placeholder="********">
							<span><?php if(empty($_POST['pass2'])){ echo "please Repeat Password ";}?></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Country:</label>
							<div class="form-holder select">
								<select name="" name="city" class="form-control">
									<option value="united states">United States</option>
									<option value="united kingdom">United Kingdom</option>
									<option value="viet nam">Viet Nam</option>
								</select>
								<i class="zmdi zmdi-pin"></i>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Gender:</label>
							<div class="form-holder select">
								<select name="gender" class="form-control">
									<option value="male">Male</option>
									<option value="femal">Female</option>
									<option value="other">Other</option>
								</select>
								<i class="zmdi zmdi-face"></i>
							</div>
						</div>
					</div>
					<div class="form-end">
				
						<div class="button-holder">
							<button type="submit">Register Now</button>
						</div>
						
					</div>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
