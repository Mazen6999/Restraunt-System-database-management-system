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
    <body>
                            <?php
                            if (empty($_SESSION["table_id"])) {
                                echo '<li class="nav-item"><a href="index.php" class="nav-link active">Login</a> </li>';
                            } else {
                                $query_res = mysqli_query($db, "update tables set status='Available' where table_id='" . $_SESSION['table_id'] . "'");
                            }
                            ?>                 
    </body>
    </html>
    <?php
}
?>
<?php
session_start(); 
session_destroy(); 
$url = 'index.php';
header('Location: ' . $url); 

?>
