<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

$check_id=1;
$sql = "SELECT * FROM tables where table_id = '$check_id' ";
$query = mysqli_query($db, $sql);

while (mysqli_num_rows($query) > 0) 
{
    $check_id=$check_id+1;
    $sql = "SELECT * FROM tables where table_id = '$check_id' ";
    $query = mysqli_query($db, $sql);
}
mysqli_query($db, "INSERT INTO `tables` (`table_id`, `status`) VALUES ('$check_id', 'avaible');");
header("location:all_tables.php");

?>