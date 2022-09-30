<?php 
//connecting to database

	//takes four parameters, localhost, username, password and the name of the database.
    $conn = mysqli_connect('localhost', 'root', '', 'pizza_type_orders');

	
	//checking connection
	if (!$conn) {
		echo 'connection error: ' . mysqli_connect_error();
	}
    
 ?>