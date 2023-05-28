<?php
session_start();

include "dbFunctions.php";

$entered_username = $_POST['username'];
$entered_password = $_POST['password'];
$msg = "";

$queryCheck = "SELECT * FROM users
          WHERE username='$entered_username'
          AND password = SHA1('$entered_password')";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) {
    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['user_id'] = $row['userId'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['address'] = $row['address'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['password'] = $entered_password;

    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}

if (isset($_POST['remember']) && isset($_SESSION['username']) ) {
    setcookie("remUsername", $_SESSION['username']);
} else {
    setcookie("remUsername", 0, time() - 3600);
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
        if ($isLoggedIn) {
            include "navbar.php";
            ?>
            <div align="center" style="margin: 10px">
                <div class="card text-dark bg-light mb-3" style="max-width: 30rem;">
                    <div class="card-body" >
                        <h2 class="card-title">Welcome back <?php echo $_SESSION['name'] ?>!</h2><br/>
                        <p align="left">
                            <b>Username: </b> <?php echo $_SESSION['username'] ?> <br/><br/>
                            <b>Name: </b> <?php echo $_SESSION['name'] ?> <br/><br/>
                            <b>Address: </b> <?php echo $_SESSION['address'] ?> <br/><br/>
                            <b>Email: </b> <?php echo $_SESSION['email'] ?> <br/><br/>
                        </p>
                        <p>
                            Proceed to view <a href="hotels.php">Hotels</a> list.
                        </p>
                    </div>
                </div>
            </div>


        <?php } else { ?>
            <?php
            $page = "register";
            include "navbarLogReg.php";
            ?>
            <div align="center" style="margin: 10px">
                <div class="card text-dark bg-light mb-3" style="max-width: 30rem;">
                    <div class="card-body" >
                        <h2 class="card-title">Login Failed</h2><br/>
                        <p align="center">
                            Login is not successful <br/>
                            Please <a href="login.php">login</a> again.
                        </p>
                        <p>
                            
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>

    </body>
</html>
