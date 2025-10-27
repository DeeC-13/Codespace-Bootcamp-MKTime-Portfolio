<?php
  $background = "../admin/item_img/bgimg.jpg";
  ?>

<?php

# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
  
echo '<p id="err_msg" style = "font-size: 20px; font-weight: 400px;">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="custregister.php">Register</a></p>' ;
}
?>

<!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MK Time</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>

  <body style="background-image: url('<?php echo $background;?>');">
    <div class = "container"> 
      <div class = "col-12">
        <div class = "row">   
          <div class = "col-11"> 
            <h1>MK Time</h1>
          </div>  

            <div class = "col-1">
              <form action="../admin/cart.php" method="post">
                <input type="image" class = "image-button" class = "image-button" src="../admin/item_img/cart.jpg" alt="cart">
              </form>
            </div>

        </div>
      </div>  
    </div>

<?php
  include 'include/main_nav.php';        

  echo ' <div class = "container">  
          <div class = "row">  
            <div id = "mk1">   
              <h2>Welcome to MK Time</h2>
            </div>  
          </div>
        </div>

<section>
  <form action="login_action.php" method="post">
    <div id="verify" class= "container-fluid" class="col-lg-12 col-md-12 col-sm-12"> 
      <div class="card card-two">
        <div class="card-body"> 

              <h3 class="text-center" id="signin"> Sign In </h3>

                <div class="p-3 mb-3 mt-3">
                  <label for="InputEmail" class="form-label">Enter your Email address</label>
                    <input type= "text" class = "signin-input" name = "email" class="form-control" id="InputEmail" required placeholder="*Enter Email" aria-describedby="InputEmail">
                </div>
    
                  <div class="p-3 mb-3 mt-3">
                    <label for="inputPassword" class="form-label">Enter your Password</label>
                      <input type="password" class = "signin-input" name = "pass" id="inputPassword" class="form-control" required placeholder="*Enter Password" aria-describedby="passwordHelpBlock">
                        <div id="passwordHelpBlock" class="form-text text-white">
                              Your password must be 8-16 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                        </div>
                  </div>

                    <div class="text-center">
                      <input type = "submit" class="button" id = "btn1" value = "Sign In" role="button">
                    </div>
        </div> 
      </div>
    </div>
  </form>
</section>
</body>
';

include 'include/main_footer.php';  

?>

    <link rel="stylesheet" href="..\admin\config\stylesheet3s.css">  

