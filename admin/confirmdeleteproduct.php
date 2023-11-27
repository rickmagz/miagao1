<?php

session_start();
include '../db.php';

$id = $_GET['id'];

$confirm_delete = mysqli_query($cxn, "DELETE FROM product_list WHERE product_id='$id'") or die("Error in query: $confirm_delete" . mysqli_error($cxn));

echo "<script type='text/javascript'>alert('Product deleted!'); location.href='./products.php';</script>";
