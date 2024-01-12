<?php

session_start();
include '../db.php';


if (isset($_POST['submit'])) {
    $target_dir = "../assets/img/product_img/";
    $product_id = $_POST['id'];
    $image = basename($_FILES["image"]["name"]);
    $targetFileFolder = $target_dir . $image;
    $fileType = pathinfo($targetFileFolder, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'JPG', 'JPEG', 'PNG');

    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFileFolder)) {
            $update_image = mysqli_query($cxn, "UPDATE product_list SET product_image = '$image' WHERE product_id = '$product_id'");

            echo "<script type='text/javascript'> alert('Product Image Updated!'); location.href = 'productview.php?id=$product_id';</script>";
        } else {
            echo "<script type='text/javascript'> alert('Image update failed!'); location.href = 'editproductimage.php?id=$product_id';</script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Invalid file type!'); location.href = 'editproductimage.php?id=$product_id';</script>";
    }
}
