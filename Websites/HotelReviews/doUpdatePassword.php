<?php
session_start();
include 'dbFunctions.php';

$userId = $_POST['userId'];
$newPassword = $_POST['newPassword'];
$confPassword = $_POST['confPassword'];
$password = $_POST['password'];

$match = true;

if ($newPassword == $confPassword) {
    $query = "UPDATE users
          SET password=SHA1('$newPassword')
          WHERE userId = '$userId' AND password=SHA1('$password') ";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if (mysqli_affected_rows($link) == 1) {
        $isUpdated = true;
    } else if (mysqli_affected_rows($link) == 0) {
        $isUpdated = false;
    }
} else {
    $match = false;
}
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
                    <?php
                    if ($match) {
                        if ($isUpdated) {
                            ?>
                            <h2 class="card-title">Password updated sucessfully</h2><br/>

                            <?php
                        } else {
                            ?>
                            <h2 class="card-title">Password update unsucessful</h2><br/>
                            <h6>You have entered the incorrect password.</h6>
                            <p>
                                Please <a href="updateProfile.php">try</a> again.
                            </p>
                            <?php
                        }
                    } else {
                        ?>
                        <h2 class="card-title">Password update unsucessful</h2><br/>
                        <h6>Your new password and confirmation password do not match.</h6>
                        <p>
                            Please <a href="updateProfile.php">try</a> again.
                        </p>

                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>


    </body>
</html>
