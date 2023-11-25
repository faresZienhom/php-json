<?php

session_start();


require_once("../helpers/validations.php");
require_once("../helpers/json.php");
require_once("../helpers/auth.php");

if ( isset ($_POST['submit'])){

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];



 $errors['name']=validateName($name);
 $errors['email'] =validateEmail($email);
 $errors['$age'] =validateAge($age);
 $errors['password'] =validatepassordandconfirmPassword($password,$confirmPassword);
 
 
 
 if(checlerrorbagisempty($errors)){
 
      $user = [
        "name"=>$name,
        "age" => $age,
        "email" =>$email,
        "password" =>$password,
      ];

      
      $_SESSION['name']=$name;

       $storeduser =storeJson($user,"../data/users.json");
      
      storeuserinsession($storeduser);

       header("location: ../index.php");

     }else{
      $_SESSION['errors']= $errors;
          
      header("location: ../register.php")  ; 
    }
  
} else {
    echo "please submet from frist";
}

?>