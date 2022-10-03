<?php
	include('../database/db_connect.php');

	if (isset($_POST['loginBtn'])) {
		$email = $_POST['email'];
		$fullname = $_POST['fullname'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];

		if (empty($email) or empty($fullname) or empty($password) or empty($cpassword)) {
			$msg =  "All fields are requiured";
		}elseif ($password != $cpassword) {
			$msg = "Password Mismatched";
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$msg = "Invalid Email Format";
		}else{



			// crud  create read, delete update


			if ($cpassword) {
					$query = "INSERT INTO users (fName, Email, password) VALUES ('$fullname', '$email', '$password')";
				$result = mysqli_query($conn, $query);
				if ($result) {
					header("Refresh:0; url=../index.php");
					echo "<script>alert('Registration Successful, Click Ok to Login')</script>";
				}else{
					header("Refresh:0; url=register.php");
					echo "<script>alert('Error in Registration')</script>";

				}
			}else{
				$msg = "cross-check all field again";
			}
			

		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background:url('../images/R.jpg');
			background-repeat: no-repeat;
			background-size:cover;">



<!-- http request => GET, POST etc. 
get is not secure
post is secure

 -->
<div class="container col-6" style="margin-top: 30px;">
	<div class="card" style="padding: 15px;">
		<form action="register.php" method="POST" enctype="multipart/form-data">
			<h2 style="text-align: center;color:grey;">Wanna join the Pizza gangs?</h2>
			<?php echo "<span style='color: red; font-weight: bolder;'>".  @$msg."</span>"; ?>
			<br><label>Email</label>
			<input type="text" name="email" placeholder="Email" class="form-control" value="">
			<label>Full Name</label>
			<input type="text" name="fullname" placeholder="Full Name"  class="form-control">
			<label>Password</label>
			<input type="password" name="password" placeholder="Password" class="form-control">
			<label>Confirm Password</label>
			<input type="password" name="cpassword" placeholder="re-enter password" class="form-control">
			<!-- <label>Passport</label>
			<input type="file" name="fileToUpload" class="form-control"> -->
			<input type="submit" name="loginBtn" class="btn btn-primary mt-3" value="Register">
			<a href="../auth/login.php">Already Have An Account?</a>
		</form>


		</div>

	</div>
</div>








<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>