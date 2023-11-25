
<?php  
require_once("partials/general.php");


if( ! isset($_GET['id'])){
    header("location: 404.php");

}

$id = $_GET['id'];

$allProducts = json_decode(file_get_contents("data/products.json"),true);
$deletedproduct = null;


foreach ($allProducts as $i => $product){
    if($product['id'] == $id){
        unset($allProducts[$i]);
    }
}


if($deletedproduct === null){
    header("location: 404.php");
}


file_put_contents("data/products.json",json_encode($allProducts));


header("location: products.php");

