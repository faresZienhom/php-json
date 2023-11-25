<?php



session_start();


require_once("../helpers/validations.php");
require_once("../helpers/json.php");
require_once("../helpers/auth.php");

if ( isset ($_POST['submit'])){


    $name = strip_tags( $_POST['name']);
    $price = strip_tags( $_POST['price']);
    $image = $_FILES['image'];


$imageName = $image['name'];
$imageType= $image['type'];
$imageTempName = $image['tmp_name'];



$errors['name']=validateName($name);
$errors['price']=validatePrice($price);
$errors['image']=validateimage($image);


 
if(checlerrorbagisempty($errors)){
    
    $imageextension = pathinfo($imageName)['extension'];
    $unique = uniqid();
    $newname = $unique . "." . $imageextension;
    
    
    move_uploaded_file($imageTempName,"../uploads/$newname");
    
         $product = [
           "name"=>$name,
           "price"=>$price,
           "image" => $newname,
           "user_id"=>$_SESSION['user']['id'],

         ];
   
         
   
         storeJson($product,"../data/products.json");
         
   
          header("location: ../products.php");
   
        }else{
         $_SESSION['errors']= $errors;
             
         header("location: ../add-prodect.php")  ; 
       }
     
   } else {
    header("location: ../add-prodect.php")  ; 

   }
   

