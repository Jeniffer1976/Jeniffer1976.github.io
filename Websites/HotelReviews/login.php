<!DOCTYPE html>
<?php
$page = "login";
$rememberUsername = "";
$checked = "";

if (isset($_COOKIE['remUsername'])) {
    $rememberUsername = $_COOKIE['remUsername'];
    $checked = "checked";
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
        include "navbarLogReg.php"
        ?>

        <div align="center" style="margin: 10px">
            <form action="doLogin.php" method="post">
                <div class="card text-dark bg-light mb-3" style="max-width: 31.5rem;">
                    <div class="card-body">
                        <h2 class="card-title">Login</h2>
                        <div align="left">

                            <label for="idUsername">Username:</label><br>
                            <input type="text" id="idUsername" name="username"   
                                   value="<?php echo $rememberUsername; ?>" size="55" placeholder="Enter your username"/><br><br>

                            <label for="idPassword">Password:</label><br>
                            <input type="password" id="idPassword" name="password" size="55" placeholder="Enter your password"/><br><br>

                            <input type="checkbox" name="remember" <?php echo $checked ?>> Remember Me <br>

                        </div> 
                        
                        <input type ="submit" value="Login" class="btn btn-dark">
                    </div>
                </div>

                <p>Not a member yet? <a href="register.php">Register</a> now!<p>
            </form>
        </div>
    </body>
</html>

