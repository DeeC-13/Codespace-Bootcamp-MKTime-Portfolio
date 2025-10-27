<?php

$database = 'mktime';
$user = 'root';
$password = '';

$servername='localhost:3306';
$mysqli = new mysqli($servername, $user, $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}

$sql = " SELECT * FROM customers ORDER BY customer_id ";
$result = $mysqli->query($sql);
$mysqli->close();  

?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MK Time Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

    <div class="container-fluid" style = "padding:0px;">
      <nav class="navbar navbar-expand-lg" style = "background-color: rgba(12, 69, 91, 1);">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" style = "color: white;" href="../admin/admin.php">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style = "color: white;" href="../admin/orders.php">Order Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style = "color: white;" href="../admin/customers.php">Customer Details</a>
                  </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" style = "color: white;" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">Product Amend</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" style = "color: white;" href="../admin/create.php">Add Item</a>
                    <a class="dropdown-item" style = "color: white;" href="../admin/update.php">Update Item</a>
                    <a class="dropdown-item" style = "color: white;" href="../admin/read.php">Stock List</a>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style = "color: white;" href="../admin/index.php">Log Out</a>
                </li>
              </ul>
            </div>
      </nav>
    </div>  

<body>

  <div class = "container" id = "main">
    <div class = "col-lg-10 col-md-12 col-sm-12">

      <div class="row">
          <h3> MK Time</h3>
      </div>  

        <div class="row" id = "table-title">
            <h3> Customer Details</h3>
        </div> 

          <div class="row" id = "table">
            <div class = "container"> 
              <div class = "col-lg-12 col-md-12 col-sm-12">
 
                  <table class="table" data-page-length='10'>
                    <thead>
                      <tr>
                        <th scope="col" colspan="1" name = "customer_id">Customer_id</th>
                        <th scope="col" colspan="2" name = "first_name">First Name</th> 
                        <th scope="col" colspan="2" name = "last_name">Last Name</th>
                        <th scope="col" colspan="1" name = "email">Customer Email</th>
                        <th scope="col" colspan="1" name = "pass">Password</th>
                        <th scope="col" colspan="1" name = "reg_date">Customer Register Date</th>
                        <th scope="col" colspan="1" name = "delete"></th>
                      </tr>
                    </thead>

                    <tbody>
                          <?php 
                              // LOOP TILL END OF DATA
                              
                              while($rows=$result->fetch_assoc())
                              {
                          ?>
                          <tr>
                              <!-- FETCHING DATA FROM EACH
                                  ROW OF EVERY COLUMN -->
                              <td colspan="1"><?php echo $rows['customer_id'];?></td>
                              <td colspan="2"><?php echo $rows['first_name'];?></td>
                              <td colspan="2"><?php echo $rows['last_name'];?></td>
                              <td colspan="1"><?php echo $rows['email'];?></td>
                              <td colspan="1"><?php echo $rows['pass'];?></td>
                              <td colspan="1"><?php echo $rows['reg_date'];?></td>

                              <td colspan="1"><a class = "btn btn-del" id = "btn" type = "delete"  
                                                onclick="return confirm('Are you sure you want to delete this customer?')"
                                                href="deletecust.php?customer_id=<?php echo $rows['customer_id'];?>">Delete</a></td>
                          </tr>
                                                    
                          <?php
                              }
                          ?>
                    </tbody>
                  </table>

              </div>   
            </div>     
          </div>

    </div>  
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../admin/config/stylesheeta.css">

</body>

</html>