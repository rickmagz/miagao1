<?php

session_start();
include 'db.php';

$admin_id = $_SESSION['admin_id'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];

$save_account_info = mysqli_query($cxn, "UPDATE admin SET first_name='$fname', last_name='$lname', email_add='$email' WHERE admin_id='$admin_id'") or die("Error in query: $save_account_info" . mysqli_error($cxn));

echo "<script type='text/javascript'>alert('Info updated!'); location.href='accountsettings.php';</script>";
