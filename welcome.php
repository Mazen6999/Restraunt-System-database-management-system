<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Home || Online Food Ordering System - Code Camp BD</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<style>
    body {
        background-image: url('images/background2.jpg');
        background-size: 100% 100%;
    }

    a {
        color: black;
    }

    h5 {
        color: black;
    }
</style>
<body class="home">
    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                    data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="welcome.php"> <img class="img-rounded" src="images/logo.png" alt=""
                        width="18%"> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="welcome.php">Home <span
                                    class="sr-only">(current)</span></a> </li>

                        <?php
                        if (empty($_SESSION["table_id"])) // if user is not login
                        {
                            echo '<li class="nav-item"><a href="index.php" class="nav-link active">Enter table Number</a> </li>';
                        } else {
                            echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
                            echo '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                        }

                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="inner-page-hero bg-image" data-image-src="images/img/pimg.jpg">
        <section class="hero bg-image">
            <div class="hero-inner">
                    <h1>MMA Restraunt</h1>
                    <div class="steps">
                        <div class="step-item step1">
                            <img src="images/chooseCAT.jpg" alt="Trulli" width="90" height="50">
                            <h4><span style="color:white;">1. </span>Choose Category</h4>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="step-item step2">
                            <img src="images/ordermenu.jpg" alt="Trulli" width="120" height="50">
                            <h4><span style="color:white;">2. </span>Order from menu</h4>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="step-item step3">
                            <img src="images/chefkiss.jpg" alt="Trulli" width="80" height="80">
                            <h4><span style="color:white;">3. </span>Enjoy</h4>
                        </div>
                    </div>
            </div>
        </section>
    </div>
    <section class="popular">
        <div class="container">
            <div class="row">
                <?php
                $query_res = mysqli_query($db, "select * from category");
                while ($r = mysqli_fetch_array($query_res)) {
                    echo ' <div class="col-md-5" >
                                            <div class="figure-wrap bg-image"><img src="admin/Res_img/' . $r['image'] . '" alt="Trulli" width="300" height="200"></div>
                                                
                                                <div class="content" >
                                                    <h5 ><a href="dishes.php?category_id=' . $r['category_id'] . '">' . $r['title'] . '</a></h5>
                                                    <div class="price-btn-block"> <a href="dishes.php?category_id=' . $r['category_id'] . '" class="btn theme-btn-dash pull-right">Category Menu</a> </div>
                                                </div>  
                                    </div>';
                    echo '<br><br><br><br><br><br><br><br><br><br><br><br><br>';
                }
                ?>
            </div>
        </div>
    </section>
    <?php include "include/footer.php" ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>
</html>