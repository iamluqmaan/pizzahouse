<?php 

	session_start();

	if (!isset($_SESSION['staff_id'])) {
		header("Location: ../views/index.php");
	}else{

	include("../database/db_connect.php");
	include("../sharables/header.php");

// write query for all pizzas
	$sql = 'SELECT title, ingredients, id FROM pizzas';
	$result = mysqli_query($conn, $sql);

	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);		
 ?>
<nav class="black z-depth-0 nav-bar">
		<div class="container">
			<a href="../views/index.php" class="brand-logo brand-text">Pizzahouse</a>
			<ul id="nav-mobile" class="right hide-on-samll-and-down">

				<li><a href="../logout.php" class="btn brand z-depth-0">log-out</a></li>
			</ul>
		</div>
		<div class="container p-3" style="text-align:center"><h4 style="color:#c5b358">Welcome! <?php echo $_SESSION['fName']; ?></h4> </div>
	</nav>
 
<!DOCTYPE html>
<html>

<?php include('../sharables/header.php'); ?>
<h4 class="center white-text p-5">Pizzas orders</h4>
<div class="container">
	<div class="row">
		<?php  foreach ($pizzas as $pizza): ?>
			<div class="col-lg-4 col-sm-6">
				<div class="card z-depth-0">
					<img src="../images/pizza.svg"class="pizza">
					<div class="card-content center">
						<h6><strong><?php echo htmlspecialchars($pizza['title']); ?></strong></h6>
						<ul>
							<?php foreach(explode(',', $pizza['ingredients'])as $ingredient){ ?>

								<li><?php echo htmlspecialchars($ingredient); ?></li>
			<?php } ?>
						</ul>
					</div>
					<div class="card-action center-align">
						<a class="brand-text" href="moreInfo.php?id=<?php echo $pizza['id']?>">more info </a>
					</div>  
				</div>
			</div>
		<?php  endforeach; ?>
	</div>
</div>

<?php include('../sharables/footer.php'); ?>
</html>
	
<?php 	} ?>
