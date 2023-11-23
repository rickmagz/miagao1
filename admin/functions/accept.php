<?php

session_start();
include '../db.php';

$id = $_GET['id'];

$accept = mysqli_query($cxn, "UPDATE entrep SET status='APPROVED' WHERE entrep_id='$id'") or die("Error in query: $accept" . mysqli_error($cxn));

echo "<script type='text/javascript'>alert('Request Accepted.'); location.href='../dashboard.php';</script>";
