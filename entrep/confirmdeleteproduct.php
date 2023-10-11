<?php

session_start();
include '../db.php';

if (isset($_POST['submit'])) {
    $product_id = $_POST['productid'];

    $delete_products_query = "DELETE FROM product_list WHERE product_id = '$product_id'";
    if (mysqli_query($cxn, $delete_products_query)) {
        echo "<script type='text/javascript'> alert('Product deleted.'); location.href = 'deleteproduct.php'; </script>";
    } else {
        echo "Error deleting products: " . mysqli_error($cxn);
    }
}
