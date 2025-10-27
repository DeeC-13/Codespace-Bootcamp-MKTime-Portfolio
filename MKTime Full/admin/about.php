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
        <div class="col-lg-6 col-md-6">
          <p> MK Time was founded by Mark Kinnaird in 1919 and is nestled in the beautiful 
              Scottish city of Edinburgh where we have been making watches for customers for over a century. </p>
          <p> After Mark passed away, the company has been carried on by successive generations. </p>
          <p> It is a true family business who cares about each 
              and every customer they serve.</p>
        </div>
      
           <div class="col-lg-6 col-md-6">      
              <img src="..\admin\item_img\castle.jpg" class="img-fluid" class= "d-block" alt="edinburgh castle" />
           </div>
      </div>
    </div>

    <div class="container">    
      <div class="row">  
        <div class="col-lg-6 col-md-6">
            <img src="..\admin\item_img\royal.jpg" class="img-fluid" class= "d-block" alt="royal mile" />
        </div>  
    
          <div class="col-lg-6 col-md-6">
             <p> The store is located on the beautiful Royal Mile and invites you to pop in and visit with us. 
                 If you can't visit our store just go online and browse our range of quality timepieces. </p>
             <p> Have a look at the variety of pieces we offer and if they're not to your taste just ask 
                 the staff for advice. If there is anything that you require we are more than happy to assist you. </p> 
             <p> We offer both in-store consultations and our online chat facilities. We also have specialised staff 
                 available via email for any technical or design advice.
             </p>
          </div>  
      </div>
    </div>
    
    <div class="container">    
      <div class="row">  
        <div class="col-lg-6 col-md-6">
              <p> We pride ourselves on the quality of our pieces that we stock, our customer service and our
                  customers satisfaction. </p>
              <p> We offer engraving on any of our pieces in store and online. Please specify this upon purchase.</p>
              <p> We are happy to take custom orders. This includes one off customer pieces specified to your
                  own requirements and we can guarantee that it will live up to your exacting standards.</p>
        </div>      

           <div class="col-lg-6 col-md-6"> 
              <img src="..\admin\item_img\workshop.jpg" class="img-fluid" class= "d-block" alt="workshop" />
           </div>
      </div>
    </div>  

</body>

<?php
  include 'include/main_footer.php';
  ?>
            
          
          <link rel="stylesheet" href="../admin/config/stylesheet1s.css">  
  

</html>
    
	
	 
	  
	  