<?php

session_start();
include '../db.php';

$user_id = $_SESSION['user_id'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];

$save_account_info = mysqli_query($cxn, "UPDATE user SET first_name='$fname', last_name='$lname', email='$email' WHERE user_id='$user_id'") or die("Error in query: $save_account_info" . mysqli_error($cxn));

echo "<script type='text/javascript'>alert('Info updated!'); location.href='accountsettings.php';</script>";
