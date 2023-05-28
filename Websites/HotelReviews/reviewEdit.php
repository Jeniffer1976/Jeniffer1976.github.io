<?php
session_start();
include "dbFunctions.php";
$reviewId = $_GET['reviewId'];

// for back button
$hotelId = $_POST['hotelId'];
$hotelName = $_POST['hotelName'];

$query = "SELECT * FROM reviews
          WHERE reviewId = $reviewId";

$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);

if (!empty($row)) {
    $review = $row['review'];
    $rating = $row['rating'];
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
        include "navbar.php";
        ?>
        <div align="center">

            <div class="card text-dark bg-light mb-3" style="max-width: 32rem;">
                <div class="card-body">
                    <h2 class="card-title">Edit Review</h2><br/>
                    <div align="left">
                        <form action="doReviewEdit.php?reviewId=<?php echo $reviewId?>" method="post">
                            <label for="idUsername">Username:</label><br>
                            <input type="text" id="idUsername" name="username"   
                                   value="<?php echo $_SESSION['username']; ?>" size="55" disabled /><br><br>

                            <label for="idComments">Comments:</label><br>
                            <textarea cols="57" rows="5" name="comments" id="idComments"><?php echo $review ?></textarea><br><br>

                            <label for="idRating">Ratings:</label><br>
                            <select name="rating" id="idRating" style="width:440px">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    $sel = "";
                                    if ($i == $rating) {
                                        $sel = "selected";
                                    }
                                    ?>
                                    <option value="<?php echo $i ?>" <?php echo $sel ?>><?php echo $i ?></option>
                                <?php } ?>
                            </select><br/><br/>
                            <div align="center">
                                <input type ="submit" value="Update Review" class="btn btn-dark"><br/>
                            </div>
                            
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