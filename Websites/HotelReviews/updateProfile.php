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
        session_start();
        include "navbar.php";
        ?>
        <table align="center">
            <td>
                <div align="center" style="margin: 10px">
                    <form action="doUpdateProfile.php" method="post">
                        <div class="card text-dark bg-light mb-3" style="max-width: 31.5rem;">
                            <div class="card-body">
                                <h2 class="card-title">Update Profile</h2>
                                <div align="left">

                                    <label for="idUsername">Username:</label><br>
                                    <input type="text" id="idUsername" name="username" size="55" value="<?php echo $_SESSION['username'] ?>"/><br><br>

                                    <label for="idName">Name:</label><br>
                                    <input type="text" id="idName" name="name" size="55" value="<?php echo $_SESSION['name'] ?>"/><br><br>

                                    <label for="idAddress">Address:</label><br>
                                    <input type="text" id="idAddress" name="address" size="55" value="<?php echo $_SESSION['address'] ?>"/><br><br>

                                    <label for="idEmail">Email:</label><br>
                                    <input type="email" id="idEmail" name="email" size="55" value="<?php echo $_SESSION['email'] ?>"/><br><br>

                                    <input type="hidden"name="userId" value="<?php echo $_SESSION['user_id']; ?>"/>
                                </div> 
                                <input type ="submit" value="Confirm Update" class="btn btn-dark">
                            </div>
                        </div>
                    </form>
                </div>
            </td>
            <td>
                <div align="center" style="margin: 10px">
                    <form action="doUpdatePassword.php" method="post">
                        <div class="card text-dark bg-light mb-3" style="max-width: 31.5rem;">
                            <div class="card-body">
                                <h2 class="card-title">Update Password</h2>
                                <div align="left">

                                    <label for="idPassword">Current Password:</label><br>
                                    <input type="password" id="idPassword" name="password" size="55" placeholder="Enter your current password"/><br><br>

                                    <label for="idNewPassword">New Password:</label><br>
                                    <input type="password" id="idNewPassword" name="newPassword" size="55" placeholder="Enter your new password"/><br><br>

                                    <label for="idConfNewPassword">Confirm New Password</label><br>
                                    <input type="password" id="idConfNewPassword" name="confPassword" size="55" placeholder="Re-enter your new password"/><br><br>
                                    
                                    <input type="hidden"name="userId" value="<?php echo $_SESSION['user_id']; ?>"/>
                                </div> 
                                <input type ="submit" value="Confirm Update" class="btn btn-dark">
                            </div>
                        </div>
                    </form>
                </div>
            </td>
        </table>
    </body>
</html>

