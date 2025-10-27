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
?>      

    <div class = "container">  
      <div class = "row">  
        <div id = "mk1">   
          <h2>Welcome to MK Time</h2>
        </div>  
      </div>
    </div>

    <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <img src="..\admin\item_img\mk2.jpg" class="img-fluid" class= "d-block" alt="hourglass" />
          </div>
        </div> 
    </div>    

    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">  
          <div id="watches" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="..\admin\item_img\watch1.jpg" class="d-block w-100" alt="watch1">
              </div>
              <div class="carousel-item">
                <img src="..\admin\item_img\watch2.jpg" class="d-block w-100" alt="watch2">
              </div>
              <div class="carousel-item">
                <img src="..\admin\item_img\watch3.jpg" class="d-block w-100" alt="watch3">
              </div>
              <div class="carousel-item">
                <img src="..\admin\item_img\watch4.jpg" class="d-block w-100" alt="watch4">
              </div>
              <div class="carousel-item">
                <img src="..\admin\item_img\watch5.jpg" class="d-block w-100" alt="watch4">
              </div>
              <div class="carousel-item">
                <img src="..\admin\item_img\watch6.jpg" class="d-block w-100" alt="watch6">
              </div>
            </div>        
          </div>
        </div>
          
        <div class="col-lg-6 col-md-6">
          <p class="center"> Come and find your very own timeless treasures. </p>
          <p class="center"> Whether it be a watch for any occassion, a present or a special piece you're after. These beautiful watches will have you struggling to choose.</p>
          <p class="center"> We offer many different products for you to cherish and take home with you forever.</p>
          <p class="center"> Alternatively you can commission a special one of a kind piece for yourself or as a gift.</p>
          <p class="center">Please do not hesitate to speak to one of our knowledgable staff.</p>
          <p class="center"> Our products page has our range of watches for every taste.</p>
        </div>
      </div>
    </div>  

      <div class="container">
        <div class="row">
          <div id="range" class="col-lg-4 col-md-4 col-sm-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"> For Him</h5>
                  <div class="row">
                        <img src="..\admin\item_img\man1.jpg" class="img-fluid" alt="Product 1" class="card-img-center">
                  </div>
                  <div class="row1">                 
                    <a role="button" class="button" id = "btn" href="productshim.php">View Our Range</a>
                  </div>
              </div>  
            </div>
          </div>  
                
            <div id="range1" class="col-lg-4 col-md-4 col-sm-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"> For Her</h5>
                    <div class="row">
                      <img src="..\admin\item_img\woman1.jpg" class="img-fluid" alt="Product 2" class="card-img-center">
                    </div>
                    <div class="row1">
                      <a role="button" class="button" id = "btn" href="productsher.php">View Our Range</a>
                    </div>
                </div>
              </div>
            </div>
        </div>
      </div>

        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class= "p1">
                <p> If you have a specific piece in mind don't hesitate to contact us. </p>
                <p> Our dedicated staff are here to help.</p>
                <p> You can find all our contact details below.</p>
                <p> Alternatively you can sign in and have a chat personally.</p>
              </div>
            </div>
          </div>
        </div>
  
  </body>

<?php
  include 'include/main_footer.php';
  ?>
            
        <link rel="stylesheet" href = "../admin/config/stylesheets.css">  

</html>
    
	
	 
	  
	  