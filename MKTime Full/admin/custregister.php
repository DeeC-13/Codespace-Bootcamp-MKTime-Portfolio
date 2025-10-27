<?php
  $background = "../admin/item_img/bgimg.jpg";
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
              <form action = "../admin/cart.php" method="post">
                <input type = "image" class = "image-button" class = "image-button" src="../admin/item_img/cart.jpg" alt="cart">
              </form>
            </div>
        </div>
      </div>  
    </div>

<?php
  include 'include/main_nav.php';      
?>

<?php
   
  # DISPLAY COMPLETE REGISTRATION PAGE.
  if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ){
      
  # Initialize an error array.
  $errors = array();

    # Check for a first name.
    if ( empty( $_POST[ 'first_name' ] ) ) {
       $errors[] = 'Enter your first name.' ; }
    else {
       $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; 
      }

    # Check for a last name.
    if (empty( $_POST[ 'last_name' ] ) ) {
       $errors[] = 'Enter your last name.' ; }
    else {
       $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; 
      }

    # Check for an email address:
    if ( empty( $_POST[ 'email' ] ) ) {
       $errors[] = 'Enter your email address.'; }
    else {
       $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; 
      }

    # Check for a password and matching input passwords.
    if ( !empty($_POST[ 'pass1' ] ) ) {
      if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] ) {
         $errors[] = 'Passwords do not match.' ; }
      else {
         $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; 
        }
    }
    else { $errors[] = 'Enter your password.' ; 
    }
    
    # Check if email address already registered.
    if ( empty( $errors ) ) {
      $sql = "SELECT customer_id FROM customers WHERE email='$e'" ;
      $result = @mysqli_query ( $link, $sql ) ;
      if ( mysqli_num_rows( $result ) != 0 ) $errors[] = 'Email address already registered. <a class="alert-link" href="signin.php">Sign In Now</a>' ;
    }
  
?>
    <link rel="stylesheet" href="../admin/config/stylesheet3s.css">  
<?php
  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) {

    $sql = "INSERT INTO customers (first_name, last_name, email, pass, reg_date) 
	          VALUES ('$fn', '$ln', '$e', '$p', NOW() )";
    
    $result = @mysqli_query ( $link, $sql ) ;
    
    if ($result) {
       echo "
                  <div class= \"container\">
                    <div class=\"alert alert-secondary\" role=\"alert\" style = \"background: rgba(26, 108, 108, 1);\">
          
                          <h4 class = \"alert-heading\"> Registered!</h4>
                          <p>You are now registered.</p>
                          <a class = \"alert-link\" href = \"signin.php\">Sign In</a> 

                    </div>  
                   </div>
                   </body>
                  ";
                  include 'include/main_footer.php';
                  
                }

    # Close database connection.
    mysqli_close($link); 

    exit();
  }

  # Or report errors.
  else {
    echo "
              <div class= \"container\">
                <div class=\"col-lg-12 col-md-12 col-sm-12\">
                  <div class=\"alert alert-secondary\" role=\"alert\" style = \"background: rgba(26, 108, 108, 1);\">

			            <h4 class =\"alert-heading\" id =\"err_msg\">The following error(s) occurred:</h4>
      
                   
              ";
          
                foreach ( $errors as $msg ) {
                  echo " - $msg<br>" ; }

              echo '<p>or please try again.</p>
                </div>
              </div>
            </div>';

    # Close database connection.
    mysqli_close( $link );
  }  
}

?>    

    <div class = "container">  
      <div class = "row">  
        <div id = "mk1">   
          <h2>Welcome to MK Time</h2>
        </div>  
      </div>
    </div>

  <section>
    <form action="custregister.php" method="post">
      <div id="info" class= "container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12"> 
          <div class="card card-one">
	          <div class="card-body">
            
                <div class="mb-3 mt-3">		 
                  <h3 class="text-center">Fill out to Register </h3>
                </div>

                  <div class="p-3 mb-3 mt-3">
                      <label for="InputFirstName" class="form-label">Enter your First Name</label>
                        <input type="text" class = "reg-input" name="first_name" class="form-control" id="InputFirstName" required placeholder="*First Name" aria-describedby="InputFirstName" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
                  </div>  

                    <div class="p-3 mb-3 mt-3">
                      <label for="InputLastName" class="form-label">Enter your Last Name</label>
                          <input type="text" class = "reg-input" name = "last_name" class="form-control" id="InputLastName" required placeholder="*Last Name" aria-describedby="InputLastName" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                    </div>  

                      <div class="p-3 mb-3 mt-3">
                          <label for="InputEmail1" class="form-label">Enter your Email address</label>
                            <input type="email" class = "reg-input" name = "email" class="form-control" id="InputEmail1" required placeholder="*email@example.com" aria-describedby="emailHelp" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                      </div>

                        <div class="p-3 mb-3 mt-3">
                          <label for="inputpass1" class="form-label">Enter your Password</label>
                              <input type="password" class = "reg-input" id="inputpass1" name = "pass1" class="form-control" required placeholder="*Create New Password" aria-describedby="passwordHelpBlock" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
                                <div id="passwordHelpBlock" class="form-text text-white">
                                    Your password must be 8-16 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                </div>
                        </div>

                          <div class="p-3 mb-3 mt-3">
                            <label for="inputpass2" class="form-label">Confirm your Password</label>
                                <input type="password" class = "reg-input" id="inputpass2" name = "pass2" class="form-control" required placeholder="*Confirm Password" aria-describedby="passwordHelpBlock" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
                                  <div id="passwordHelpBlock" class="form-text text-white">
                                      Your password must match.
                                  </div>
                          </div> 

                            <div class="text-center">
                              <input type = "submit" value = "Register" class="button" id = "btn1" role="button">
                            </div>

                              <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            </div>                    
          </div>                
        </div>
	    </div>
    </form>
  </section>
  
  
  
<?php
include 'include/main_footer.php';  
?>

    <link rel="stylesheet" href="../admin/config/stylesheet3s.css">  


