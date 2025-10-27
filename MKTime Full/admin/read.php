<?php

  include 'include/nav.php';
  include 'images.php';
  
   if (!isset($_SESSION['employee_id'])) {
    header('Location: ../admin/admin_signin.php');
    exit();
  }

# Open database connection.
	require ( 'connect_db.php' );

    # Retrieve items from 'products' database table.
    $sql = " SELECT * FROM products";
	$result = mysqli_query( $link, $sql ) ;
	
        if (mysqli_num_rows($result) > 0) {
            echo 
                '<body style = "background: rgba(71, 115, 122, 1);">
                  <div class="container">
                    <div class="row">'; // Start the container and row

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                echo '
                        <div class="col-md-4"> 
                          <div class ="card" style = "background: rgba(17, 90, 101, 1);">
                            <div class ="card-body">

                                <div class = "row">     
                                    <h5 class="card-id_no" id = "id-no"> ID no: ' . $row['item_id'] . '</h5>
                                </div>
                                
                                <div class = "row"> 
                                    <img src="../admin/item_img/'.$row['item_img'].'" class="card-img-top" alt="Item image"></img>
                                </div>    
                                    
                                <div class = "row"> 
                                    <h5 class="card-title" id = "wname">' . $row['item_name'] . '</h5>
                                </div>    

                                <div class = "row">     
                                    <p class="card-desc" id = "desc">' . $row['item_desc'] . '</p>
                                </div>    

                                <div class = "row">     
                                    <p class="card-price">&pound' . $row['item_price'] . '</p>
                                </div>   
        
                            </div>
                          </div>
                        </div>'; 
            }

            echo '</div></div>
                '; 

        } else {
            echo '<p1 style="padding: 30px; color: white; font-family: Cyreal; font-size: 22px;">There are currently no items in the table to display.</p1>
                </body>';
        }

        # Close database connection.
        mysqli_close($link);
?>
	
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel = "stylesheet" href = "../admin/config/stylesheet3a.css">
	
<?php    
    include ('include/footer.php');
?>


