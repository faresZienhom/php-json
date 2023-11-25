

<?php  require_once("partials/general.php");?>
<?php


if(!CheckIsLoggedIn()) { 
  header("location:index.php");


}


  $Allproducts = json_decode(file_get_contents("data/products.json"),true);
  $userproducts = [];

  foreach ($Allproducts as $product) {
    
    if($product['user_id'] == $_SESSION['user']['id']){
      $userproducts[]=$product ;
    }
  }
  

?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Products</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">


  </head>
  <body>
       <?php include("partials/navbar.php");?>
       <a href="add-product.php"  class="btn btn-primary "> Add Product </a>


       <div class="conatiner">
        <div class="row">

        <?php foreach ($userproducts  as $prodect) { ?>
          
        
          <div class="col-3">
            <div class="card" style="width: 18rem;">
            <img src="<?php echo 'uploads/' . htmlspecialchars($prodect['image']);?>" class="card-img-top" width="70px" height="200px">
            <div class="card-body">
              <h5 class="card-title">
                <?php echo htmlspecialchars($prodect['name']); ?>
              </h5>
              <p class="card-text"> <?php echo "$" . htmlspecialchars($prodect['price']) ; ?></p>
              <a href="edit-product.php?id=<?php echo $prodect['id'];?>" class="btn btn-primary">Edit</a>
              <a href="delete-product.php?id=<?php echo $prodect['id'];?>" class="btn btn-danger">Delete</a>

            </div>
          </div>
        </div>
        <?php } ?>
        </div>
       </div>

       <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>