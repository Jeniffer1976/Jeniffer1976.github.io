<?php
session_start();
include "dbFunctions.php";

$theId = $_GET['id'];   

$query = "SELECT * FROM hotels WHERE hotelId=$theId";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);

if (!empty($row)) {
    $hotelName = $row['hotelName'];
    $hotelAddress = $row['hotelAddress'];
    $picture = $row['picture'];
    $contactNo = $row['contactNo'];
    $description = $row['description'];

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
        if (isset($_SESSION['user_id'])) {
            include "navbar.php";
        } else {
            include "navbarLogReg.php";
        }

        if (!empty($hotelName)) { ?>
        
      
        <div align="center" style="margin-top: 15px">
            <h3 style="font-weight: bold">Hotel Information</h3><br/>
            <div class="card text-white bg-dark mb-3" style=" max-width: 38rem; padding: 20px" align="center">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $hotelName ?></h5>
                    <p class="card-text">
                        <b>Address: </b><?php echo $hotelAddress ?><br/>    
                        <b>Contact No. </b><?php echo $contactNo ?><br/><br/>    
                        <?php echo $description?><br/>
                    </p>
                </div>
                <img src="images/<?php echo $picture ?>" alt="<?php echo $hotelName ?>" style="height:300px"><br/>
                <form action="hotelReview.php?id=<?php echo $theId ?>" method="post">
                    <input type="hidden" name="hotelName" value="<?php echo $hotelName; ?>"/>
                    <input type ="submit" value="See Reviews" class="btn btn-light">
                </form>
            </div>      
        </div>
        <?php } ?>


    </body>
</html>
