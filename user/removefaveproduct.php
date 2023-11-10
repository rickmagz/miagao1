<?php
session_start();
include '../db.php';

$user_id = $_SESSION['user_id'];
$prod_id = $_GET['id'];

$rem_fave = mysqli_query($cxn, "DELETE FROM user_product_reactions WHERE userID ='$user_id' AND productID='$prod_id'") or die("Error in query: $rem_fave." . mysqli_error($cxn));

header("Location: productview.php?id=" . $prod_id);
