<?php  require_once("partials/general.php");?>

<?php

$errors = [];
if(isset($_SESSION['errors'])){
    $errors = $_SESSION['errors'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php include("partials/navbar.php");?>

    <div class="conatiner">
        <div class="row">
            <div class="col-6 offset-3">
                <form action="actions/add-product.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" >

                        <?php if(isset($errors['name']) && !empty($errors['name'])){?>
                        <p class="text-danger"><?php echo $errors['name'];?></p>
                        <?php }?>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" name="price">
                    
                        <?php if(isset($errors['Price']) && !empty($errors['Price'])){?>
                        <p class="text-danger"><?php echo $errors['Price'];?></p>
                        <?php }?>
                    </div>


                    <div class="mb-3">
                      <label  class="form-label">Image</label>
                      <input class="form-control" type="file" name="image" >

                      
                      <?php if(isset($errors['image']) && !empty($errors['image'])){?>
                        <p class="text-danger"><?php echo $errors['image'];?></p>
                        <?php }?>
                      </div>

                    

                    <input type="submit" class="btn btn-primary" value="Add" name="submit"></button>
                </form>
                <?php unset($_SESSION['errors'])  ;?>  
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>