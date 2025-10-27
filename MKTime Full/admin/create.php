<?php
  include 'include/nav.php';

  if (!isset($_SESSION['employee_id'])) {
    header('Location: ../admin/admin_signin.php');
    exit();
 }
?>

<body style = "background: rgba(71, 115, 122, 1);">

  <div class = "container">    
    <center><h1>Add Item</h1></center>
  </div>  

      <div id = "create" class= "container-fluid">
        <form action="create.php" method="post">
          <div class = "card card-create">
            <div class = "card-body" style = "background-color: rgba(36, 109, 121, 1);">


              <!-- input box for item name  -->
               <label for="item_name" id = "input-title">Item_name:</label>
                    <center> <input type="text" class = "create-input"
                    id="item_name" 
                    class="form-control" 
                    name="item_name" 
                    required 
                    value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?> "></center>
                  
              <!-- input box for item description --> 
                <label for="item_desc" id = "input-title">Item_desc:</label>
                    <center><textarea id="item_desc" class = "create-input"
                    class="form-control" 
                    name="item_desc" 
                    required 
                    value="<?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?>">
                    </textarea></center>
                  
              <!-- input box for image path -->        
                <label for="item_img" id = "input-title">Item_img:</label>
                <input type="file" class = "create-input" 
                    id="item_img" 
                    class="form-control" 
                    name = "item_img"
                    required
                    value="<?php if (isset($_POST['item_img']))
                    echo $_POST['item_img']; ?>">

              <!-- input box for item price -->
                <label for="item_price" id = "input-title">Item_price:</label>
                    <center><input type="number" class = "create-input"
                    id="item_price" 
                    class="form-control" 
                    name="item_price" 
                    min="0" step="0.01" 
                    required 
                    value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>"><center>
            
              <!-- submit button -->
                <div class = "row">
                    <center><input type="submit" class="buton" id = "btn" name = "submit" value="Submit"></center>
                </div>

            </div>
          </div>  
      </form>
     </div>

</body>

<?php

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
	  # Connect to the database.
	  require ('connect_db.php'); 

    # Initialize an error array.
    $errors = array();

    # Check for item name .
    if ( empty( $_POST[ 'item_name' ] ) )
    { $errors[] = 'Enter the item name.' ; }
    else
    { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'item_name' ] ) ) ; }

    # Check for a item decription.
    if (empty( $_POST[ 'item_desc' ] ) )
    { $errors[] = 'Enter the item decription.' ; }
    else
    { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'item_desc' ] ) ) ; }
    
    # Check for a item image.
    if (empty($_POST['item_img'])) {
    $errors[] = 'Update image address.';
    } else {
    $img = mysqli_real_escape_string($link, trim($_POST['item_img'])); }
    
    # Check for a item price.
    if (empty( $_POST[ 'item_price' ] ) )
    { $errors[] = 'Enter the item price.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'item_price' ] ) ) ; }

    
   # On success data into my_table on database.
    if ( empty( $errors ) ) 
    {
      $sql = "INSERT INTO products (item_name, item_desc, item_img, item_price) 
	          VALUES ('$n','$d', '$img', '$p' )";
      $result = @mysqli_query ( $link, $sql ) ;
?>
      <link rel="stylesheet" href="../admin/config/stylesheet1a.css">
<?php
     if ($result)
     { echo '<p>New record created successfully</p>'; }
    
      # Close database connection.
      mysqli_close($link); 

      exit();
    }
    
    # Or report errors.
    else 
    {
      echo '<p>The following error(s) occurred:</p>' ;
      foreach ( $errors as $msg )
      { echo "$msg<br>" ; }
      echo '<p>Please try again.</p></div>';
      # Close database connection.
      mysqli_close( $link );
    
    }  
  }
 
?>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" href="../admin/config/stylesheet2a.css">

<?php      
  include 'include/footer.php';
?>

      