<?php
session_start();
include 'dbFunctions.php';
$userId = $_POST['userId'];
$userName = $_POST['username'];
$name = $_POST['name'];
$address = $_POST['address'];
$email= $_POST['email'];

$query = "UPDATE users
          SET username='$userName', name='$name', address='$address', email='$email'
          WHERE userId = '$userId'";

$result = mysqli_query($link, $query) or die(mysqli_error($link));
?>
<!DOCTYPE html>
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
        include "navbar.php";
        ?>
        <div align="center">
            <div class="card text-dark bg-light mb-3" style="max-width: 30rem;">
                <div class="card-body">
                    <?php if (!$result) { ?>
                        <h2 class="card-title">Profile update unsucessful</h2><br/>
                        <p>
                            Please <a href="updateProfile.php">try</a> again.
                        </p>
                        
                    <?php } else { ?>
                        <h2 class="card-title">Profile updated</h2><br/>
                        <div align="left">
                            <p>
                                <b>Username:</b><br/>
                                <?php echo $userName ?><br/><br/>

                                <b>Name:</b><br/>
                                <?php echo $name ?><br/><br/>

                                <b>Address:</b><br/>
                                <?php echo $address ?><br/><br/>
                                
                                <b>Email:</b><br/>
                                <?php echo $email ?><br/><br/>
                            </p>


                        </div> 
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>
