<?php
  $background = "../admin/item_img/bgimg.jpg";
?>

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

    # Get passed product id and assign it to a variable.
    if (isset($_GET['id'])) $id = $_GET['id'];
          
    # Open database connection.
    require ('connect_db.php');

      # Retrieve selective item data from 'products' database table. 
      $sql = "SELECT * FROM products WHERE item_id = '$id'";
      $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
      $rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
      # Check if cart already contains one of this product id.
      if(isset($_SESSION['cart'][$id])) {

        # Add one more of this product.
        $_SESSION['cart'][$id]['quantity']++;

        echo ' 
              <section>                    
                <div id="product" class = "container" style = "place-items: center;">
                  <div class="col-lg-10 col-md-10 col-sm-10">
                    <div class="card" style = "background: rgba(26, 108, 108, 1);">
                      <div class="card-body">
                          <div class="row">
                            <p class = "card-text-added">'.$rows['item_name'].' has been added to your cart</p>
                            <img src ="item_img/'.$rows['item_img'].'"class = "card-img" alt = "'.$rows['item_name'].'">
                            <h4 class="card-text-title">'.$rows['item_name'].'</h4>
                            <center><p  class="card-text-price">&pound '. $rows['item_price'].'</p></center>
                            <a href = "productshim.php" id = "btn1" class = "btn">Continue Shopping</a>
                            <a href = "cart.php" id = "btn1" class = "btn">Go to Cart</a>
                          </div> 
                      </div>
                    </div>
                  </div>
                </div>
              </section>';
      }

      else {
          # Or add one of this product to the cart.
          $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $rows['item_price'] ) ;
    
        echo '
              <section>                    
                <div id="product" class = "container" style = "place-items: center;">
                  <div class="col-lg-10 col-md-10 col-sm-10">
                    <div class="card" style = "background: rgba(26, 108, 108, 1); style = "place-items: center;">
                      <div class="card-body">
                          <div class="row">
                            <p class = "card-text-added">'.$rows['item_name'].' has been added to your cart</p>
                            <img src ="item_img/'.$rows['item_img'].'"class = "card-img" alt = "'.$rows['item_name'].'">
                            <h4 class="card-text-title">'.$rows['item_name'].'</h4>
                            <center><p  class="card-text-price">&pound '. $rows['item_price'].'</p></center>
                            <a href = "productshim.php" id = "btn1" class = "btn">Continue Shopping</a>
                            <a href = "cart.php" id = "btn1" class = "btn">Go to Cart</a>
                          </div> 
                      </div>
                    </div>
                  </div>
                </div>
              </section>';

      }
      
  }

  # Close database connection.
  mysqli_close($link); 

  include 'include/main_footer.php';
  
?>

    <link rel="stylesheet" href="../admin/config/stylesheet4s.css">  
