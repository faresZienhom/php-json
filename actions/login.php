<?php

session_start();


require_once("../helpers/validations.php");
require_once("../helpers/json.php");
require_once("../helpers/auth.php");

if ( isset ($_POST['submit'])){

$email = $_POST['email'];
$password = $_POST['password'];


 $errors['email'] =validateEmail($email);
 $errors['password'] =validatepassordforlogin($password);
 
 
 
 if(checlerrorbagisempty($errors)){
 

    $allUsers = json_decode(file_get_contents("../data/users.json"),true);


     foreach($allUsers as $user){
        if($user['email'] == $email && $user['password'] == $password){
            storeuserinsession($user);
            header("location: ../login.php")  ; 

        }else{
            $_SESSION['errors']['email'] = "invalied credentials";

            header("location: ../login.php")  ; 

        }

     }


     }else{
      $_SESSION['errors']= $errors;
          
      header("location: ../login.php")  ; 
    }
  
} else {
    header("location: ../login.php")  ; 

}

?>