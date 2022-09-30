<?php
	session_start();

	if (!isset($_SESSION['Email'])) {
		header("Location: register.php");
	}else{

	include("../database/db_connect.php");
	include("../sharables/header.php");

?>
<head>
	<style>
		.pizza-menu{
    		text-align: center;
			color:#c5b358;
		}
		.pizza-img{
			width:100px;
			height:100px;
			margin: 40px auto -30px;
			display: block;
			position:relative
			top: -30px

		}
		/* #f7f7f7 */
		section{
			background: rgb(20,20,20);
			margin: 40px auto -30px;
			border-radius:10px;
			min-height:550px;
			max-width: 100%;
			position:relative
		}
		.card{
			background-color: grey;
			color:white
		}
		h5{
			color:#c5b358 ;
		}
		h5:hover{
			font-size:20px;
			text-decoration: none;
			color:blue;
			transition: ease-in-out .3s
		}

	</style>
</head>
<nav class="black z-depth-0 nav-bar">
		<div class="container">
			<a href="../views/index.php" class="brand-logo brand-text hide-on-med-and-down">Pizzahouse</a>
			<ul id="nav-mobile" class="right">

				<li><a href="../logout.php" class="btn brand z-depth-0">log-out</a></li>
			</ul>
		</div>
		<div class="container p-2" style="text-align:center"><h4 style="color:#c5b358">Welcome! <?php echo $_SESSION['fName']; ?></h4> </div>
	</nav>
	</div>
	
<section>
	<div class="pizza-menu p-3">
		<h2>VIP MENU LISTS</h2>	
	</div>
		<div class="container">
			<div class="row">
				<div class="container card col-sm-2 col-lg-2" style="width: 15rem;">
  				    <img class="card-img-top p-3" src="../images/pizza10.png" alt="Card image cap">
  					<div class="card-body">
						<a href="../VIP_Menu_Details/pizzahouse_pepperoni_detail.php"><h5>Pizzahouse pepperoni special</h5></a>
    					<p class="card-text">
							Made from pepperoni, i.e spicy meat mixture of beef and pork. it is a simple yet tasty dish.
							But the main topping is pepperoni with seasonings made from red chili 
							powder and paprika.
						</p>
						
					</div>
				</div>
				<div class="container card col-sm-2 col-lg-2" style="width: 15rem;">
  				    <img class="card-img-top p-3" src="../images/pizza3.png" alt="Card image cap">
  					<div class="card-body">
					  <a href="../VIP_Menu_Details/aussie_pizza_detail.php"><h5>Aussie pizza</h5></a>
    					<p class="card-text">
							An australian-style pizza, made with BBQ sauce then topped with mozzarella cheese, 
							chopped egg. to enhance flavour, veggies like bell peppers, onions, garlic and mushrooms can also be added.
						</p>
						
					</div>
				</div>
				<div class="container card col-sm-2 col-lg-2" style="width: 15rem;">
  				    <img class="card-img-top p-3" src="../images/pizza4.png" alt="Card image cap">
  					<div class="card-body">
					  <a href="../VIP_Menu_Details/QuattroFormaggi_detail.php"><h5>Quattro Formaggi</h5></a>
    					<p class="card-text">
							A typical italian pizza with four different types of cheese to make it. Main ingredients:
								mozzella, fontine, gorgonzola and parmigiano cheese.
								The pizza is only loaded with cheese for cheese lovers !

						</p>
					</div>
				</div>
				<div class="container card col-sm-2 col-lg-2" style="width: 15rem;">
  				    <img class="card-img-top p-3" src="../images/pizza5.png" alt="Card image cap">
  					<div class="card-body">
					  <a href="../VIP_Menu_Details/farmhouse_detail.php"><h5>Farmhouse pizza</h5></a>
    					<p class="card-text">
						A famous authentic italian-style pizza.
							it includes mushroom, tomato, capsicum, tomatoes and red onions as toppings.
						</p>
					</div>
				</div>
				<div class="container card col-sm-2 col-lg-2" style="width: 15rem;">
  				    <img class="card-img-top p-3" src="../images/pizza6.png" alt="Card image cap">
  					<div class="card-body">
					  <a href="../VIP_Menu_Details/hawaiian_detail.php"><h5>Hawaiian pizza</h5></a>
    					<p class="card-text">
							A canadian-originated pizza with a different usual topping. it uses pineapple with either ham or chickens as
							its toppings, Do give this unique dish a try!
						</p>
					</div>
				</div>
				<div class="container card col-sm-2 col-lg-2" style="width: 15rem;">
  				    <img class="card-img-top p-3" src="../images/pizza7.png" alt="Card image cap">
  					<div class="card-body">
					  <a href="../VIP_Menu_Details/pesto_detail.php"><h5>Pesto pizza</h5></a>
    					<p class="card-text">
							it tastes delicious, loaded with pesto, corn, goat cheese and sun-dried tomatoes. Mozzarella cheese can be added by choice.
							This makes it taste mind-blowing.
						</p>
				</div>
				</div>
			</div>
		</div>
	</section>
<?php
	include("../sharables/footer.php");
?>
<?php 	} ?>