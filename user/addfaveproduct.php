<?php
session_start();
include '../db.php';

$user_id = $_SESSION['user_id'];
$prod_id = $_GET['id'];

$add_fave = mysqli_query($cxn, "INSERT INTO user_product_reactions(userID,productID,action) VALUES('$user_id','$prod_id','LIKED')") or die("Error in query: $add_fave." . mysqli_error($cxn));

header("Location: productview.php?id=" . $prod_id);
