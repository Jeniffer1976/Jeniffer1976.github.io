<!DOCTYPE html>
<?php
$navRefLink = "login.php";
if (isset($page)) {
    if ($page == "login") {
        $navRefLink = "register.php";
    }
}
?>
<!-- Nav bar--> 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid">

        <a class="navbar-brand" href="hotels.php">Hotel Reviews</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarTogglerz" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item "> 
                    <a class="nav-link" href="hotels.php">Hotels</a>
                </li>
            </ul>
            <ul class="navbar-nav justify-content-between align-items-center w-100">
                <li class="nav-item mx-auto">
                    <form method="post" action="doSearch.php">
                        <div class="input-group rounded">
                            <input type="search" name="search" class="form-control rounded" placeholder="Search" required/>
                            <span class="input-group-text border-0">
                                <button class="btn ">
                                    <i class="fas fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $navRefLink ?>">Login/Register</a>
                </li>
            </ul>                

        </div>
</nav>


<!----> 
