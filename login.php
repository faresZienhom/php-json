
<?php  require_once("partials/general.php");?>



<?php

 if(CheckIsLoggedIn()) { 
    header("location:index.php");


 }

$errors = [];
$old = [];
if(isset($_SESSION['errors'])){
    $errors = $_SESSION['errors'];
}
?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Login </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">


  </head>
  <body>
       <?php include("partials/navbar.php");?>

       <div class="conatiner">
        <div class="row">
            <div class="col-6 offset-3">
                <form action="actions/login.php" method="POST" >
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    
                        <?php if(isset($errors['email']) && !empty($errors['email'])){?>
                        <p class="text-danger"><?php echo $errors['email'];?></p>
                        <?php }?>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">

                        
                        <?php if(isset($errors['password']) && !empty($errors['password'])){?>
                        <p class="text-danger"><?php echo $errors['password'];?></p>
                        <?php }?>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Login" name="submit"></button>
                </form>
                <?php unset($_SESSION['errors'])  ;?>  
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
