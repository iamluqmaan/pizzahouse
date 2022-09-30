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
	if (isset($_SESSION['staff_id'])) {
		header("Location: ../staff/orders.php");
		session_destroy();
		header("Location: staffLogin.php");
	}else{


	if (isset($_POST['loginBtn'])) {
		$staff_id = $_POST['staff_id'];
		
		if (empty($staff_id) ) {
			$msg = "Required field";
		}elseif (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $staff_id)) {
			$msg = "Invalid ID Format";
		}else{
			$query = "SELECT * FROM staffs 
                        WHERE staff_id ='$staff_id' ";
			$result = mysqli_query($conn, $query);
			$num_rows = mysqli_num_rows($result);
			if ($num_rows == 1) {
				while ($arr = mysqli_fetch_array($result)) {
					$staff_id = $arr['staff_id'];
					$fullname = $arr['Fname'];
					$dateandtime = $arr['created_at'];

					$_SESSION['staff_id'] = $staff_id; 
					$_SESSION['fName'] = $fullname;
					$_SESSION['created_at']  = $dateandtime;

					header("Location: ../staff/orders.php");
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
		<form action="staffLogin.php" method="POST">
			<?php
				echo "<span style='color: red; font-weight: bolder;'>" .@$msg."<br></span>";
			?>
			<label>Your ID:</label>
			<input type="password" name="staff_id" placeholder="Type in your ID" class="form-control">
			<input type="submit" name="loginBtn" class="btn btn-primary mt-3" value="Login">
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