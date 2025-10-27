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
              <form action="../admin/cart.php" method="post">
                <input type="image" class = "image-button" src="../admin/item_img/cart.jpg" alt="cart">
              </form>
            </div>
        </div>
      </div>  
    </div>

<?php
  include 'include/main_nav.php';

  echo '    <div class="container">
              <div id="him-her" class="row">    
                <h3>Timeless Pieces For Him</h3>
              </div>
            </div>  
  ';
   

	# Retrieve items from 'products' database table.
	$sql = "SELECT * FROM products WHERE item_id BETWEEN 1 AND 6" ;
	$result = mysqli_query( $link, $sql ) ;
	if ( mysqli_num_rows( $result ) > 0 )
	{
	# Display body section.
	
	while ( $rows = mysqli_fetch_array( $result, MYSQLI_ASSOC ))
	{
	echo '  
          <div id="product" class = "container">
            <div class="card" style = "background: rgba(26, 108, 108, 1);">
              <div class="card-body">
                <div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-3" style = " display: grid; place-items: center;">
                      <img src="../admin/item_img/'. $rows['item_img'].'" alt="'. $rows['item_desc'].'" class="card-img">
                    </div>

                    <div id = "c1" class="col-lg-6 col-md-6 col-sm-6" style = " display: grid; justify-items: top;">
                      <h4 class = "item1" class="card-title"> '. $rows['item_name'].'</h4>
                      <p class = "item2" class="card-text">'. $rows['item_desc'].'</p>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3" style = " display: grid;">
                        <p  class="card-text-price">&pound '. $rows['item_price'].'</p>
                        <a  href="added.php?id='.$rows['item_id'].'" role="button" class="btn1" >Add to Cart</a>
                    </div>
                           

                </div>
              </div>  
            </div>
          </div>
  </body>
';
	}

	# Close database connection.
	mysqli_close( $link) ; 
	}
	# Or display message.
	else { echo '<p>There are currently no items in the table to display.</p>
	' ; }

  include 'include/main_footer.php';  

?>

    <link rel="stylesheet" href="..\admin\config\stylesheet2s.css">  
 