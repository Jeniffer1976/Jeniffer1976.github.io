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
        <div align="center" style="margin: 10px">
            <div class="card text-dark bg-light mb-3" style="max-width: 30rem;">
                <div class="card-body" >
                    <h2 class="card-title">Your profile</h2><br/>
                    <p align="left">
                        <b>Username: </b> <?php echo $_SESSION['username'] ?> <br/><br/>
                        <b>Name: </b> <?php echo $_SESSION['name'] ?> <br/><br/>
                        <b>Address: </b> <?php echo $_SESSION['address'] ?> <br/><br/>
                        <b>Email: </b> <?php echo $_SESSION['email'] ?> <br/><br/>
                    </p>
                </div>
            </div>
            <table>
                <tr>
                    <td>
                        <form action="updateProfile.php">
                            <button class="btn bg-secondary border-0 rounded text-white ">
                                Update Account <i class="fas fa-user-edit"></i> 
                            </button>
                        </form>
                    </td>
                    <td>
                        <button class="btn bg-danger border-0 rounded text-white" data-bs-toggle="modal" data-bs-target="#confDel">
                            Delete Account <i class="fas fa-user-slash"></i> 
                        </button>
                    </td>
                </tr>
            </table>
        </div>
        <!-- The Modal (confDel)-->
        <div class="modal" id="confDel">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header" align='center'>
                        <h4 class="modal-title" style="color: red">Delete confirmation</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" align="center">
                        <h3>Are you sure you want to delete this account?</h3><br/>
                        <table>
                            <td>
                                <form action='doDeleteProfile.php'>
                                    <input type="submit" value="Yes" class="btn btn-secondary"/>
                                </form>
                            </td>   
                            <td>
                                <input type="submit" value="No" class="btn btn-primary "data-bs-dismiss="modal"/>
                            </td>
                        </table>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>
