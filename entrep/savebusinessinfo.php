<?php
session_start();
include '../db.php';


if (isset($_POST['submit'])) {
    $newbusi_name = $_POST['businessname'];
    $newbusi_type = $_POST['businesstype'];
    $newbusi_addr = $_POST['businessaddress'];
    $newbusi_desc = $_POST['businessdesc'];
    $business_id = $_POST['business_id'];

    $update_busi_info = mysqli_query($cxn, "UPDATE business_list SET business_name='$newbusi_name', business_type='$newbusi_type',business_desc='$newbusi_desc',business_address='$newbusi_addr' WHERE business_id = '$business_id'") or die("Error in query: $update_busi_info." . mysqli_error($cxn));

    // echo "<script type='text/javascript'> alert('Business profile modified.'); location.href = 'editbusiness.php'; </script>";
}
