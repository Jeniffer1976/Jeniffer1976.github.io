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

        <div align="center" style="margin: 10px">
            <div class="card text-dark bg-light mb-3" style="max-width: 31.5rem;">
                <div class="card-body">
                    <h2 class="card-title" style="color: red">Delete confirmation</h2>
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
    </body>
</html>
