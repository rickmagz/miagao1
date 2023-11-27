<?php

session_start();
include '../db.php';

$user_id = $_SESSION['user_id'];
$id = $_GET['id'];

$delete_account = mysqli_query($cxn, "DELETE FROM user WHERE user_id='$id'");

echo "<script type='text/javascript'>alert('Account Deleted!'); location.href='../signup.php';</script>";
