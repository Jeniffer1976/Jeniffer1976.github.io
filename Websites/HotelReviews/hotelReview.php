<?php
session_start();
include "dbFunctions.php";

$hotelId = $_GET['id'];
$hotelName = $_POST['hotelName'];

$query = "SELECT R.reviewId, R.userId, R.review, R.rating, R.datePosted,
          U.username
          FROM reviews R, users U
          WHERE R.userId = U.userId AND hotelId=$hotelId";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

$haveReviews = false;
while ($row = mysqli_fetch_assoc($result)) {
    $arrItems[] = $row;
    $haveReviews = true;
}
mysqli_close($link);
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
        if (isset($_SESSION['user_id'])) {
            include "navbar.php";
        } else {
            include "navbarLogReg.php";
        }
        ?>
        <br>
        <h3 align="center" style="font-weight: bold">Hotel reviews for <?php echo $hotelName ?></h3><br/>

        <?php if (!$haveReviews) {
            ?>    
            <h4 style="margin-top: 30px; text-align: center">Be the first to write a review!</h4>

        <?php } else { ?>

            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Date Posted</th>
                        <th>Username</th>

                        <?php if (isset($_SESSION['user_id'])) { ?> 
                            <th>Edit</th>
                            <th>Delete</th>
                        <?php } ?>
                    </tr>
                </thead>
                <?php
                for ($i = 0; $i < count($arrItems); $i++) {
                    $review = $arrItems[$i]['review'];
                    $rating = $arrItems[$i]['rating'];
                    $date = $arrItems[$i]['datePosted'];
                    $userName = $arrItems[$i]['username'];
                    $reviewId = $arrItems[$i]['reviewId'];
                    $userId = $arrItems[$i]['userId'];
                    ?>

                    <tbody>
                        <tr>
                            <td><?php echo $review ?></td>
                            <td><?php echo $rating ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $userName ?></td>

                            <?php
                            if (isset($_SESSION['user_id'])) {
                                if ($userId == $_SESSION['user_id']) {
                                    ?> 
                                    <td><form method="post" action="reviewEdit.php?reviewId=<?php echo $reviewId ?>">
                                            <!-- for back button in next file -->
                                            <input type="hidden"name="hotelId" value="<?php echo $hotelId; ?>"/>
                                            <input type="hidden"name="hotelName" value="<?php echo $hotelName; ?>"/>

                                            <button class="btn bg-warning border-0 rounded text-white ">
                                                Edit <i class="far fa-edit"></i> 
                                            </button>

                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="reviewDelete.php?reviewId=<?php echo $reviewId ?>">
                                            <!-- for back button in next file -->
                                            <input type="hidden"name="hotelId" value="<?php echo $hotelId; ?>"/>
                                            <input type="hidden"name="hotelName" value="<?php echo $hotelName; ?>"/>

                                            <button class="btn bg-danger border-0 rounded text-white ">
                                                Delete <i class="far fa-trash-alt"></i> 
                                            </button>
                                        </form>
                                    </td>
                                    <?php
                                } else {
                                    ?>
                                    <td></td><td></td>
                                <?php }
                            }
                            ?>
                        </tr>
                    </tbody>
            <?php } ?>
            </table>
            <?php
        }
        if (isset($_SESSION['user_id'])) {
            ?>

            <form method="post" action="reviewAdd.php" align="center">
                <!-- for back button in next file -->
                <input type="hidden"name="hotelId" value="<?php echo $hotelId; ?>"/>
                <input type="hidden"name="hotelName" value="<?php echo $hotelName; ?>"/>

                <input type="hidden"name="userId" value="<?php echo $_SESSION['user_id']; ?>"/>
                <input type="submit" value="Write a review" class="btn bg-primary text-white"/>
            </form>
<?php } else { ?>
            <div align='center'>
                <button type="button" class="btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#notAvail">
                    Write a review
                </button>
            </div>  
<?php } ?>

        <!-- The Modal (notAvail)-->
        <div class="modal" id="notAvail">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header" align='center'>
                        <h4 class="modal-title" style="color: red">This feature is not available</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" align="center">
                        <h3>Please login to unlock this feature</h3><br/>
                        <form action='login.php'>
                            <input type="submit" value="Login" class="btn btn-primary" style="width: 150px"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>
