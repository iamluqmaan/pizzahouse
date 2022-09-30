<?php
include('../database/db_connect.php');
include('../sharables/header.php');
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../public/style.css">
	<style>
		.nav-bar{
			border-bottom:1px solid lightgray;
			/* opacity:.3; */
			max-width: 100%;
		}
		.nav-wrapper{
			display:flex;
			justify-content:space-evenly;
			align-items:center;
		}
		body{
			
		}
		section{
			background: black;
			margin:25px;
			border-radius:10px;
			min-height:100%;
			max-width: 100%;
			/* position:relative */
		}
		.homepage{
			max-width:100%;
			min-height:515px;
			position:relative;
		}
		.satisfy{
			font-size:50px;
			font-size:5vw;
			color: white;
			text-shadow: red;
			padding-top:0em;
			text-align:left;	
			font-family: 'Courier New', Courier, monospace;
			font-weight:900;
			line-height:1em;
			
		}
		
		span{
			color:crimson
		}
		div .base{
			max-width:100%;
			width:100%;
			min-height:100px;
		}
		div button{
			margin-top:20px;
			padding:10px 20px 10px 20px;
			border:2px solid crimson;
			background:none;
			color:white;
			letter-spacing: 2px;
		}
		.gif{
			max-width:100%;
		}
		@media screen and (max-width:700px) {
    		img .homepage{
        	width: 50%;
        	max-height:200px;
	    	}
		}

	</style>
</head>


<body>

<section class="p-2 rounded-3 shadow mt-4">

<nav class="black z-depth-0 nav-bar">
		<div class="container">
			<a href="../views/index.php" class="brand-logo brand-text hide-on-med-and-down">Pizzahouse</a>
			<ul id="nav-mobile" class="right">

			<li><a href="../customers/register.php" class="btn brand z-depth-0">join the VIP</a></li>	
			<li><a href="../auth/login.php" class="btn brand z-depth-0">login</a></li>
			</ul>
		</div>
	</nav>

	
	<div class="col-12 container mt-3">
		<div class="row shadow">
			<div class=" rounded-3 display col-lg-6 col-md-6 col-sm-12 ">
				<a href="../users/add.php"><img class ="homepage p-1" src="../images/homepage.jpg" alt="pizza image" 
				title="order now!"></a>
				<img src="../images/base.jpg" class="col-12 base" alt="">
				
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-12 text">

				<div class="row">
					<div class="col-lg-12">
					
						<div class="col-lg-6 col-md-12 col-sm-12 satisfy">
							<h> QUALITY F<span>OO</span>DS!</h>
						</div>
		
						<div class="col-12" id="gif">
						<img src="../images/34xu.gif" class="gif" alt="">
						</div>
					</div>
				</div>
				
				
			</div>
			
		</div>
	</div>
	</section>
<?php include('../sharables/footer.php'); ?>
	</body>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>