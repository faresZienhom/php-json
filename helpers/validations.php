<?php

function validateName($name) :?string{
    $error = null;
     if(empty($name)){
         $error= "Name is required";
     }elseif(!is_string($name) || is_numeric($name)) {
       $error  = "Name must be string";
     }elseif (strlen($name)>255) {
         $error= "Name must be less than 255";
     }
       return $error;
 }
 
 
 function validateEmail($email) :?string{
     $error = null;
      if(empty($email)){
          $error= "Email is required";
      }elseif(filter_var($email,FILTER_VALIDATE_EMAIL) === false ) {
        $error  = "Email is not valid";
      }elseif (strlen($email)>255) {
          $error= "Name must be less than 255";
      }
        return $error;
  }
  
 function validateAge($age) {
     $error = null;
     if(is_numeric($age)){
         $age = (int)$age;
     }
      if(! empty($age)){
 
         if(! is_int($age))  {
 
         $error ="age is integer";
 
       }elseif($age < 0){
 
         $error = "age >= 0";
       }
 
       }
        return $error;
  }
  
 
  
  function validatePrice($price) {
      $error = null;
    
    if( empty($price)){

         $error ="price is required";
    }elseif(!is_numeric($price)){
        
          $error ="price must be numeric";
  
    }elseif($price < 0){
  
          $error = "price >= 0";
        }
  
        
         return $error;
   }
 
 
 
 function validatepassordandconfirmPassword($password,$confirmPassword) :?string{
 
 
 
  $error = null;
  $passwordlength = strlen($password);
 
 if ( empty($password)) {
     $error = "password is required";
      
 }elseif(!is_string($password) ) {
 
     $error = "password must be text";
 
     
 }elseif($passwordlength<5 || $passwordlength >30){
      
   $error ="must be between 5-30 ";
 }elseif($password != $confirmPassword){
     $error = "password must be equal confirmpassword";
 }
 
 return $error;
 }


 function validatepassordforlogin($password) :?string{
 
 
 
  $error = null;
  $passwordlength = strlen($password);
 
 if ( empty($password)) {
     $error = "password is required";
      
 }elseif(!is_string($password) ) {
 
     $error = "password must be text";
 
     
 }elseif($passwordlength<5 || $passwordlength >30){
      
   $error ="must be between 5-30 ";
 }
 
 return $error;
 }

 
 function validateimage(array $image) : ?string{
   $error = null;
 
   $typetoarr= explode("/",$image['type']);
   $typeFrist = $typetoarr[0];
   $sizeBytes =$image['size'];
   $sizemb = $sizeBytes/ (1024*1024);
 
   if($image['error'] != 0){
     $error = "image is required";
 
   }elseif($typeFrist != "image"){
 
     $error = "file must be image";
 
   }elseif($sizemb > 1){
     $error = " image size >=1mb";
   }
   return $error;
 
 }

 
 function  checlerrorbagisempty(array $errors): bool{
 
   foreach($errors as  $value){
     if($value !== null){
       return false;
     }
   }
   return true;
 }
 
 
 
 
 
 
 
 ?>