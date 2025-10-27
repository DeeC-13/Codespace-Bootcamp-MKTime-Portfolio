<?php
	# Open database connection.
	require ( 'connect_db.php' );
  session_start();
?>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel = "stylesheet" href = "../admin/config/stylesheetnav.css">


    <div class="container-fluid" style = "padding:0px;" class="col-lg-12 col-md-12 col-sm-12">
      <nav class="navbar navbar-expand-lg p-3">

          <a class="navbar-brand" style = "color: white;" href="../admin/admin.php">MK Time</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent" id="navbarNav">
                <ul class="navbar-nav">

                  <li class="nav-item active">
                    <a class="nav-link" style = "color: white;" href="create.php">Add Item</a>
                  </li>

                    <li class="nav-item">
                        <a class="nav-link" style = "color: white;" href="update.php">Update Item</a>
                      </li>
                      
                        <li class="nav-item">
                          <a class="nav-link" style = "color: white;" href="read.php">Stock List</a>
                        </li>  
                </ul>  

                        <span class="navbar-text" style = "font-family: Cyreal; font-size: 20px; color: white;">
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <?php if (isset($_SESSION['em_first_name'])) {?>
                                        <a class="nav-link" href="#" style = "align-items: center padding: 5px;"> Welcome <?php echo $_SESSION['em_first_name']; ?>
                                <?php }else { ?>
                                        <a class="nav-link" href="admin_signin.php">Sign In</a>
                                <?php } ?>

                                  <?php if (isset($_SESSION['em_first_name'])) {?>
                                          <a class="nav-link" href="admin_logout.php" style = "align-items: center padding: 5px;">Logout</a>
                                  <?php }else { ?>
                                          <a class="nav-link" href="admin_register.php">Register</a>
                                  <?php } ?>
                            </ul>        
                        </span> 

                
              </div>
              
      </nav>
    </div>        
      

