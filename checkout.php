<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert()
{


    echo "<script>alert('Thank you. Your Order has been placed!');</script>";
    echo "<script>window.location.replace('your_orders.php');</script>";
}

if (empty($_SESSION["table_id"])) {
    header('location:index.php');
} else {


    foreach ($_SESSION["cart_item"] as $item) {

        $item_total += ($item["price"] * $item["quantity"]);

        if ($_POST['submit']) {
            $mod=$_POST["mod"];
            $SQL = "insert into users_orders(table_id,title,quantity,price,status,paymethod) values('" . $_SESSION["table_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "','preparing/eating','$mod')";

            mysqli_query($db, $SQL);
            
            $sql = mysqli_query($db, "update tables set status='Taken' where table_id IN (SELECT DISTINCT table_id FROM users_orders where status = 'preparing/eating' );");


            unset($_SESSION["cart_item"]);
            unset($item["title"]);
            unset($item["quantity"]);
            unset($item["price"]);
            $success = "Thank you. Your order has been placed!";

            function_alert();



        }
    }
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

    <body>
        <div class="site-wrapper">
            <header id="header" class="header-scroll top-header headrom">
                <nav class="navbar navbar-dark">
                    <div class="container">
                        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                            data-target="#mainNavbarCollapse">&#9776;</button>
                        <a class="navbar-brand" href="welcome.php"> <img class="img-rounded" src="images/logo.png" alt=""
                                width="18%"> </a>
                        <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                            <ul class="nav navbar-nav">

                                <?php
                                if (empty($_SESSION["table_id"])) {
                                    echo '<li class="nav-item"><a href="index.php" class="nav-link active">Enter table id</a> </li>';
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

                            <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="welcome.php">Choose Category</a>
                            </li>
                            <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your favorite food</a>
                            </li>
                            <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Confirm
                                    Order</a></li>
                        </ul>
                    </div>
                </div>

                <div class="container">

                    <span style="color:green;">
                        <?php echo $success; ?>
                    </span>

                </div>

                <div class="container m-t-30">
                    <form action="" method="post">
                        <div class="widget clearfix">

                            <div class="widget-body">
                                <form method="post" action="#">
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="cart-totals margin-b-20">
                                                <div class="cart-totals-title">
                                                    <h4>Cart Summary</h4>
                                                </div>
                                                <div class="col-md-4">

                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                            <?php  
                                                            foreach ($_SESSION["cart_item"] as $item) {
                                                                ?>
                                                                <div class="title-row">
                                                                    <?php echo $item["title"]; ?><a
                                                                        href="dishes.php?category_id=<?php echo $_GET['category_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>"></a>
                                                                </div>
                            
                                                                <div class="form-group row no-gutter">
                                                                    <div class="col-md-6">
                                                                            Quantity: <?php echo $item["quantity"]; ?><br>
                                                                           Subtotal: <?php echo "$" . $item["price"]; ?> 
                                                                    </div>
                                                                        
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                                
</tr>
                                                            <tr>
                                                                <td class="text-color"><strong>Total</strong></td>
                                                                <td class="text-color"><strong>
                                                                        <?php echo "$" . $item_total; ?>
                                                                    </strong></td>
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <div class="payment-option">
                                               
                                            <div class="payment-option">
                                            <ul class=" list-unstyled">
                                                <li>
                                                    <label class="custom-control custom-radio  m-b-10">
                                                        <input name="mod" id="radioStacked1"  value="Cash" type="radio" checked="checked" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Cash</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="custom-control custom-radio  m-b-10">
                                                        <input name="mod" id="radioStacked1" type="radio" value="Paypal"  class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Paypal <img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                                </li>
                                            </ul>
                                            <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit" class="btn btn-success btn-block" value="Order Now"> </p>
                                        </div>

                                </form>
                            </div>
                        </div>

                </div>
            </div>
            </form>
        </div>
        <?php include "include/footer.php" ?>
        </div>
        </div>

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