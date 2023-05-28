<?php
include "dbFunctions.php";
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];

    $query = "INSERT INTO users
              (username,password,name,address,email) 
              SELECT 
              '$username',SHA1('$password'),'$name','$address',
              '$email'
              WHERE NOT EXISTS (SELECT username FROM users
              WHERE username = '$username')";

$status = mysqli_query($link, $query);

if (mysqli_affected_rows($link)==1){
    $isRegistered = true;
} else if (mysqli_affected_rows($link)==0){
    $isRegistered = false;
}

mysqli_close($link);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <?php include 'font.php'; ?>
        <title>Hotel Review</title>
    </head>
    <body>
        <?php 
        $page = "register";
        include "navbarLogReg.php";
        
        if ($isRegistered) { ?>
            <div align="center" style="margin: 10px">
                <div class="card text-dark bg-light mb-3" style="max-width: 30rem;">
                    <div class="card-body" >
                        <h2 class="card-title">Register</h2><br/>
                        <h4>Welcome <?php echo $name ?>! </h4><br/>
                        <p align="center">
                            You have successfully created an account<br/>
                            Please proceed to <a href="login.php">Login</a>
                        </p>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
        <?php } else { ?>
        <div align="center" style="margin: 10px">
                <div class="card text-dark bg-light mb-3" style="max-width: 30rem;">
                    <div class="card-body" >
                        <h2 class="card-title">Register</h2><br/>
                        <p align="center">
                            The username <?php echo $username ?> already exists <br/>
                            Please <a href="register.php">try again</a>
                        </p>
                    </div>
                </div>
            </div>
       <?php  } ?>
    </body>
</html>