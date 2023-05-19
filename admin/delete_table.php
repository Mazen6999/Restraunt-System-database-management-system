<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
mysqli_query($db, "DELETE FROM tables WHERE table_id = '" . $_GET['table_del'] . "' ");
mysqli_query($db, "DELETE FROM users_orders WHERE table_id = '" . $_GET['table_del'] . "' ");

header("location:all_tables.php");

?>