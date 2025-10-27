
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>MK Time</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

<body style = "background: rgba(71, 115, 122, 1);">
    <div class = "container"> 
      <div class = "col-12">
        <div class = "row">   
          <div class = "col-11"> 
            <h1>MK Time</h1>
          </div>  

        </div>
      </div>  
    </div>

<?php
  include 'include/nav.php';      
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
       $emfn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; 
      }

    # Check for a last name.
    if (empty( $_POST[ 'last_name' ] ) ) {
       $errors[] = 'Enter your last name.' ; }
    else {
       $emln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; 
      }

    # Check for an email address:
    if ( empty( $_POST[ 'email' ] ) ) {
       $errors[] = 'Enter your email address.'; }
    else {
       $eme = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; 
      }

    # Check for a password and matching input passwords.
    if ( !empty($_POST[ 'pass1' ] ) ) {
      if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] ) {
         $errors[] = 'Passwords do not match.' ; }
      else {
         $emp = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; 
        }
    }
    else { $errors[] = 'Enter your password.' ; 
    }
    
    # Check if email address already registered.
    if ( empty( $errors ) ) {
      $sql = "SELECT employee_id FROM employee WHERE em_email='$eme'" ;
      $result = @mysqli_query ( $link, $sql ) ;
      if ( mysqli_num_rows( $result ) != 0 ) $errors[] = 'Email address already registered. <a class="alert-link" href="admin_signin.php">Sign In Now</a>' ;
    }
  
?>
    <link rel="stylesheet" href="../admin/config/stylesheet1a.css">  
<?php
  # On success register user inserting into 'employee' database table.
  if ( empty( $errors ) ) {

    $sql = "INSERT INTO employee (em_first_name, em_last_name, em_email, em_pass, em_start_date) 
	          VALUES ('$emfn', '$emln', '$eme', '$emp', NOW() )";
    
    $result = @mysqli_query ( $link, $sql ) ;
?>    
        <link rel="stylesheet" href="../admin/config/stylesheet1a.css">  
<?php
    if ($result) {
       echo "
                  <div class= \"container\">
                    <div class=\"alert alert-secondary\" role=\"alert\" style = \"background: rgba(26, 108, 108, 1);\">
          
                          <h4 class = \"alert-heading\"> Registered!</h4>
                          <p>You are now registered.</p>
                          <a class = \"alert-link\" href = \"admin_signin.php\">Sign In</a> 

                    </div>  
                   </div>
                   </body>
                  ";
                  include 'include/footer.php';
                  
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

  <section>
    <form action="admin_register.php" method="post">
      <div id="reg" class= "container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12"> 
          <div class="card card-two">
	          <div class="card-body" style = "background-color: rgba(36, 109, 121, 1);">
            
                <div class="mb-3 mt-3">		 
                  <h3 class="text-center">Employee Register </h3>
                </div>

                  <div class="mb-3 mt-3">
                      <label for="InputFirstName" class="form-label1">Enter your First Name</label>
                        <center><input type="text" class = "reg-input" name="first_name" class="form-control" id="InputFirstName" required placeholder="*First Name" aria-describedby="InputFirstName" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"></center>
                  </div>  

                    <div class="mb-3 mt-3">
                      <label for="InputLastName" class="form-label1">Enter your Last Name</label>
                          <center><input type="text" class = "reg-input" name = "last_name" class="form-control" id="InputLastName" required placeholder="*Last Name" aria-describedby="InputLastName" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"></center>
                    </div>  

                      <div class="mb-3 mt-3">
                          <label for="InputEmail1" class="form-label1">Enter your Email address</label>
                            <center><input type="email" class = "reg-input" name = "email" class="form-control" id="InputEmail1" required placeholder="*email@example.com" aria-describedby="emailHelp" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></center>
                      </div>

                        <div class="mb-3 mt-3">
                          <label for="inputpass1" class="form-label1">Enter your Password</label>
                              <center><input type="password" class = "reg-input" id="inputpass1" name = "pass1" class="form-control" required placeholder="*Create New Password" aria-describedby="passwordHelpBlock" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"></center>
                                <div id="passwordHelpBlock" class="form-text text-white" style = "padding-left: 45px;">
                                    Your password must be 8-16 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                </div>
                        </div>

                          <div class="mb-3 mt-3">
                            <label for="inputpass2" class="form-label1">Confirm your Password</label>
                                <center><input type="password" class = "reg-input" id="inputpass2" name = "pass2" class="form-control" required placeholder="*Confirm Password" aria-describedby="passwordHelpBlock" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"></center>
                                  <div id="passwordHelpBlock" class="form-text text-white"style = "padding-left: 45px;">
                                      Your password must match.
                                  </div>
                          </div> 

                            <div class="text-center">
                              <input type = "submit" value = "Register" class="button" id = "btn" role="button">
                            </div>

            </div>                    
          </div>                
        </div>
	    </div>
    </form>
  </section>
  
  <link rel="stylesheet" href="../admin/config/stylesheet1a.css">
  
<?php
include 'include/footer.php';  
?>

      


