<?php

session_start();
include '../db.php';

$id = $_GET['id'];

$decline = mysqli_query($cxn, "UPDATE entrep SET status='DECLINED' WHERE entrep_id='$id'") or die("Error in query: $accept" . mysqli_error($cxn));

echo "<script type='text/javascript'>alert('Request Decline.'); location.href='../dashboard.php';</script>";
