<?php # LOGIN HELPER FUNCTIONS.

# Function to load specified or default URL.
function load( $page = 'admin_signin.php' )
{
  # Begin URL with protocol, domain, and current directory.
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;

  # Remove trailing slashes then append page name to URL.
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page ;

  # Execute redirect then quit. 
  header( "Location: $url" ) ; 
  exit() ;
}

# Function to check email address and password. 
function validate( $link, $email = '', $pwd = '')
{
  # Initialize errors array.
  $errors = array() ; 

  # Check email field.
  if ( empty( $email ) ) 
  { $errors[] = 'Enter your email address.' ; } 
  else  { $eme = mysqli_real_escape_string( $link, trim( $email ) ) ; }

  # Check password field.
  if ( empty( $pwd ) ) 
  { $errors[] = 'Enter your password.' ; } 
  else { $emp = mysqli_real_escape_string( $link, trim( $pwd ) ) ; }

  # On success retrieve employee_id, first_name, and last name from 'employee' database.
  if ( empty( $errors ) ) 
  {
    $sql = "SELECT employee_id, em_first_name, em_last_name FROM employee WHERE em_email='$eme' AND em_pass='$emp'" ;  
    $result = mysqli_query ( $link, $sql ) ;
    if ( @mysqli_num_rows( $result ) == 1 ) 
    {
      $rows = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ;
      return array( true, $rows ) ; 
    }
    # Or on failure set error message.
    else { $errors[] = 'Email address and password not found.' ; }
  }
  # On failure retrieve error message/s.
  return array( false, $errors ) ; 
}