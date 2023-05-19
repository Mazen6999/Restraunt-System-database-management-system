<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION['table_id'])) {
    header('location:index.php');
} else {
    ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#">
        <title>My Orders</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>


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
                            if (empty($_SESSION["table_id"])) {
                                echo '<li class="nav-item"><a href="index.php" class="nav-link active">Login</a> </li>';
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
        <div class="page-wrapper">



            <div class="inner-page-hero bg-image" data-image-src="images/img/pimg.jpg">
                

            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">


                    </div>
                </div>
            </div>

            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                        </div>
                        <div class="col-xs-12">
                            <div class="bg-gray">
                                <div class="row">

                                    <table class="table table-bordered table-hover">
                                        <thead style="background: #404040; color:white;">
                                            <tr>

                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Payment method</th>
                                                <th>Date</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php

                                            $query_res = mysqli_query($db, "select * from users_orders where table_id='" . $_SESSION['table_id'] . "'");
                                            if (!mysqli_num_rows($query_res) > 0) {
                                                echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
                                            } else {

                                                while ($row = mysqli_fetch_array($query_res)) {

                                                    ?>
                                                    <tr>
                                                        <td data-column="Item">
                                                            <?php echo $row['title']; ?>
                                                        </td>
                                                        <td data-column="Quantity">
                                                            <?php echo $row['quantity']; ?>
                                                        </td>
                                                        <td data-column="price">$
                                                            <?php echo $row['price']; ?>
                                                        </td>
                                                        <td data-column="status">
                                                            <?php
                                                            $status = $row['status'];
                                                            if ($status == "" or $status == "NULL") {
                                                                ?>
                                                                <button type="button" class="btn btn-info"><span class="fa fa-bars"
                                                                        aria-hidden="true"></span> Dispatch</button>
                                                            <?php
                                                            }
                                                            if ($status == "preparing/eating") { ?>
                                                                <button type="button" class="btn btn-warning"><span
                                                                        class="fa fa-cog fa-spin" aria-hidden="true"></span> On The
                                                                    Way!</button>
                                                                <?php
                                                            }
                                                            if ($status == "servedandleft") {
                                                                ?>
                                                                <button type="button" class="btn btn-success"><span
                                                                        class="fa fa-check-circle" aria-hidden="true"></span>
                                                                    Delivered</button>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($status == "cancelledandleft") {
                                                                ?>
                                                                <button type="button" class="btn btn-danger"> <i
                                                                        class="fa fa-close"></i> Cancelled</button>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        </td>
                                                        <td data-column="Payment Method">
                                                            <?php echo $row['paymethod']; ?>
                                                        </td>
                                                        <td data-column="Date">
                                                            <?php echo $row['date']; ?>
                                                        </td>
                                                        <td data-column="Action"> <a
                                                                href="delete_orders.php?order_del=<?php echo $row['o_id']; ?>"
                                                                onclick="return confirm('Are you sure you want to cancel your order?');"
                                                                class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i
                                                                    class="fa fa-trash-o" style="font-size:16px"></i></a>
                                                        </td>

                                                    </tr>
                                                <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>


        </div>
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
    <?php
}
?>