<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

include_once 'product-action.php';
?>



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<style>
    body {
        background-image: url('images/menubackground.jpg');
        background-size: 100% 100%;
    }

    h5 {
        color: white;
        font-size: 35px;
    }
</style>


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
                        <li class="nav-item"> <a class="nav-link active" href="welcome.php">Categories <span
                                    class="sr-only">(current)</span></a> </li>

                        <?php
                        if (empty($_SESSION["table_id"])) {
                            echo '<li class="nav-item"><a href="index.php" class="nav-link active">Enter Table Number</a> </li>';
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
        <div class="top-links">
            <div class="container">
                <ul class="row links">

                    <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="welcome.php">Choose
                            Category</a></li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a
                            href="dishes.php?category_id=<?php echo $_GET['category_id']; ?>">Pick Your favorite
                            food</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Confirm Order</a></li>

                </ul>
            </div>
        </div>
        <?php $ress = mysqli_query($db, "select * from category where category_id='$_GET[category_id]'");
        $rows = mysqli_fetch_array($ress);

        ?>
        <section class="inner-page-hero bg-image">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">

                            <figure>
                                <?php echo '<img src="admin/Res_img/' . $rows['image'] . '" alt="category logo width="300" height="300"">
                                                <h5>' . $rows['title'] . '</h5>'; ?>
                            </figure>

                        </div>


                    </div>
                </div>
            </div>
        </section>

        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                    <div class="widget widget-cart">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Your Cart
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="order-row bg-white">
                            <div class="widget-body">
                                <?php

                                $item_total = 0;

                                foreach ($_SESSION["cart_item"] as $item) {
                                    ?>

                                    <div class="title-row">
                                        <?php echo $item["title"]; ?><a
                                            href="dishes.php?category_id=<?php echo $_GET['category_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>">
                                            <i class="fa fa-trash pull-right"></i></a>
                                    </div>

                                    <div class="form-group row no-gutter">
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control b-r-0" value=<?php echo "$" . $item["price"]; ?> readonly id="exampleSelect1">

                                        </div>
                                        <div class="col-xs-4">
                                            <input class="form-control" type="text" readonly
                                                value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                        </div>

                                    </div>

                                    <?php
                                    $item_total += ($item["price"] * $item["quantity"]);
                                }
                                ?>


                            </div>
                        </div>



                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p>TOTAL</p>
                                <h3 class="value"><strong>
                                        <?php echo "$" . $item_total; ?>
                                    </strong></h3>
                                <?php
                                if ($item_total == 0) {
                                    ?>


                                    <a href="checkout.php?category_id=<?php echo $_GET['category_id']; ?>&action=check"
                                        class="btn btn-danger btn-lg disabled">Checkout</a>

                                    <?php
                                } else {
                                    ?>
                                    <a href="checkout.php?category_id=<?php echo $_GET['category_id']; ?>&action=check"
                                        class="btn btn-success btn-lg active">Checkout</a>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>



                    </div>
                </div>

                <div class="col-md-8">


                    <div class="menu-widget" id="2">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                MENU <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2"
                                    aria-expanded="true">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a>
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="collapse in" id="popular2">
                            <?php
                            $stmt = $db->prepare("select * from dishes where category_id='$_GET[category_id]'");
                            $stmt->execute();
                            $products = $stmt->get_result();
                            if (!empty($products)) {
                                foreach ($products as $product) {
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
                                            <form method="post"
                                                action='dishes.php?category_id=<?php echo $_GET['category_id']; ?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                                <div class="rest-logo pull-left">
                                                    <a>
                                                        &nbsp;&nbsp;
                                                        <?php echo '<img src="admin/Res_img/dishes/' . $product['img'] . '" alt="Food logo" width="500" height="300"> '; ?>
                                                    </a>
                                                </div>

                                                <a class="rest-descr">
                                                    <h3>
                                                        &nbsp;&nbsp;
                                                        <?php echo $product['title']; ?>
                                                    </h3>
                                                    <p>
                                                        <?php echo $product['slogan']; ?>
                                                    </p>
                                                </a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-lg-3 pull-right item-cart-info">
                                            <span class="price pull-left">$
                                                <?php echo $product['price']; ?>
                                            </span>
                                            <input class="b-r-0" type="text" name="quantity" style="margin-left:30px;" value="1"
                                                size="2" />
                                            <input type="submit" class="btn theme-btn" style="margin-left:40px;"
                                                value="Add To Cart" />
                                        </div>
                                        </form>
                                    </div>


                                    <p>__________________________________________________________________________________________________________________________
                                    </p>
                                    <?php


                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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