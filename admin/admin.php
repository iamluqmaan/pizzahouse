<?php

//connecting to database
	//takes four parameters, localhost, username, password and the name of the database.
	$conn = mysqli_connect('localhost', 'luqman', 'obalola', 'ninja_pizza');

	//checking connection
	if (!$conn) {
		echo 'connection error: ' . mysqli_connect_error();
	}

	if(isset($_POST['loginBtn'])){
		session_start();
	}
	if (isset($_SESSION['password'])) {
		session_destroy();
		header("Location: staffRegistration.php");
		
	}else{


	if (isset($_POST['loginBtn'])) {
		$password = $_POST['password'];
		
		if (empty($password) ) {
			$msg = "required field";
		}elseif (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)) {
			$msg = "Invalid ID Format";
		}else{
			$query = "SELECT * FROM admin 
                        WHERE password ='$password' ";
			$result = mysqli_query($conn, $query);
			$num_rows = mysqli_num_rows($result);
			if ($num_rows == 1) {
				while ($arr = mysqli_fetch_array($result)) {
					$password = $arr['password'];
					$fullname = $arr['Fname'];
					$dateandtime = $arr['created_at'];

					$_SESSION['password'] = $password; 
					$_SESSION['fName'] = $fullname;
					$_SESSION['created_at']  = $dateandtime;
					session_destroy();
					header("Location: staffRegistration.php");
					
				}
			}else{
				$msg = "Invalid Login Details";
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


<div class="container col-4" style="margin-top: 30px;">
	<div class="card" style="padding: 15px;">
		<form action="admin.php" method="POST">
			<?php
				echo "<span style='color: red; font-weight: bolder;'>" .@$msg."<br></span>";
			?>
			<label>Admin</label>
			<input type="password" name="password" placeholder="Type in your ID" class="form-control">
			<input type="submit" name="loginBtn" class="btn brand z-depth-0 mt-3" value="Login">
		</form>
	</div>
</div>








<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php
	}
?>