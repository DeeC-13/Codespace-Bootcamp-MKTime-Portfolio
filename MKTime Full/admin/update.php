<?php
# Include navigation 
  include 'include/nav.php';
  include 'images.php';

   if (!isset($_SESSION['employee_id'])) {
    header('Location: ../admin/admin_signin.php');
    exit();
  }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  require('connect_db.php');

  $errors = array();

  # Check for item ID.
  if (empty($_POST['item_id'])) {
    $errors[] = 'Update item ID.';
  } else {
    $id = mysqli_real_escape_string($link, trim($_POST['item_id']));
  }

  # Check for item name.
  if (empty($_POST['item_name'])) {
    $errors[] = 'Update item name.';
  } else {
    $n = mysqli_real_escape_string($link, trim($_POST['item_name']));
  }

  # Check for item description.
  if (empty($_POST['item_desc'])) {
    $errors[] = 'Update item description.';
  } else {
    $d = mysqli_real_escape_string($link, trim($_POST['item_desc']));
  }

  # Check for image path.
  if (empty($_POST['item_img'])) {
    $errors[] = 'Update image address.';
  } else {
    $img = mysqli_real_escape_string($link, trim($_POST['item_img']));
  }

  # Check for item price.
  if (empty($_POST['item_price'])) {
    $errors[] = 'Update item price.';
  } else {
    $p = mysqli_real_escape_string($link, trim($_POST['item_price']));
  }

  if (empty($errors)) {
    $sql = "UPDATE products SET item_name='$n', item_desc='$d', item_img='$img', item_price='$p' WHERE item_id='$id'";
    $result = @mysqli_query($link, $sql);
    if ($result) {
      header("Location: read.php");
      exit();
    } else {
      echo "Error updating record: " . mysqli_error($link);
    }
  } else {
    foreach ($errors as $error) {
      echo "<p>$error</p>";
    }
  }

  mysqli_close($link);
}
?>

<body style = "background: rgba(71, 115, 122, 1);">

    <div class = "container">    
      <center><h1>Update Item</h1></center>
    </div>

      <form action="update.php" method="post">
        <div id = "update" class= "container-fluid">
        <div class = "card card-two">
          <div class = "card-body">

                <label for="id">Item_id:</label>
                    <center><input type="text" class = "update-input"
                        id="item_id" 
                        class="form-control" 
                        name="item_id" 
                        required
                        value="<?php if (isset($_POST['item_id']))
                        echo $_POST['item_id']; ?>"></center>

              <!-- input box for item name  -->
                <label for="name">Update Item_name:</label>
                    <center><input type="text" class = "update-input"
                        id="item_name" 
                        class="form-control" 
                        name="item_name"  
                        value = "<?php if (isset($_POST['item_name']))
                        echo $_POST['item_name']; ?>"></center>
              
              <!-- input box for item description --> 
                <label for="description">Update Item_desc:</label>
                    <center><textarea id="item_desc" class = "update-input"
                          class="form-control" 
                          name="item_desc"  
                          value = "<?php if (isset($_POST['item_desc']))
                          echo $_POST['item_desc']; ?>">
                    </textarea></center>

              <!-- input box for image path -->        
                <label for="image">Update Item_Img address:</label>
                      <input type="file" class = "update-input"
                          id="item_img" 
                          class="form-control" 
                          name="item_img"                          
                          value = "<?php if (isset($_POST['item_img']))
                          echo $_POST['item_img']; ?>">

              <!-- input box for item price -->
                <label for="price">Update Item_price:</label>
                     <center> <input type="number" class = "update-input"
                          id="item_price" 
                          class="form-control" 
                          name="item_price" 
                          min="0" step="0.01" 
                          value = "<?php if (isset($_POST['item_price']))
                          echo $_POST['item_price']; ?>"></center>

              <!-- submit button -->
                <div class = "row">
                  <center><input type="submit" class="btn" id = "btn" value="Submit"></center>
                </div>

            </div>                   
          </div>
        </div>
      </form>
    

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" href="../admin/config/stylesheet2a.css">

<?php 
  include('include/footer.php'); 
  ?>



      
