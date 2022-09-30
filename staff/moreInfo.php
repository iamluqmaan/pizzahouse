<?php 

include('../database/db_connect.php');


if(isset($_POST['delete'])){

	$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

	$sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

	if(mysqli_query($conn,$sql)){

		header('location: orders.php');

	}else{

		echo 'query error'. mysqli_error($conn);
	}

}



if(isset($_GET['id'])){

	$id = mysqli_real_escape_string($conn, $_GET['id']);

	$sql= "SELECT * FROM pizzas WHERE id = $id";

	$result = mysqli_query($conn, $sql);

	$pizza = mysqli_fetch_assoc($result);

	mysqli_free_result($result);

	mysqli_close($conn);

	// print_r($pizza);
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 
<?php    include('../sharables/header.php'); ?>


<div class="container center white-text">
	
	<?php if($pizza): ?>

		<h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
		<p>created by: <?php echo htmlspecialchars($pizza['email']) ?></p>
		<p><?php echo date($pizza['created@']) ?></p>
		<p>ingredients: <?php echo htmlspecialchars($pizza['ingredients']) ?></p>

	<form action="moreInfo.php" method="POST">
		<input type="hidden" name="id_to_delete"value="<?php echo $pizza['id'] ?>">
		<input type="submit" name="delete" value="delete" class = "btn brand z-depth-0">
	</form>
 
	<?php else: ?>
 
 <h5>No such pizza order at the moment</h5>

	<?php endif ?>
</div>


<?php include('../sharables/footer.php'); ?>

 </body>
 </html>