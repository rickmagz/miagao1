<?php

session_start();
include '../db.php';

if (isset($_POST['submit'])) {
    $newprod_name = $_POST['productname'];
    $newprod_type = $_POST['producttype'];
    $newprod_desc = $_POST['product_desc'];
    $product_id = $_POST['productid'];

    $update_prod_info = mysqli_query($cxn, "UPDATE product_list SET product_name='$newprod_name', product_type='$newprod_type', product_desc='$newprod_desc' WHERE product_id='$product_id'") or die("Error in query: $update_prod_info." . mysqli_error($cxn));

    echo "<script type='text/javascript'> alert('Product info modified.'); location.href = 'editproduct.php'; </script>";
}
