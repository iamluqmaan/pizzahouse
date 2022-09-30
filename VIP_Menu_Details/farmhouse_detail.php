<?php
include '../database/db.php';
include '../sharables/navbar.php ';

$phoneNos = $address = '';

$errors = array('phoneNos' =>'' , 'address' => '');

if(isset($_POST['submit'])){

  
  if(empty($_POST['phoneNos'])){
    $errors['phoneNos'] = 'Required field!'.'<br />';
  }else{
    $phoneNos = $_POST['phoneNos'];
      if(!preg_match('/((^(\+234-|0)\d{3})-?\d{7})/', $phoneNos)){
        $errors['phoneNos'] = 'must be of exact type and length'.'<br />';
        }
    }

    if(empty($_POST['address'])){
      $errors['address'] = 'Required field!'.'<br />';
    }else{
      $address = $_POST['address'];
      if(!preg_match("/^[0-9]{2,4},\s[a-zA-Z]/", $address)){
      $errors['address'] = 'Must be of typical address type'.'<br />';
      }
    }
    if(isset($_POST['toppings'])){
      $toppings = $_POST['toppings'];
    }
    if(isset($_POST['delivery'])){
      $delivery = $_POST['delivery'];
    }
    if(isset($_POST['quantity'])){
      $quantity = $_POST['quantity'];
    }
    if(isset($_POST['size'])){
      $pizzaSize = $_POST['size'];
    }
    

  // ckecking if the ckeckbox is selected
    if(isset($_POST['details'])){
        $details = "Yes";
    }else{
        $details = "No";
    }

    if (array_filter($errors)) {
    // print_r( $errors);
    }else{
    
    $phoneNos = mysqli_real_escape_string($conn, $_POST['phoneNos']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
   
    
    $sql = "INSERT INTO farmhouse_pizza
      (phoneNos, address, toppings, pizzaSize, quantity, delivery, details) 
          VALUES
      ('$phoneNos', '$address', '$toppings', '$pizzaSize', '$quantity', '$delivery', '$details')";

          //save to db and check
          if(mysqli_query($conn, $sql)){
            //sucess
            
            header("Refresh:0; url=../customers/dashboard.php");
              echo "<script>alert('Your VIP Order is Received, Thank you:)')</script>";
          }else{

            echo 'query error'. mysqli_error($conn);
          }        
   }
}
?>
<head>
    <style>
   section{
			background: rgb(0,0, 0);
      background-size:cover;
      background-repeat: no-repeat;
			margin:20px;
			border-radius:10px;
			min-height:550px;
			max-width: 100%;
			position:relative;
      opacity: .9;
		}
    .img{
			width:100px;
			height:100px;
			margin: 40px auto -30px;
			display: block;
			position:relative;
			top: -30px;
    }
    .img-div{
      margin-bottom: 10px;
    }
    .red-text{
      color: #c5b358;
      font-size:12px;
      font-weight:bold;
    }
    </style>
</head>

<section class="p-3">
   <div class="img-div p-2"> <img src="../images/pizza5.png"class="img" alt=""></div>
  
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<div class="form-group row">
    <label class="col-lg-2 col-form-label" >Phone Number</label>
    <div class="col-lg-10 col-sm-12">
    <div class="red-text"><?php echo $errors['phoneNos']; ?></div>
      <input type="phone number" value="<?php echo htmlspecialchars( $phoneNos ) ?>"
       name="phoneNos"  class="form-control" placeholder="must be of type +234-333-3333333">
    </div>
  </div>
  <div class="form-group row">
    <label for="" class="col-lg-2 col-form-label">Address</label>
    <div class="col-lg-10 col-sm-12">
    <div class="red-text"><?php echo $errors['address']; ?></div>
      <input type="address" name="address" value="<?php echo htmlspecialchars( $address ) ?>"
       class="form-control" placeholder="Address:">
    </div>
    
  </div>

  <div class="custom-control custom-checkbox mb-3">
    <input type="checkbox" name="details" class="custom-control-input" id="customControlValidation1">
    <label class="custom-control-label" for="customControlValidation1">save details</label>
    
    <div class="invalid-feedback">Example invalid feedback text</div>
  </div>

  
<div class="row">
  <div class="form-group col">
    <select name="toppings" class="custom-select">
      <option value="no extra toppings">Choose toppings</option>
      <option>Extra veggies</option>
      <option>Extra bbq sauce </option>
      <option>Extra ham</option>
      <option>Extra egg</option>
    </select>
    <div class="invalid-feedback">Example invalid custom select feedback</div>
  </div>

  <div class="form-group col">
    <select name="size" class="custom-select">
    <option value="default size">Choose Pizza Size</option>
      <option>small(sm)</option>
      <option>medium(md)</option>
      <option>large(lg)</option>
      <option>Xtra large(Xl)</option>
    </select>
    <div class="invalid-feedback">Example invalid custom select feedback</div>
  </div>
</div>


  <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2" required for="inlineFormCustomSelect">Choose Pizza quantity</label>
      <select name="quantity"  class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
      </select>
    </div>
    
  <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2" for="inlineFormCustomSelect">Pizza delivery</label>
      <select name="delivery" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option>Home delivery</option>
        <option>Take out</option>
      </select>
    </div>
    
    

    </div>
    <div style="text-align:center;" class="col-12 my-1 centered mt-5">
      <button  type="submit" name="submit" class="btn btn-primary">Place order</button>
    </div>
  </div>

</form>

</section>