<?php
session_start();
if (isset($_SESSION['user_id'])) {
    session_destroy();
    $_SESSION = array();
}
?>
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
        ?>
        <div align="center" style="margin: 10px">
                <div class="card text-dark bg-light mb-3" style="max-width: 30rem;">
                    <div class="card-body" >
                        <h2 class="card-title">Logout</h2><br/>
                        <p align="center">
                            You have logged out. <br/>
                            <a href="login.php">Login</a> again.
                        </p>
                        <p>
                            
                        </p>
                    </div>
                </div>
            </div>
    </body>
</html>
