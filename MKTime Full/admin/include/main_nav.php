<?php
	# Open database connection.
	require ( 'connect_db.php' );
  session_start();
?>

    <nav class="navbar navbar-expand-lg" style="background-color: rgb(49, 128, 124);">
      <div class="container-fluid" id="nav.main">

        <a class="navbar-brand" style = "color: white;" href="#index.php">MK Time</a>

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
                  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>

                  <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                  </li>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>

                      <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                          <li class="nav-item dropdown">

                            <button class="btn dropdown-toggle" type = "button" data-bs-toggle="dropdown" aria-expanded="false">
                              Product Range
                            </button>

                              <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="productshim.php">For Him</a></li>
                                <li><a class="dropdown-item" href="productsher.php">For Her</a></li>
                              </ul>

                          </li>
                        </ul>
                      </div>   

              </ul>

                        <span class="navbar-text" style = "color: white;">
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                              <?php if (isset($_SESSION['first_name'])) {?>
                                      <a class="nav-link" href="#" style = "align-items: center padding: 5px;"> Welcome <?php echo $_SESSION['first_name']; ?>
                              <?php }else { ?>
                                      <a class="nav-link" href="signin.php">Sign In</a>
                              <?php } ?>

                                <?php if (isset($_SESSION['first_name'])) {?>
                                        <a class="nav-link" href="logout.php" style = "align-items: center padding: 5px;">Logout</a>
                                <?php }else { ?>
                                        <a class="nav-link" href="custregister.php">Register</a>
                                <?php } ?>
                          </ul>                    
                        </span>
                    
            </div>

      </div>
    </nav>  

