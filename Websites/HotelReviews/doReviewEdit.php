<?php
session_start();
include 'dbFunctions.php';
$reviewId = $_GET['reviewId'];
$review = $_POST['comments'];
$rating = $_POST['rating'];

// for back button
$hotelId = $_POST['hotelId'];
$hotelName = $_POST['hotelName'];

$query = "UPDATE reviews
          SET review='$review', rating='$rating', datePosted=CURRENT_DATE
          WHERE reviewId = '$reviewId'";

$result = mysqli_query($link, $query) or die(mysqli_error($link));
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
            <div class="card text-dark bg-light mb-3" style="max-width: 30rem;">
                <div class="card-body">
                    <?php if (!$result) { ?>
                        <h2 class="card-title">Review edit unsucessful</h2><br/>
                        
                    <?php } else { ?>
                        <h2 class="card-title">Review Edited</h2><br/>
                        <div align="left">
                            <p>
                                <b>Comments:</b><br/>
                                <?php echo $review ?><br/><br/>

                                <b>Ratings:</b><br/>
                                <?php echo $rating ?><br/><br/>

                                <b>Date:</b><br/>
                                <?php echo date("Y-m-d") ?><br/><br/>
                            </p>


                        </div> 
                    <?php } ?>
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