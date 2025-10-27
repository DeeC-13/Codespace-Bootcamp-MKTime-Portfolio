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
    
    if (!isset($_SESSION['customer_id'])) {
    header('Location: ../admin/signin.php');
    exit();
  }

  # Check if form has been submitted for update.

  if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      
      # Update changed quantity field values.
    if (isset($_POST['quantity'])) {

      foreach ( $_POST['quantity'] as $item_id => $item_qty ) { 

        # Ensure values are integers.
          $id = (int) $item_id;
          $qty = (int) $item_qty;
      
        # Change quantity or delete if zero.
        if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
      
        elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
      }
    }
  }
  # Initialize grand total variable.
  $total = 0;

  # Display the cart if not empty.
  if (!empty($_SESSION['cart'])) {

    # Connect to the database.
    require ('connect_db.php');
    
    # Retrieve all items in the cart from the 'products' database table.
    $sql = "SELECT * FROM products WHERE item_id IN (";
    
    foreach ($_SESSION['cart'] as $id => $value) { $sql .= $id . ','; }
    
    $sql = substr( $sql, 0, -1 ) . ') ORDER BY item_id ASC';
    $result = mysqli_query ($link, $sql);
    
      //Display HTML
        echo '<section">
                <form action="cart.php" method="post">
                  <div class="container py-5">
                    <div class="row d-flex justify-content-center align-items-center">
                      <div class="col-12">
                        <div class="card card-registration card-registration-2" style="background: rgba(26, 108, 108, 1); border-radius: 15px;">
                          <div class="card-body p-10">
                            <div class="row">
                              <div class="col-lg-8">
                                <div class="p-5">
                                  <div class="d-flex justify-content-between align-items-center mb-5">
                                    <h1 class="fw-bold">Shopping Cart</h1>
                                  </div>

                            <hr class="my-4">';

    while ($rows = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {

      # Calculate sub-totals and grand total.
        $subtotal=$_SESSION['cart'][$rows['item_id']]['quantity'] * $_SESSION['cart'][$rows['item_id']]['price'];
        $total += $subtotal;
       
            //Display rows
              echo "
                    <div class=\"row mb-12 d-flex justify-content-between align-items-center\">
                    
                      <div class=\"col-md-2 col-lg-2 col-xl-2\">
                        <img src=\"item_img/{$rows['item_img']}\" class=\"img-fluid rounded-3\" alt=\"{$rows['item_name']}\">
                      </div>

                        <div class=\"col-md-3 col-lg-3 col-xl-3\">
                          <h6 class=\"text mb-0\" name=\"item_name[{$rows['item_name']}]\">{$rows['item_name']}</h6>
                        </div>

                          <div class=\"col-md-3 col-lg-3 col-xl-2 d-flex\">
                            <div style = \"justify-self:right\">
                              <h6 type=\"text\" size=\"3\" name=\"[{$rows['item_price']}]\">&pound {$rows['item_price']}</h6>
                            </div>
                          </div>

                            <div class=\"col-md-2 col-lg-2 col-xl-2 d-flex\">
                              <input type=\"text\" size=\"3\" name=\"quantity[{$rows['item_id']}]\" value=\"{$_SESSION['cart'][$rows['item_id']]['quantity']}\">
                            </div>

                              <div class=\"col-md-3 col-lg-2 col-xl-2\">
                                <div style = \"justify-items:right\">
                                  <h6> &pound ".number_format ($subtotal, 2). "</h6>
                                </div>
                              </div>
                            
                            <hr class=\"my-4\">

                    </div>";      
    }
    
  # Close the database connection.
    mysqli_close($link);

  //Display total
                      echo '</div>
                              </div>
                                  <div class="col-lg-4">
                                    <div class="p-5">
                                      <div style="height: 65px;"></div>

                                      <h3 class="fw-bold mb-5 mt-2 pt-1" style = "justify-self: center; font: Cyreal; font-size: 25px;">Summary</h3>
                                        
                                        <hr class="my-4">
                                        
                                        <div class = \"row"\>
                                          <h5 class="text" style = "justify-self: center; font: Cyreal; font-size: 25px;">Total price</h5>
                                        </div>

                                            <hr class=\"my-1\">

                                          <div class = \"row"\>
                                            <h5 style = "justify-self: center; font: Cyreal; font-size: 20px;">&pound '.number_format($total,2).'</h5>
                                          </div>
                                    </div>

                                    <div class =\"row\">
                                      <div style = "justify-self: center;">
                                        <input type="submit" name="submit" class="btn" id = "btn3" value="Update my cart">
                                      </div>         
                                    </div>
                          
                                      <hr class=\"my-2\">

                                      <div class =\"row\">
                                        <div style = "justify-self: center;">
                                          <a href="checkout.php?total_price='.$total.'" class="btn" id = "btn4">Checkout</a>
                                        </div>
                                      </div> 
                                  </div>                        

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>  
                    </div>
                  </div>      
                </form>
              </section>';
}

else {
    //Or display a message
      echo "
              <div class= \"container\">
                <div class=\"col-lg-12 col-md-12 col-sm-12\">
                  <div id = \"alert1\" class=\"alert alert-secondary\" role=\"alert\" style = \"background: rgba(26, 108, 108, 1);\">
      
                    <h4>There are no items in your cart.</h4>

                    <hr class=\"my-2\">
              
                    <a href=\"productshim.php\" class = \"btn\" id = \"btn1\">Continue Shopping</a>
                    <a href=\"logout.php\" class = \"btn\" id = \"btn1\">Logout</a>
              
                  </div>  
              </div>
          </div>
          ";
      }
    
  include 'include/main_footer.php';    
?>
    <link rel="stylesheet" href="../admin/config/stylesheet5s.css">  
