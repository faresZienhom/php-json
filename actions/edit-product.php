<?php



session_start();


require_once("../helpers/validations.php");
require_once("../helpers/json.php");
require_once("../helpers/auth.php");

if ( isset ($_POST['submit'])){

    $id = strip_tags( $_POST['id']);
    $name = strip_tags( $_POST['name']);
    $price = strip_tags( $_POST['price']);



$errors['name']=validateName($name);
$errors['price']=validatePrice($price);


 
if(checlerrorbagisempty($errors)){
    

    
    
/*
    
         $product = [
           "name"=>$name,
           "price"=>$price,
           "image" => $newname,
           "user_id"=>$_SESSION['user']['id'],

         ];*/
   
         
     $allproducts = json_decode(file_get_contents("../data/products.json"),true);

        foreach($allproducts as &$product){
            if($product['id']==$id){
                $product['name'] =$name;
                $product['price'] =$price;

            }
        }

         file_put_contents("../data/products.json",json_encode($allproducts));
         
   
          header("location: ../products.php");
   
        }else{
         $_SESSION['errors']= $errors;
             
         header("location: ../edit-prodect.php")  ; 
       }
     
   } else {
    header("location: ../edit-prodect.php")  ; 

   }
   

