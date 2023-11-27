<?php

session_start();
include '../db.php';

$entrep_id = $_SESSION['entrep_id'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];

$save_account_info = mysqli_query($cxn, "UPDATE entrep SET first_name='$fname', last_name='$lname', email_add='$email' WHERE entrep_id='$entrep_id'") or die("Error in query: $save_account_info" . mysqli_error($cxn));

echo "<script type='text/javascript'>alert('Info updated!'); location.href='accountsettings.php';</script>";
