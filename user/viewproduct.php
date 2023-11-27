<?php
session_start();
include '../db.php';

$user_id = $_SESSION['user_id'];
$product_id = $_GET['id'];

$add_view = mysqli_query($cxn, "UPDATE user_product_visits SET productID = '$product_id', userID='$user_id'");

header("Location: productview.php?id=" . $product_id);
