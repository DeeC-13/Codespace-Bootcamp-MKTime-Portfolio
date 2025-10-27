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

  if 
    (!isset($_SESSION['customer_id'])) {
    header('Location: ../admin/signin.php');
    exit();
  }

  # Check for passed total and cart.
  if (isset($_GET['total_price'])&&($_GET['total_price'] > 0) && (!empty($_SESSION['cart']))) {

    # Open database connection.
    require 'connect_db.php';

    # Store buyer and order total in 'orders' database table.
    $sql = "INSERT INTO orders ( customer_id, total_price, order_date ) 
            VALUES (". $_SESSION['customer_id'].",".$_GET['total_price'].", NOW() ) ";

	  $result = mysqli_query ($link, $sql);
	
    # Retrieve current order number.
    $order_id = mysqli_insert_id($link);
    
      
    # Retrieve cart items from 'products' database table.
    $q = "SELECT * FROM products WHERE item_id IN (";
    foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
    $q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
    $r = mysqli_query ($link, $q);

    # Store order contents in 'orders' database table.
    while ($rows = mysqli_fetch_array ($r, MYSQLI_ASSOC))
    {
      $query = "INSERT INTO order_contents ( order_id, item_id, quantity, price )
      VALUES ( $order_id, ".$rows['item_id'].",".$_SESSION['cart'][$rows['item_id']]['quantity'].",".$_SESSION['cart'][$rows['item_id']]['price'].")" ;
      $result = mysqli_query($link,$query);
    }
    # Close database connection.
    mysqli_close($link);

    # Display order number.
    echo "
                  <div class= \"container\">
                    <div class=\"col-lg-12 col-md-12 col-sm-12\">
                      <div class=\"alert alert-secondary\" role=\"alert\" style = \"background: rgba(26, 108, 108, 1);\">
                        
                        <h4>Thanks for your order.</h4>
                        <h4>Your Order Number Is #".$order_id."</h4>

                      </div>
                    </div>
                  </div> 
                ";

    # Remove cart items.  
    $_SESSION['cart'] = NULL ;

  }
    # Or display a message.
    else { 
          echo "
                  <div class= \"container\">
                    <div class=\"col-lg-12 col-md-12 col-sm-12\">
                      <div class=\"alert alert-secondary\" role=\"alert\" style = \"background: rgba(26, 108, 108, 1);\">
      
                          <h4>There are no items in your cart.</h4>
                                
                      </div>
                    </div>
                  </div>                  
          "; 
        }

  include 'include/main_footer.php';
?>
  
    <link rel="stylesheet" href="../admin/config/stylesheet5s.css">  
