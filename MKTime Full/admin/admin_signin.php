<?php

# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
  
echo '<p id="err_msg" style = "font-size: 20px; font-weight: 400px;">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again <a href="admin_signin.php"></a></p>' ;
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
          <link rel="stylesheet" href="../admin/config/stylesheet1a.css">  

<body style = "background: rgba(71, 115, 122, 1);">

    <div class = "container p-3"> 
      <div class = "col-12">
        <div class = "row">   
          <div class = "col-12"> 
            <h1>MK Time</h1>
          </div>  

        </div>
      </div>  
    </div>

<?php
  include 'include/nav.php';        

  echo ' 
        <section>
          <form action="login_action_admin.php" method="post">
            <div id="admin" class= "container-fluid" class="col-lg-12 col-md-12 col-sm-12"> 
              <div class="card card-one">
                <div class="card-body" style = "background-color: rgba(36, 109, 121, 1);"> 

                    <h3 class="text-center" id="signin"> Sign In </h3>

                        <div class="p-2 mb-2 mt-2">
                            <label for="InputEmail" class="form-label2">Enter your Email address</label>
                            <center><input type= "text" class = "admin-input" name = "email" class="form-control" id="InputEmail" required placeholder="*Enter Email" aria-describedby="InputEmail"></center>
                        </div>
            
                        <div class="p-2 mb-2 mt-2">
                            <label for="inputPassword" class="form-label2">Enter your Password</label>
                              <center><input type="password" class = "admin-input" name = "pass" id="inputPassword" class="form-control" required placeholder="*Enter Password" aria-describedby="passwordHelpBlock"></center>
                                
                        </div>

                            <div class="text-center">
                              <input type = "submit" class="button" id = "btn" value = "Sign In" role="button">
                            </div>

                </div> 
              </div>
            </div>
          </form>
        </section>
</body>
';

    include 'include/footer.php';
?>


