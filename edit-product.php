<?php  require_once("partials/general.php");?>

<?php
if( ! isset($_GET['id'])){
    header("location: 404.php");

}


$id = $_GET['id'];

$allProducts = json_decode(file_get_contents("data/products.json"),true);
$editedproduct = null;


foreach ($allProducts as $product){
    if($product['id'] == $id){
        $editedproduct = $product;
    }
}
if($editedproduct === null){
    header("location: 404.php");
}

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
    <title>Edit Product</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php include("partials/navbar.php");?>

    <div class="conatiner">
        <div class="row">
            <div class="col-6 offset-3">
                <form action="actions/edit-product.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id"  value="<?php echo $editedproduct['id'];?>">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $editedproduct['name'];?>">

                        <?php if(isset($errors['name']) && !empty($errors['name'])){?>
                        <p class="text-danger"><?php echo $errors['name'];?></p>
                        <?php }?>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" value="<?php echo $editedproduct['price'];?>">
                    
                        <?php if(isset($errors['Price']) && !empty($errors['Price'])){?>
                        <p class="text-danger"><?php echo $errors['Price'];?></p>
                        <?php }?>
                    </div>

                    


                    

                    <input type="submit" class="btn btn-primary" value="Edit" name="submit"></button>
                </form>
                <?php unset($_SESSION['errors'])  ;?>  
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>