<?php
session_start();
include "dbFunctions.php";

$userId = $_SESSION['user_id'];

$query = "DELETE FROM users
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
        include "navbarLogReg.php";
        ?>
        <div align="center">
            <div class="card text-dark bg-light mb-3" style="max-width: 30rem;">
                <div class="card-body">
                    <?php if (!$result) { ?>
                        <h2 class="card-title">Account deleted unsuccessfully</h2><br/>

                    <?php } else { 
                        setcookie("remUsername", 0, time() - 3600); ?>
                        <h2 class="card-title">Account deleted successfully</h2><br/>
                    <?php } ?>
                </div>
            </div> 
        </div>
    </body>
</html>
