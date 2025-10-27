<?php # PROCESS LOGIN ATTEMPT.

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Open database connection.
  require ( 'connect_db.php' ) ;

  # Get connection, load, and validate functions.
  require ( 'login_tools_admin.php' ) ;

  # Check login.
  list ( $check, $data ) = validate ( $link, $_POST[ 'email' ], $_POST[ 'pass' ] ) ;

  # On success set session data and display logged in page.
  if ( $check )  
  {
    # Access session.
    session_start();
    $_SESSION[ 'employee_id' ] = $data[ 'employee_id' ] ;
    $_SESSION[ 'em_first_name' ] = $data[ 'em_first_name' ] ;
    $_SESSION[ 'em_last_name' ] = $data[ 'em_last_name' ] ;
    load ( 'admin.php' ) ;
  }
  # Or on failure set errors.
  else { $errors = $data; } 

  # Close database connection.
  mysqli_close( $link ) ; 
}

# Continue to display login page on failure.
include ( 'admin_signin.php' ) ;

?>