<?php

session_start();
include '../db.php';

if (isset($_POST['submit'])) {
    $busi_id = $_POST['businessid'];

    $delete_products_query = "DELETE FROM product_list WHERE business_id = '$busi_id'";
    if (mysqli_query($cxn, $delete_products_query)) {
    } else {
        echo "Error deleting products: " . mysqli_error($cxn);
    }
    
    $delete_business_query = "DELETE FROM business_list WHERE business_id = '$busi_id'";
    if (mysqli_query($cxn, $delete_business_query)) {
        echo "<script type='text/javascript'> alert('Business deleted.'); location.href = 'deletebusiness.php'; </script>";
    } else {
        echo "Error deleting business: " . mysqli_error($cxn);
    }

} 
