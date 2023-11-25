<?php  require_once("partials/general.php");?>

<?php

 if(CheckIsLoggedIn()) { 
    header("location:index.php");


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
    <title>Register</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php include("partials/navbar.php");?>

    <div class="conatiner">
        <div class="row">
            <div class="col-6 offset-3">
                <form action="actions/register.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" <?php if(isset($old['name'])) { ?> value = "<?php echo $old['name']; ?>" <?php } ?>>

                        <?php if(isset($errors['name']) && !empty($errors['name'])){?>
                        <p class="text-danger"><?php echo $errors['name'];?></p>
                        <?php }?>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    
                        <?php if(isset($errors['email']) && !empty($errors['email'])){?>
                        <p class="text-danger"><?php echo $errors['email'];?></p>
                        <?php }?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">age</label>
                        <input type="text" class="form-control" name="age">
                    
                        <?php if(isset($errors['age']) && !empty($errors['age'])){?>
                        <p class="text-danger"><?php echo $errors['age'];?></p>
                        <?php }?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">

                        
                        <?php if(isset($errors['password']) && !empty($errors['password'])){?>
                        <p class="text-danger"><?php echo $errors['password'];?></p>
                        <?php }?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Register" name="submit"></button>
                </form>
                <?php unset($_SESSION['errors'])  ;?>  
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>