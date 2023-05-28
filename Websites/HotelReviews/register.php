<?php $page="register" ?>
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
           <?php include "navbarLogReg.php" ?>
            
        
        <div align="center" style="margin: 10px">
            <form action="doRegister.php" method="post">
                <div class="card text-dark bg-light mb-3" style="max-width: 31.5rem;">
                    <div class="card-body">
                        <h2 class="card-title">Register</h2>
                        <div align="left">
                            
                            <label for="idUsername">Username:</label><br>
                            <input type="text" id="idUsername" name="username" size="55" placeholder="Enter your username"/><br><br>

                            <label for="idPassword">Password:</label><br>
                            <input type="password" id="idPassword" name="password" size="55" placeholder="Enter your password"/><br><br>
                            
                            <label for="idName">Name:</label><br>
                            <input type="text" id="idName" name="name" size="55" placeholder="Enter your name"/><br><br>
                            
                            <label for="idAddress">Address:</label><br>
                            <input type="text" id="idAddress" name="address" size="55" placeholder="Enter your address"/><br><br>
                            
                            <label for="idEmail">Email:</label><br>
                            <input type="email" id="idEmail" name="email" size="55" placeholder="Enter your email"/><br><br>
                            
                        </div> 
                            <input type ="submit" value="Register" class="btn btn-dark">
                    </div>
                </div>
                <p>Already a member? <a href="login.php">Login</a> now!<p>
            </form>
        </div>
    </body>
</html>
