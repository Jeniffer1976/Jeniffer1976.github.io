<?php
session_start();

$userId = $_POST['userId'];

// for back button
$hotelId = $_POST['hotelId'];
$hotelName = $_POST['hotelName'];
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
        include "navbar.php";
        ?>

        <div align="center">
            <div class="card text-dark bg-light mb-3" style="max-width: 35rem;">
                <div class="card-body">
                    <h2 class="card-title">Add new Review for <?php echo $hotelName ?></h2><br/>
                    <div align="left">
                        <form action="doReviewAdd.php" method="post">
                            <label for="idUsername">Username:</label><br>
                            <input type="text" id="idUsername" name="username"   
                                   value="<?php echo $_SESSION['username']; ?>" size="55" disabled /><br><br>

                            <label for="idComments">Comments:</label><br>
                            <textarea cols="57" rows="5" name="comments" id="idComments"></textarea><br><br>

                            <label for="idRating">Ratings:</label><br>
                            <select name="rating" id="idRating" style="width:440px">
                                <option value="" disabled selected>Select your rating</option>
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select><br/><br/>
                            <div align="center">
                                <input type ="submit" class="btn btn-dark"><br/>
                            </div>

                            
                            <input type="hidden"name="reviewId" value="<?php echo $reviewId; ?>"/>
                            <input type="hidden"name="userId" value="<?php echo $userId; ?>"/>
                            
                            <!-- for back button in next file -->
                            <input type="hidden"name="hotelId" value="<?php echo $hotelId; ?>"/>
                            <input type="hidden"name="hotelName" value="<?php echo $hotelName; ?>"/>

                        </form>
                    </div>


                </div>  
            </div>
            <!-- Back to review page-->
            <form action="hotelReview.php?id=<?php echo $hotelId ?>" method="post">
                <input type="hidden"name="hotelName" value="<?php echo $hotelName; ?>"/>
                <button class="btn btn-secondary">
                    <i class="fas fa-arrow-alt-circle-left"></i> Back to reviews
                </button> 

            </form>
        </div>
    </body>
</html>