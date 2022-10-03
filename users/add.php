<?php 

include('../database/db_connect.php');

$_title = $_email = $_ingredients = '';

$errors = array('email' =>'' , 'title' => '',     'ingredients' => '' );

 if (isset($_POST['submit'])){
    
//     echo htmlspecialchars($_POST['email']);
//     echo htmlspecialchars($_POST['title']);
//     echo htmlspecialchars($_POST['ingredients']);
        
    //check email
    if(empty($_POST['email'])){
        $errors['email'] ='required field!'.'<br />';
    }else{
        $_email = $_POST['email'];

        if (!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
            
            $errors['email'] = 'incorrect email type'.'<br />';
        }
    }

    //check title
    if(empty($_POST['title'])){
        $errors['title'] = 'required field!'.'<br />';
    }else{
        $_title = $_POST['title'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $_title)){
            $errors['title'] = 'title must be letters and spaces'.'<br />';
        }
    }

    //check ingredients
    if(empty($_POST['ingredients'])){
        $errors['ingredients'] = 'required field!'.'<br />';
    }else{
        $_ingredients = $_POST['ingredients'];

         if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $_ingredients)){
            $errors['ingredients'] ='ingredients must be comma separated list'.'<br />';
        }
    }

    if (array_filter($errors)) {
       //echo 'errors in the form';
    } else {
        
        $_email = mysqli_real_escape_string($conn, $_POST['email']);
         $_title = mysqli_real_escape_string($conn, $_POST['title']);
          $_ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);


        //create a new sql variable
        
          $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$_title', '$_email', '$_ingredients')";

          //save to db and check
          if(mysqli_query($conn, $sql)){
            //sucess
            
            header("Refresh:0; url=../index.php");
              echo "<script>alert('Order Received, Thank you!')</script>";
          }else{

            echo 'query error'. mysqli_error($conn);
          }



        
      
    }


 }//end of validation

 ?>


<!DOCTYPE html>
<html>

<?php include('../sharables/header.php'); ?>

<section class="container" style="color:#FFF;">
    <h4 class="center mt-5">Order a pizza</h4>
    <form class="white"action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <label>your email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars( $_email ) ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
         <label>pizza title:</label>
        <input type="text" name="title"  value="<?php echo htmlspecialchars( $_title ) ?>">
         <div class="red-text"><?php echo $errors['title']; ?></div>
         <label>ingredients (comma separated):</label>
        <input type="text" name="ingredients"  value="<?php echo htmlspecialchars ($_ingredients)?>">
         <div class="red-text"><?php echo $errors['ingredients']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>


<?php include('../sharables/footer.php'); ?>


</html>