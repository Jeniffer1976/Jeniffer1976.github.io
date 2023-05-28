<?php
session_start();
include "dbFunctions.php";

$query = "SELECT * FROM hotels";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
    $arrContent[] = $row;
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
        if (isset($_SESSION['name'])) {
            include "navbar.php";
        } else {
            include "navbarLogReg.php";
        }
        ?>

        <div align="center" style="margin-top: 15px" >
           <h3 style="font-weight: bold">List of hotels</h3><br/>
            <div style="margin: 10px; max-width: 1000px">
                <div class="row g-3 row-cols-2">
                    <?php
                    for ($i = 0; $i < count($arrContent); $i++) {
                        $id = $arrContent[$i]['hotelId'];
                        $hotelName = $arrContent[$i]['hotelName'];
                        $hotelAddress = $arrContent[$i]['hotelAddress'];
                        $picture = $arrContent[$i]['picture'];
                        ?>
                        <div class="col">
                            <div class="card text-white bg-dark mb-3" style="height: 100%">
                                <img src="images/<?php echo $picture ?>" class="card-img-top" alt="<?php echo $hotelName ?>" style="height:300px">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $hotelName ?></h5>
                                    <p class="card-text"><?php echo $hotelAddress ?><br/>
                                        <a href="hotelInfo.php?id=<?php echo $id ?>">See more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    mysqli_close($link);
                    ?>

                </div>
            </div>
        </div>

    </body> 
</html>

